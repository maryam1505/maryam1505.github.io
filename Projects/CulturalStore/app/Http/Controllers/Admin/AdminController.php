<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\Admin;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Travel\City;
use App\Models\Travel\TouristPlace;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{

    public function user(Request $request)
    {
         $LoggedAdminInfo = Admin::find(session('LoggedAdminInfo'));
        if (!$LoggedAdminInfo) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }

         $users = User::all();

         return view('admin.user', ['users' => $users, 'LoggedAdminInfo' => $LoggedAdminInfo]);
    }
    
    function login()
    {
        return view('admin.login');
    }
    

    function register()
    {
        return view('admin.register');
    }







    public function check(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
    
        $adminInfo = Admin::where('email', $request->email)->first();
    
        if (!$adminInfo) {
            return back()->withInput()->withErrors(['email' => 'Email not found']);
        }
    
        if (!Hash::check($request->password, $adminInfo->password)) {
            return back()->withInput()->withErrors(['password' => 'Incorrect password']);
        }
    
         session(['LoggedAdminInfo' => $adminInfo->id]);
    
        return redirect()->route('admin.dashboard');
    }
    

    public function logout()
    {
         if (session()->has('LoggedAdminInfo')) {
             session()->forget('LoggedAdminInfo');
        }
         return redirect()->route('admin.login');
    }
    


    public function dashboard()
    {
         $LoggedAdminInfo = Admin::find(session('LoggedAdminInfo'));
    
         if (!$LoggedAdminInfo) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }
    
         $recentUsers = User::orderBy('created_at', 'desc')->distinct()->limit(5)->get();
         $recentPlaces = TouristPlace::all();

         $totalUserCount = User::count();
         $totalPlaceCount = TouristPlace::count();
         $totalCityCount = City::count();

     
         return view('admin.dashboard', [
            'LoggedAdminInfo' => $LoggedAdminInfo,
            'totalUserCount' => $totalUserCount,
             'recentUsers' => $recentUsers,
             'recentPlaces' => $recentPlaces,
             'totalCityCount' => $totalCityCount , 

             'totalPlaceCount' => $totalPlaceCount 

        ]);
    }
    
    


    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins', // Check uniqueness against the admins table
            'password' => 'required|string|min:8|regex:/^\S*$/',
            'username' => 'required|string|max:255|unique:admins', // Check uniqueness against the admins table
        ], [
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);
    
         $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
        ]);
    
        return redirect()->route('admin.login')->with('message', 'User created successfully!');
    }
    public function booking()
    {
        $LoggedAdminInfo = Admin::find(session('LoggedAdminInfo'));
        if (!$LoggedAdminInfo) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }
            return view('admin.booking', ['LoggedAdminInfo' => $LoggedAdminInfo ]);
    }
    public function place()
    {
        $LoggedAdminInfo = Admin::find(session('LoggedAdminInfo'));
        if (!$LoggedAdminInfo) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }
        $users = User::all();

          $cities =  City::all();
         $places = TouristPlace::all();
          return view('admin.place', ['LoggedAdminInfo' => $LoggedAdminInfo ,'users' => $users ,'cities' => $cities,'places' => $places]);
    }
 
    public function product()
    {
        $LoggedAdminInfo = Admin::find(session('LoggedAdminInfo'));
        if (!$LoggedAdminInfo) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }
        
        // Retrieve all categories and products
        $categories = Category::all();
        $products = Product::all();
        
        return view('admin.product', [
            'LoggedAdminInfo' => $LoggedAdminInfo,
            'categories' => $categories,
            'products' => $products
        ]);
    }
    

 
public function storeNewPlace(Request $request)
{   $validatedData = $request->validate([
        'place_name' => 'required|string|max:255',
        'city_id' => 'required|exists:cities,city_id',
        'description' => 'required|string',
        'location' => 'required|string',
        'history' => 'required|string',
            
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

     if ($request->hasFile('image')) {
        $imageFile = $request->file('image');
        $imagePath = $imageFile->store('public/downloads');
        
         $imagePath = str_replace('public/', '', $imagePath);
    }
    $place = new TouristPlace();
    $place->place_name = $validatedData['place_name'];
    $place->location = $validatedData['location'];
    $place->history = $validatedData['history'];

    $place->city_id = $validatedData['city_id'];
    $place->description = $validatedData['description'];
    $place->image = $imagePath; // Save the image path in the database

    $place->save();

      return redirect()->route('admin.place')->with('message', 'Place created successfully!');
}

public function deletePlace($id)
{
    $place = TouristPlace::find($id);

    if ($place) {
        $place->delete();
        return redirect()->route('admin.place')->with('message', 'Place deleted successfully.');
    } else {
        return redirect()->route('admin.place')->with('error', 'Place not found.');
    }
}
public function updatePlace(Request $request, $id)
{
    
    $validatedData = $request->validate([
        'place_id' => 'required|exists:tourist_places,place_id',
        'place_name' => 'required|string|max:255',
        'city_id' => 'required|exists:cities,city_id',
        'description' => 'nullable|string',
        'location' => 'nullable|string',
        'history' => 'nullable|string',
       
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
 
    $place = TouristPlace::find($id);

    if (!$place) {
        return redirect()->back()->with('error', 'Place not found.');
    }
 
    $place->place_name = $validatedData['place_name'];
    $place->city_id = $validatedData['city_id'];
    $place->description = $validatedData['description'];
    $place->location = $validatedData['location'];
    $place->history = $validatedData['history'];
    if ($request->hasFile('image')) {
        $imageFile = $request->file('image');
        $imagePath = $imageFile->store('public/downloads');
      $place->image = str_replace('public/', '', $imagePath);
    }

     $place->save();

     return redirect()->route('admin.place')->with('message', 'Place updated successfully!');
}
    public function profile()
    {
        
        $LoggedAdminInfo = Admin::find(session('LoggedAdminInfo'));
        if (!$LoggedAdminInfo) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }
    
         return view('admin.profile', ['LoggedAdminInfo' => $LoggedAdminInfo]);
    }
 
    public function updateProfile(Request $request)
    {
         $loggedAdmin = Admin::find(session('LoggedAdminInfo'));
        
         if (!$loggedAdmin) {
            return redirect()->route('admin.login')->with('fail', 'You must be logged in to access the dashboard');
        }
        
         $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:20',
        ]);
        
         $loggedAdmin->name = $request->input('name');
        $loggedAdmin->username = $request->input('username');
        $loggedAdmin->bio = $request->input('bio');
        $loggedAdmin->phone_number = $request->input('phone_number');
    
         if ($request->hasFile('picture')) {
             $pictureFile = $request->file('picture');
            
             $picturePath = $pictureFile->store('public/downloads');
            
             $loggedAdmin->picture = str_replace('public/', '', $picturePath);
        }
        
         $loggedAdmin->save();
        
         return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }
    
    
    
    
}

