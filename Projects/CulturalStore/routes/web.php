<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CreateNewUserController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UsersCustomersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

/*---- HOME ----*/
Route::get('/', [UsersCustomersController::class, 'index'])->name('home');

/*---- SHOP CART ----*/
Route::get('/cart', [UsersCustomersController::class, 'users_customers_shop_cart'])->name('shop.cart');
Route::get('/shop', [UsersCustomersController::class, 'users_customers_shop'])->name('shop');

/*---- Contact us ----*/
Route::get('/contact_us', [UsersCustomersController::class, 'users_customers_contact_us'])->name('contact');

/*---- Travel ----*/
Route::get('/travel', [UsersCustomersController::class, 'users_customers_travel'])->name('travel');

/*---- Product Details ----*/
 Route::get('/productdetails/{id}', [UsersCustomersController::class, 'users_customers_product_details'])->name('productdetails');

/*---- Check Out ----*/
Route::get('/chect_out', [UsersCustomersController::class, 'users_customers_check_out'])->name('check.out');

/*---- Explore Place ----*/
Route::get('/explore_place/{id}', [UsersCustomersController::class, 'users_customers_explore_place'])->name('explore.place');


/*---- Women's Section ----*/
Route::get('/womens', [UsersCustomersController::class, 'users_customers_womens'])->name('womens');

/*---- Men's Section ----*/
Route::get('/mens', [UsersCustomersController::class, 'users_customers_mens'])->name('mens');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
Route::post('/user/check', [UserController::class, 'check'])->name('user.check');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/user/register', [UserController::class, 'register'])->name('user.register');
    Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::get('/login', [UsersCustomersController::class, 'users_customers_login'])->name('login');
    Route::get('/register', [UsersCustomersController::class, 'users_customers_register'])->name('register');

    // Route::get('/shop', [UserController::class, 'shop'])->name('shop');
});

//Admin Panel Routes
Route::post('/admin/save', [AdminController::class, 'save'])->name('admin.save');
Route::post('/admin/check', [AdminController::class, 'check'])->name('admin.check');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/admin/newuser', [UserController::class, 'newuser'])->name('admin.newuser');
Route::delete('/admin/delete/{id}', [UserController::class, 'delete'])->name('admin.delete');
Route::put('/admin/update/{id}', [UserController::class, 'update'])->name('admin.update');

Route::post('/admin/user/{id}/active', [UserController::class, 'activate'])->name('user.active');
Route::post('/admin/user/{id}/inactive', [UserController::class, 'deactivate'])->name('user.inactive');
Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

/*
|--------------------------------------------------------------------------
| Validation
|--------------------------------------------------------------------------
*/
Route::post('/check-username', [UserController::class, 'checkUsername']);
Route::post('/check-password', [UserController::class, 'checkPassword']);
Route::post('/check-email', [UserController::class, 'checkEmail']);

Route::post('/admin/newuser', [CreateNewUserController::class, 'newuser'])->name('admin.newuser');
Route::delete('/admin/delete/{id}', [CreateNewUserController::class, 'delete'])->name('admin.delete');
Route::put('/admin/update/{id}', [CreateNewUserController::class, 'update'])->name('admin.update');

Route::post('/admin/user/{id}/active', [CreateNewUserController::class, 'activate'])->name('user.active');
Route::post('/admin/user/{id}/inactive', [CreateNewUserController::class, 'deactivate'])->name('user.inactive');
Route::post('/admin/newplace', [AdminController::class, 'storeNewPlace'])->name('admin.newplace');
Route::put('/admin/updateplace/{id}', [AdminController::class, 'updatePlace'])->name('admin.updatePlace');
Route::delete('/admin/deleteplace/{id}', [AdminController::class, 'deletePlace'])->name('admin.deletePlace');


//Products 
Route::post('/products/add',  [ProductsController::class, 'addProduct'])->name('products.add');
Route::delete('/products/{id}', [ProductsController::class, 'delete'])->name('products.delete');
Route::put('/products/update/{id}',[ProductsController::class, 'update'])->name('products.update');
Route::post('/product/{id}/like' ,[ProductsController::class, 'like'])->name('product.like');
Route::post('/add-to-cart', [ProductsController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [ProductsController::class, 'cart'])->name('cart');

 Route::get('/cart/remove/{id}', [ProductsController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update/{id}', [ProductsController::class, 'updateCart'])->name('cart.update');


Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
    Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/place', [AdminController::class, 'place'])->name('admin.place');
    Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');

});


 