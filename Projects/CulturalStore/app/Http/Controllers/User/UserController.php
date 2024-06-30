<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 


class UserController extends Controller
{
    function login()
    {
        return view('user.login');
    }
      
    
    function register()
    {
        return view('user.register');
    }

    public function check(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
    
         $userInfo = User::where('email', $request->email)->first();
    
        if (!$userInfo) {
            return back()->withInput()->withErrors(['email' => 'Email not found']);
        }
    
        // if ($userInfo->status === 'inactive') {
          //  return back()->withInput()->withErrors(['status' => 'Your account is inactive']);
       // }
    
         if (!Hash::check($request->password, $userInfo->password)) {
            return back()->withInput()->withErrors(['password' => 'Incorrect password']);
        }
    
         session(['LoggedUserInfo' => $userInfo->id]);
    
         return redirect()->route('shop');
    }
    

    

    public function logout()
    {
         if (session()->has('LoggedUserInfo')) {
             session()->forget('LoggedUserInfo');
        }
         return redirect()->route('shop');
    }
    
 


    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Check uniqueness against the admins table
            'password' => 'required|string|min:8|regex:/^\S*$/',
            'username' => 'required|string|max:255|unique:users', // Check uniqueness against the admins table
        ], [
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);
    
         $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
        ]);
    
        return redirect()->route('login')->with('message', 'User created successfully!');
    }
     
    public function profile()
    {
        
        $LoggedUserInfo = User::find(session('LoggedUserInfo'));
        if (!$LoggedUserInfo) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }
    
          return view('user.profile', ['LoggedUserInfo' => $LoggedUserInfo]);
    }
 
    public function updateProfile(Request $request)
    {    $loggedUser = User::find(session('LoggedUserInfo'));
         if (!$loggedUser) {
            return redirect()->route('user.login')->with('fail', 'You must be logged in to access the dashboard');
        }
          $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:20',
        ]);
        
         $loggedUser->name = $request->input('name');
        $loggedUser->username = $request->input('username');
        $loggedUser->bio = $request->input('bio');
        $loggedUser->phone_number = $request->input('phone_number');
         if ($request->hasFile('picture')) {
              $pictureFile = $request->file('picture');
               $picturePath = $pictureFile->store('public/downloads');
            
               $loggedUser->picture = str_replace('public/', '', $picturePath);
        }
        
           $loggedUser->save();
           return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }
    
    
}
