<?php

namespace App\Http\Controllers\admin;

use App\Models\News;
use App\Models\Product; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //admin all product
    public function index()
    {
        $products = Product::all(); // Fetches all products from the database
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
        return view('admin.webSingleProduct', compact('product'));
    }
    //web single product show
    public function webshow($id)
    {
        $product = Product::findOrFail($id); // Fetches the product or fails with a 404
        return view('webSingleProduct', compact('product'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new product record
        $imagePath = null; // Initialize image path variable
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // Create a new product record
    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->type = $request->type;
    $product->description = $request->description;
    $product->image = $imagePath; // Store the file path if provided
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
