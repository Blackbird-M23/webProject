<?php

use App\Http\Controllers\admin\adminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\AuthManager;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use  Illuminate\Http\Request;
use App\Http\Controllers\admin\ProductController;



// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [ProductController::class, 'welcomeProducts'])->name('home');; // Route to show products on the welcome page
Route::get('/product/{id}', [ProductController::class, 'webshow'])->name('product.show'); // Route to show individual product

//product page
Route::get('/products/bakery', [ProductController::class, 'bakery'] )->name('products.bakery');
Route::get('/products/sweets', [ProductController::class, 'sweets'] )->name('products.sweets');
Route::get('/products/snacks',[ProductController::class, 'snacks'] )->name('products.snacks');




// Route::get('/admin/login', [adminLoginController::class, 'index'])->name('admin.login');
// Route::get('/', [AuthManager::class, 'home']) -> name('home');
// Route::get('/', function(){
//     return view('welcome');
// });

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [adminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [adminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function(){

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');


//Category Routes
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');


         Route::get('/getSlug', function(Request $request){
            $slug = '';
            if(!empty($request->title)){
                $slug = Str::slug($request->title);
            }
                return response()->json([
                    'status' => true,
                    'slug' => $slug
                ]);
            })->name('getSlug');


    //product list route
    Route::get('/products', [ProductController::class, 'index'])->name('products.all');
    // Route to show individual product details
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    //product CRUD route
    Route::get('admin/addProduct', [ProductController::class, 'create'])->name('products.create');
    Route::post('admin/storeProduct', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    });

});



Route::get('/login', [AuthManager::class, 'login']) -> name('login');
Route::post('/login', [AuthManager::class, 'loginPost']) -> name('login.post');

Route::get('/registration', [AuthManager::class, 'registration']) -> name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost']) -> name('registration.post');


Route::get('/logout', [AuthManager::class, 'logout']) -> name('logout');


