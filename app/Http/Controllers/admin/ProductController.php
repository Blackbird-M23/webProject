<?php

namespace App\Http\Controllers\admin;

use App\Models\Cart;
use App\Models\News; 
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $products = Product::latest()->filter(request(['search']))->paginate(9);
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
        // dd($request);
       //dd($request->file('image'));
        $attributes = $request->validate([
           'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


    // if ($request->hasFile('image')) {
    //     $formfields['image'] = $request->file('image')->store('images', 'public');
    // }
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'), $imageName);
    // $attributes['imageName'] = $imageName ;
    // dd($attributes) ;
        // Product::create($attributes) ;
    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->type = $request->type;
    $product->description = $request->description;
    $product->image = $imageName; // Store the file path if provided
    $product->save();
    // dd($product);
    return redirect()->route('products.create')->with('success', 'Product added successfully!');
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);  
    return view('admin.editProduct', compact('product'));  
}


    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    if ($request->has('remove_image') && $request->hasFile('image')){
        if ($product->image) {
            Storage::delete('public/products/' . $product->image);
            $product->image = null;
        }
       
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120', 
        ]);

       
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        $product->image = $imageName;
        
    }

    // Check if a new image was uploaded
    // if ($request->hasFile('image')) {
    //     $imageName = time().'.'.$request->image->extension();
    //     $request->image->move(public_path('products'), $imageName);
    //     $product->image = $imageName; // Save the new image name/path to the database
    // }
    // $product = Product::findOrFail($id);  // Fetches the product or fails with a 404 error

    // // Validate the incoming request data
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'price' => 'required|numeric|min:0',
    //     'type' => 'required|string|max:255',
    //     'description' => 'required|string',
    //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    // ]);

    // // Update the product record
    // if ($request->hasFile('image')) {
    //     $product->image = $request->file('image')->store('images', 'public');
    // } elseif ($request->filled('remove_image')) {
    //     // Handle case where user wants to remove image
    //     $product->image = null; // Set image path to null
    // }
    // dd($request->file('image'));

    $product->name = $request->name;
    $product->price = $request->price;
    $product->type = $request->type;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('products.show', ['id' => $id])->with('success', 'Product updated successfully!');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);  
    $product->delete(); 


    return redirect('/admin/products')->with('success', 'Product deleted successfully!');
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
        // dd($item);
        return redirect()->route('showCart')->with('success', 'Congratulations! Item added into cart.');
            // return redirect()->back()->with('success', 'Congratulations! Item added into cart.');
    } else {
        return redirect('login')->with('error', 'Please Log in to add to your cart.');
    }
}


public function showCart(Request $request){
    // dd($request->all());
    $cartItems = DB::table('products')
    ->join('carts', 'carts.productId', 'products.id')
    ->select('products.name', 'products.price', 'products.image', 'carts.*')
    ->where('carts.customerId', auth()->id())
    ->get();

    // dd($cartItems);
    return view('cart', compact('cartItems'));
}

public function updateCartItem(Request $request, $id){

    $request->validate([
        'quantity' => 'required|integer|min:1|max:5'
    ]);
    
    $cartItem = Cart::findOrFail($id);
    $cartItem->quantity = $request->input('quantity');
    $cartItem->save();
    return redirect()->back()->with('success', 'Item Updated in cart.');
}


public function deleteCartItem($id){
    $cartItem = Cart::findOrFail($id);
    $cartItem->delete();
    // dd($cartItems);
    return redirect()->back()->with('success', 'Item removed from cart.');
}

}
