<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Admin;
use App\Models\Users\User;
 use Illuminate\Support\Facades\Hash; 
class CreateNewUserController extends Controller
{
    public function newuser(Request $request)
    {
         $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', // Ensure email uniqueness
            'password' => 'required|string|min:8', // Minimum 8 characters for password
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:20',
        ]);
    
         $picturePath = null;
        if ($request->hasFile('picture')) {
             $pictureFile = $request->file('picture');
    
             $picturePath = $pictureFile->store('public/downloads');
    
             $picturePath = str_replace('public/', '', $picturePath);
        } else {
             $picturePath = 'downloads/noimage.png'; // Assuming the default image is stored in storage/public/downloads/noimage.png
        }
    
         $encryptedPassword = bcrypt($validatedData['password']);
    
         $user = User::create([
            'username' => $validatedData['username'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $encryptedPassword,
            'phone_number' => $validatedData['phone_number'],
            'picture' => $picturePath,
        ]);
    
         return redirect()->route('admin.user')->with('success', 'User details saved successfully.');
    }
    public function validateUsername(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
        ]);
    
         $usernameExists = User::where('username', $request->username)->exists();
    
        if ($usernameExists) {
            return response()->json(['valid' => false, 'message' => 'Username already exists']);
        }
    
        return response()->json(['valid' => true, 'message' => 'Username is available']);
    }
    
    
    
        public function delete($id)
    {
         $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
    
         $user->delete();
    
        return response()->json(['success' => 'User deleted successfully.'], 200);
    
    } public function update(Request $request, $id)
    { 
         $request->validate([
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
         $user = User::findOrFail($id);
    
         $user->username = $request->input('username');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');
    
         if ($request->hasFile('picture')) {
             $pictureFile = $request->file('picture');
            
             $picturePath = $pictureFile->store('public/downloads');
            
             $picturePath = str_replace('public/', '', $picturePath);
    
             $user->picture = $picturePath;
        }
    
         $user->save();
    
         return redirect()->route('admin.user')->with('success', 'User profile updated successfully');
    }
    
    public function activate($id)
        {
            $user = User::findOrFail($id);
            $user->status = 'active';
            $user->save();
    
            return redirect()->back()->with('success', 'User activated successfully.');
        }
    
        public function deactivate($id)
        {
            $user = User::findOrFail($id);
            $user->status = 'inactive';
            $user->save();
    
            return redirect()->back()->with('success', 'User deactivated successfully.');
        }
        
}
