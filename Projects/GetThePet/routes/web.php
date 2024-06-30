<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


/** Login **/ 
Route::get('/login',[UsersController::class,'login'])->name('login');

/** Register **/ 
Route::get('/register',[UsersController::class,'register'])->name('register');

/** Home **/ 
Route::get('/',[UsersController::class,'index'])->name('home');

/** About **/ 
Route::get('/about',[UsersController::class,'about'])->name('about');

/** Contact Us **/ 
Route::get('/contact_us',[UsersController::class,'contact_us'])->name('contact');

/** Pharmacy **/ 
Route::get('/pharmacy',[UsersController::class,'pharmacy'])->name('pharmacy');

/** Accessories And Food **/ 
Route::get('/accessories_food',[UsersController::class,'accessories_food'])->name('accessory.food');

/** Discussion Forum **/ 
Route::get('/discussion_forum',[UsersController::class,'discussion_forum'])->name('discussion.forum');

/** Pet Shop **/ 
Route::get('/pet_shop',[UsersController::class,'pet_shop'])->name('pet.shop');

/** Pet History **/ 
Route::get('/pet_history',[UsersController::class,'pet_history'])->name('pet.history');

/** Marketplace **/ 
Route::get('/marketplace',[UsersController::class,'marketplace'])->name('marketplace');

/** Product Details **/ 
Route::get('/product_details',[UsersController::class,'product_details'])->name('product.details');

/** Product Details **/ 
Route::get('/cart',[UsersController::class, 'cart'])->name('cart');

/** Check Out **/ 
Route::get('/checkout',[UsersController::class, 'CheckOut'])->name('check.out');

/** Thank You **/ 
Route::get('/thankyou',[UsersController::class, 'thankyou'])->name('thankyou');



/*----------------------- API Routes --------------------------------*/
Route::post('/login',[ApiController::class,'user_login'])->name('user.login');
Route::post('/register',[ApiController::class,'user_register'])->name('user.register');
Route::get('/logout',[ApiController::class,'logout'])->name('logout');

/*--- ADMIN API ROUTES ---*/
Route::post('/admin/login',[ApiController::class,'Admin_login'])->name('admin.login');
Route::post('/admin/register',[ApiController::class,'Admin_register'])->name('admin.register');
/*----------------------- API Routes --------------------------------*/

/*----------------------- Admin Routes --------------------------------*/
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/admin/login',[AdminController::class,'admin_login'])->name('admin.login');
Route::get('/admin/register',[AdminController::class,'admin_register'])->name('admin.register');
Route::get('/admin/users_details',[AdminController::class,'users_details'])->name('users.details');
/*----------------------- Admin Routes --------------------------------*/