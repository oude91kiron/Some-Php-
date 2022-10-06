<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\AdminController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route the user to home.panel if the maddleware verified.
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

// Route the admin the category
Route::get('/view_category', [AdminController::class, 'view_category']);

// Route to adding a new categoey
Route::POST('/add_category', [AdminController::class, 'add_category']);

// Route to call delete_category method
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

// Route to call view_product method
Route::get('view_product', [AdminController::class, 'view_product']);

// Route to call add_product method
Route::POST('/add_product', [AdminController::class, 'add_product']);

// Route to call show_product method.
Route::get('/show_product', [AdminController::class, 'show_product']);

// Route to call delete_product method.
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

// Route to call updateProduct method.
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

// Route for testing.
Route::get('test', [AdminController::class, 'test']);

// Route to call updateProduct method.
Route::post('/update_product_data/{id}', [AdminController::class, 'update_product_data']);

// ROute to call product_ditail method.
Route::get('/product_ditail/{id}', [HomeController::class, 'product_ditail']);

// Route to to add product to the cart.
Route::Post('/add_card/{id}', [HomeController::class, 'add_card']);

//Route to view the card page.
Route::get('/show_card', [HomeController::class, 'show_card']);

//Route to remove item from card.
Route::get('/remove_card/{id}', [HomeController::class, 'remove_card']);

Route::get('/cash_order/{id}', [HomeController::class, 'cash_order']);

//Routes To Use Stripe Payment methods in the controller.
Route::get('stripe/{totalprice}', [HomeController::class, 'stripe']); 

Route::post('stripe.post', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('order', [AdminController::class, 'order']);

Route::get('delivered/{id}', [AdminController::class, 'delivered']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf']);

Route::get('send_email/{id}', [AdminController::class, 'send_email']);

Route::post('send_user_email/{id}', [AdminController::class, 'send_user_email']);

Route::get('/search', [AdminController::class, 'searchData']);






