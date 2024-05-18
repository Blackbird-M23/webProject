<?php

namespace App\Http\Controllers\admin;

use App\Models\News;
use App\Models\Product; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;

class ProductController extends Controller
{
    //admin all product
    public function index()
    {
        $products = Product::latest()->paginate(8); // Fetches all products from the database
        return view('admin.product', compact('products'));
    }

    public function welcomeProducts()
    {
        // $products = Product::all(); 
        //$products = Product::paginate(5); // Paginate products with 10 products per page
        $products = Product::latest()->filter(request(['search']))->paginate(5);
        $news = News::all(); // Fetch all news from the database
        //dd($news); // Dump and die
        return view('welcome', [
            'products' => $products,
            'news' => $news
        ]);
    }

    //admin single product show
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.SingleProduct', compact('product'));
    }
    //web single product show
    public function webshow($id)
    {
        $product = Product::findOrFail($id); // Fetches the product or fails with a 404
        return view('webSingleProduct', compact('product'));
    }

    public function addToCart(Request $data)
    {
        // Validate the incoming request data
        $data->validate([
            'quantity' => 'required|integer|min:1|max:5',
            'id' => 'required|integer|exists:products,id',
        ]);
    
        // Debugging: Print the validated values
        // dd($data->all());
        
        if (auth()->id()) {
            // Retrieve validated data
            $quantity = $data->input('quantity');
            $productId = $data->input('id');
            $customerId = auth()->id();
    
            // Debugging: Print the values
            // dd(compact('quantity', 'productId', 'customerId'));
    
            // Create a new Cart item
            $item = new Cart();
            $item->quantity = $quantity;
            $item->productId = $productId;
            $item->customerId = $customerId;
            $item->save();
    
            // Debugging: Print the saved item
            dd($item);
    
            return redirect()->back()->with('success', 'Congratulations! Item added into cart.');
        } else {
            return redirect('login')->with('error', 'Please Log in to add to your cart.');
        }
    }
    

    // public function showCart(Request $request){
    //     dd($request->all());
    //     return view('cart');
    // }



    //product category page
    public function bakery()
    {
        
        $products = Product::where('type', 'bakery')->latest()->paginate(3);
        return view('products.bakery', compact('products'));
    }

    public function sweets()
    {
        $products = Product::where('type', 'sweets')->latest()->paginate(5);
        return view('products.sweets', compact('products'));
    }

    public function snacks()
    {
        $products = Product::where('type', 'snacks')->latest()->paginate(5);
        return view('products.snacks', compact('products'));
    }

    // CRUD
    public function create()
    {
        return view('admin.addProduct');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $formfields = $request->validate([
           'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new product record
        // $imagePath = null; // Initialize image path variable
    if ($request->hasFile('image')) {
        $formfields['image'] = $request->file('image')->store('images', 'public');
    }

    // Create a new product record
    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->type = $request->type;
    $product->description = $request->description;
    $product->image = $request->image; // Store the file path if provided
    $product->save();

        // Redirect back with a success message
        return redirect()->route('products.create')->with('success', 'Product added successfully!');
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);  // Fetches the product or fails with a 404 error
    return view('admin.editProduct', compact('product'));  // Returns the view with the product data
}


    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);  // Fetches the product or fails with a 404 error

    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'type' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update the product record
    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('images', 'public');
    } elseif ($request->filled('remove_image')) {
        // Handle case where user wants to remove image
        $product->image = null; // Set image path to null
    }
    $product->name = $request->name;
    $product->price = $request->price;
    $product->type = $request->type;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('products.show', ['id' => $id]);

}

public function destroy($id)
{
    $product = Product::findOrFail($id);  // Fetches the product or fails with a 404 error
    $product->delete();  // Deletes the product from the database

    // Redirect back with a success message

    return redirect('/admin/products')->with('success', 'Product deleted successfully!');
}


}
