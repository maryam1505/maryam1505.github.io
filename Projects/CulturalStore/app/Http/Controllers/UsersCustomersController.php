<?php

namespace App\Http\Controllers;

use App\Models\Product\Cart;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Travel\City;
use App\Models\Travel\Event;
use App\Models\Travel\TouristPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class UsersCustomersController extends Controller
{
    public function users_customers_login() {
        return view('users_customers_login', ['title'=> 'Login']);
    }
    public function users_customers_register() {
        return view('users_customers_register', ['title'=>'Register']);
    }
    public function index() {
        return view('index', ['title' => 'Home']);
    }

    public function users_customers_shop_cart() {
        return view('users_customers_shop_cart', ['title'=> 'Shop Cart']);
    }

    public function users_customers_shop(Request $request) {
        $categories = Category::all();
        $womenProducts = Product::where('CategoryID', $categories->where('CategoryName', 'Women')->first()->CategoryID)->paginate(9);
        $menProducts = Product::where('CategoryID', $categories->where('CategoryName', 'Men')->first()->CategoryID)->paginate(9);
        $jewelryProducts = Product::where('CategoryID', $categories->where('CategoryName', 'Jewelry')->first()->CategoryID)->paginate(9);
    
        // Debugging: Output the contents of $products to see if it contains the paginated results
     
        $products = $this->interleaveProducts([$womenProducts, $menProducts, $jewelryProducts]);
    
        return view('users_customers_shop', [
            'title' => 'Shop',
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    
    
    private function interleaveProducts($productArrays) {
        $interleaved = [];
        $maxLength = max(array_map('count', $productArrays));
    
        for ($i = 0; $i < $maxLength; $i++) {
            foreach ($productArrays as $products) {
                if (isset($products[$i])) {
                    $interleaved[] = $products[$i];
                }
            }
        }
    
        return $interleaved;
    }
    
    
    
    
   
    public function users_customers_womens()
{
    $womenCategory = Category::where('CategoryName', 'Women')->first();

    if (!$womenCategory) {
        return redirect()->back()->with('error', 'Women category not found.');
    }

    $products = Product::where('CategoryID', $womenCategory->CategoryID)
                       ->join('like_products', 'products.ProductID', '=', 'like_products.product_id')
                       ->select('products.*')
                       ->distinct()
                       ->get();

    $allProducts = Product::where('CategoryID', $womenCategory->CategoryID)->get();

    // Fetch most wanted jewelry products
    $jewelryCategory = Category::where('CategoryName', 'Jewelry')->first();
    if (!$jewelryCategory) {
        return redirect()->back()->with('error', 'Jewelry category not found.');
    }

    $jewelryProducts = Product::where('CategoryID', $jewelryCategory->CategoryID)->get();

    return view('users_customers_womens', [
        'products' => $products,
        'allProducts' => $allProducts,
        'jewelryProducts' => $jewelryProducts,
        'subtitle' => 'Most Wanted Women Products'
    ]);
}


    public function users_customers_mens()
    {
        $menCategory = Category::where('CategoryName', 'Men')->first();
    
        if (!$menCategory) {
            return redirect()->back()->with('error', 'Men category not found.');
        }
    
         $products = Product::where('CategoryID', $menCategory->CategoryID)
                           ->join('like_products', 'products.ProductID', '=', 'like_products.product_id')
                           ->select('products.*')
                           ->distinct()
                           ->get();
      $allProducts = Product::where('CategoryID', $menCategory->CategoryID)->get();
        
        return view('users_customers_mens', [
            'products' => $products,
            'allProducts' => $allProducts,
   
            'subtitle' => 'Most Wanted men Products'
        ]);
       
    }

    public function users_customers_travel()
    {
         $cities = City::with('touristPlaces')->get();
        $events = Event::all();
    
         return view('users_customers_travel', [
            'title' => 'Travel',
            'subtitle' => '',
            'cities' => $cities ,
            'events' => $events ,

        ]);
    }
    
    public function users_customers_explore_place($id) {
         $place = TouristPlace::with('city')->find($id);
    
         if (!$place) {
            abort(404);  
        }
    
         
        $placesInSameCity = TouristPlace::where('city_id', $place->city_id)->get();

        return view('users_customers_explore_place', [
            'place' => $place,
            'placesInSameCity' => $placesInSameCity,
        ]);
    }
    
    
    public function users_customers_product_details($id)
{
    // Find the product using the correct column name
    $product = Product::where('ProductID', $id)->first();

    if (!$product) {
        // Handle case where product is not found
        return redirect()->route('products')->with('error', 'Product not found.');
    }

    $userId = session('LoggedUserInfo');
    $cartItems = [];

    if ($userId) {
        $cartItems = Cart::where('user_id', $userId)->pluck('pro_id')->toArray();
    }

    // Fetch related products using the correct column names
    $relatedProducts = Product::where('CategoryID', $product->CategoryID)
                              ->where('ProductID', '!=', $product->ProductID)
                              ->take(4) // Limit the number of related products
                              ->get();

    return view('users_customers_product_details', [
        'cartItems' => $cartItems,
        'title' => 'Product Details',
        'product' => $product,
        'relatedProducts' => $relatedProducts
    ]);
}


    
    public function users_customers_check_out() {
        return view('users_customers_checkout', ['title'=> 'Check Out']);
    }
    public function users_customers_contact_us() {
        return view('users_customers_contact', ['title'=> 'Contact']);
    }
}
