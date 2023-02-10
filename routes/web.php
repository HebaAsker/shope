<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesControllers\FilterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesControllers\CartController;
use App\Http\Controllers\PagesControllers\HomeController;
use App\Http\Controllers\PagesControllers\ShopController;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\PagesControllers\ContactController;
use App\Http\Controllers\UserControllers\UProductController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\PagesControllers\CheckoutController;
use App\Http\Controllers\PagesControllers\WishlistController;
use App\Http\Controllers\AdminControllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//view home page
Route::get('/',[HomeController::class,'index']);
Route::get('/search',[HomeController::class,'search']);
Route::get('/search',[HomeController::class,'viewCategory']);
require __DIR__.'/auth.php';

//Start view navebar pages//

//Start shop page functions//
Route::get('/shop',[ShopController::class,'index']);
Route::get('/filter',[ShopController::class,'filter']);

//End shop page functions//

//Start cart page functions//
Route::get('/cart',[CartController::class,'index']);
Route::post('/deleteFromCart',[CartController::class,'deleteItem']);
Route::post('/quantity-number',[CartController::class,'updateQtyNum']);
Route::post('/addToCart',[CartController::class,'addToCart']);
//End shop page functions//

//Start wishlist page functions//
Route::get('/wishlist',[WishlistController::class,'index']);
Route::post('/addToWishlist',[WishlistController::class,'addToWishlist']);
Route::post('/deleteWishlistItem',[WishlistController::class,'deleteItem']);
Route::post('/wishlist-quantity-number',[WishlistController::class,'updateQtyNum']);
//End wishlist page functions//

//Start Checkout Page Functions//
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::get('/thankyou',[CheckoutController::class,'placeOrder']);


Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/contact-us',[ContactController::class,'viewContactPage']);
Route::post('/contact',[ContactController::class,'contact']);
Route::get('/about-us', function () {
    return view('pages.about');
});
//End  view navebar pages//



//Start Admin Pages//

//Start Category functions//
Route::get('/view_category',[CategoryController::class,'CategoryPage']);
Route::get('/add_category',[CategoryController::class,'AddCategoryPage']);
Route::post('/insert_category',[CategoryController::class,'addCategory']);//insert category info to the database
Route::get('/viewCategoryEdit/{id}',[CategoryController::class,'updateCategoryPage']);//view page of editing category info
Route::put('/update_category/{id}',[CategoryController::class,'updateCategory']);//update category info and send the new info to the database
Route::get('/deleteCategory/{id}',[CategoryController::class,'deleteCategory']);
//End Category functions//



//Start Product functions//
Route::get('/view_product',[ProductController::class,'viewProductPage']);
Route::get('/add_product',[ProductController::class,'chooseCategory']);
Route::post('/insert_product',[ProductController::class,'addProduct']);//insert product info to the database
Route::get('/viewProductEdit/{id}',[ProductController::class,'updateProductPage']);//view page of editing category info
Route::put('/update_product/{id}',[ProductController::class,'updateProduct']);//update category info and send the new info to the database
Route::get('/deleteProduct/{id}',[ProductController::class,'deleteProduct']);
//End Product functions//

//End Admin Pages//

//Start User View Product Page//
Route::get('product detail/{product_id}',[UProductController::class,'viewProductDetail']);
Route::post('/review/{product_id}',[UProductController::class,'review']);
//End User View Product Page//


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//End User Pages//
require __DIR__.'/auth.php';
