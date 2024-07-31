<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\JwelleryController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\GalleryController;   
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OwnerController;



// Route::post('/jwellery', [JwelleryController::class, 'store'])->name('jwellery.store');
// Route::put('/jwellery/{id}', [JwelleryController::class, 'show'])->name('jwellery.show');
// Route::POST('/jwellery/{id}/edit', [JwelleryController::class, 'edit'])->name('jwellery.edit');
// Route::put('/jwellery/{id}', [JwelleryController::class, 'update'])->name('jwellery.update');
// Route::delete('/jwellery/{id}', [JwelleryController::class, 'destroy'])->name('jwellery.destroy');
 //Route::get('/jewellery', [JwelleryController::class, 'index'])->name('jwellery.index');
 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/see', [ProductController::class, 'see'])->name('products.see');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/frontend/display', [ProductController::class, 'display'])->name('frontend.display');
Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.detail');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::POST('updt_cart',[CartController::class, 'cartupdt'])->name('updt_cart');
Route::get('/additem' ,[CartController::class,'additem'])->name('cart.additem');
  Route::get('/jewellery/{id}/see', [JwelleryController::class, 'see'])->name('jwellery.see');
 Route::get('/jwellery/create', [JwelleryController::class, 'create'])->name('jwellery.create');
 Route::get('/jwellery/{id}', [JwelleryController::class, 'show'])->name('jwellery.detail');
Route::get('/news',[NewsController::class,'index'])->name('news.index');
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/owner', [OwnerController::class,'index'])->name('owner.index');
Route::get('/owner/create', [OwnerController::class,'create'])->name('owner.create');
Route::post('/owner', [OwnerController::class,'store'])->name('owner.store');
Route::put('/owner/{id}', [OwnerController::class,'show'])->name('owner.show');
Route::get('/owner/{id}/see', [OwnerController::class,'see'])->name('owner.see');
Route::get('/owner/{id}/edit', [OwnerController::class,'edit'])->name('owner.edit');
Route::put('/owner/{id}', [OwnerController::class,'update'])->name('owner.update');
Route::delete('/owner/{id}', [OwnerController::class,'destroy'])->name('owner.destroy');
Route::get('/owner/{id}', [OwnerController::class, 'show'])->name('owner.detail');
Route::resource('jwellery', JwelleryController::class);
Route::get('/products/export-pdf', [ProductController::class, 'exportPdf'])->name('products.export-pdf');
Route::get('/products/export-excel', [ProductController::class, 'exportExcel'])->name('products.export-excel');
Route::get('/jewellery/export-excel', [JwelleryController::class, 'exportExcel'])->name('jwellery.export-excel');
Route::get('/products/export-csv', [ProductController::class,'exportCsv'])->name('products.export-csv');
Route::get('/admin/products', [FrontController::class, 'index'])->name('product.index');
Route::get('/admin/jwellerys', [FrontController::class, 'index2'])->name('jwellerys.index2');
Route::get('/admin/owner', [FrontController::class, 'owner'])->name('owner.owner');
Route::post('razorpay-payment',[ProductController::class,'store2'])->name('razorpay.payment.store');
