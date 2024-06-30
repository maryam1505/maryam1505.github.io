<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product\Cart;
use App\Models\Product\LikeProduct;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {
         $request->validate([
            'productName' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|exists:categories,CategoryID',
            'productImage' => 'image|mimes:jpeg,png,jpg,gif|max:50000', 
        ]);

         $product = new Product();
        $product->ProductName = $request->input('productName');
        $product->Description = $request->input('description');
        $product->Price = $request->input('price');
        $product->Stock = $request->input('stock');
        $product->CategoryID = $request->input('category');

        
        if ($request->hasFile('productImage')) {
            $imageFile = $request->file('productImage');
            $imagePath = $imageFile->store('public/downloads');
          $product->productImage = str_replace('public/', '', $imagePath);
        }
       
         $product->save();

         return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function delete($id)
    {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function update(Request $request, $id)
    {
         $product = Product::find($id);
    
         if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
         $validatedData = $request->validate([
            'ProductName' => 'nullable|string|max:255',
            'Description' => 'nullable|string',
            'Price' => 'nullable|numeric|min:0',
            'Stock' => 'nullable|integer|min:0',
            'CategoryID' => 'nullable|exists:categories,CategoryID',
            'ProductStatus' => 'nullable|string|in:New,Sale,Out of Stock',
            'productImage' => 'image|mimes:jpeg,png,jpg,gif|max:50000', 
        ]);
    
         $updateData = [];
    
         if ($request->filled('ProductName')) {
            $updateData['ProductName'] = $validatedData['ProductName'];
        }
        if ($request->filled('Description')) {
            $updateData['Description'] = $validatedData['Description'];
        }
        if ($request->filled('Price')) {
            $updateData['Price'] = $validatedData['Price'];
        }
        if ($request->filled('Stock')) {
            $updateData['Stock'] = $validatedData['Stock'];
        }
        if ($request->filled('CategoryID')) {
            $updateData['CategoryID'] = $validatedData['CategoryID'];
        }
        if ($request->filled('ProductStatus')) {
            $updateData['ProductStatus'] = $validatedData['ProductStatus'];
        }
        if ($request->filled('productImage')) {
            $updateData['productImage'] = $validatedData['productImage'];
        }
        if ($request->hasFile('productImage')) {
            $imageFile = $request->file('productImage');
            $imagePath = $imageFile->store('public/downloads');
          $product->productImage = str_replace('public/', '', $imagePath);
        }
        
    
         $product->update($updateData);
    
         return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
    }
    
    public function like($id)
    {
        $userId = session('LoggedUserInfo');
    
        if (!$userId) {
            return redirect()->route('user.login')->with('fail', 'You must be logged in to access the dashboard');
        }
    
        $loggedUser = User::find($userId);
    
        if (!$loggedUser) {
            return redirect()->route('user.login')->with('fail', 'User not found.');
        }
    
        $existingLike = LikeProduct::where('user_id', $userId)
                                    ->where('product_id', $id)
                                    ->exists();
    
        if ($existingLike) {
            return back()->with('warning', 'Product already liked.');
        }
    
        LikeProduct::create([
            'user_id' => $userId,
            'product_id' => $id,
        ]);
    
        return back()->with('success', 'Product liked successfully!');
    }
    

    public function addToCart(Request $request)
    {
        $userId = session('LoggedUserInfo');
    
        if (!$userId) {
            return redirect()->route('user.login')->with('fail', 'You must be logged in to access the dashboard');
        }
    
        $loggedUser = User::find($userId);
    
        if (!$loggedUser) {
            return redirect()->route('user.login')->with('fail', 'User not found.');
        }

         $existingCartItem = Cart::where('user_id', $userId)
                                ->where('pro_id', $request->input('pro_id'))
                                ->first();
        
        if ($existingCartItem) {
            return redirect()->back()->with('warning', 'Product is already in your cart.');
        }

         $cart = new Cart();
        $cart->user_id = $userId;
        $cart->pro_id = $request->input('pro_id');
        $cart->name = $request->input('name');
        $cart->price = $request->input('price');
        $cart->qty = $request->input('qty');
        $cart->subtotal = $request->input('price') * $request->input('qty');
        $cart->image = $request->input('image');
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart()
{
    $userId = session('LoggedUserInfo');

    if (!$userId) {
        return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
    }

     $cartItems = Cart::where('user_id', $userId)->get();

     $subtotal = $cartItems->sum('subtotal');

    return view('cart', compact('cartItems', 'subtotal'));
}



    
    
}
