<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SendSmsController;




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

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/',[HomeController::class,'index']);

Route::get('/show_details/{id}',[HomeController::class,'show_details']);

Route::get('/show_cart',[HomeController::class,'show_cart']);

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

Route::get('remove_product/{id}',[HomeController::class,'remove_product']);

Route::get('/cash_order',[HomeController::class,'cash_order']);

Route::get('/stripe/{totalPrice}',[HomeController::class,'stripe']);

Route::post('stripe/{totalPrice}',[HomeController::class,'stripePost'])->name('stripe.post');


Route::get('/show_order',[HomeController::class,'show_order']);

Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);




Route::get('/add_category',[AdminController::class,'add_category']);

Route::post('/upload_category',[AdminController::class,'upload_category']);

Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

Route::get('/add_product',[AdminController::class,'add_product']);

Route::post('/upload_product',[AdminController::class,'upload_product']);

Route::get('/all_products',[AdminController::class,'all_products']);

Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

Route::get('/update_product/{id}',[AdminController::class,'update_product']);


Route::post('/upload_update_product/{id}',[AdminController::class,'upload_update_product']);

Route::get('/show_orders',[AdminController::class,'show_orders']);

Route::get('/delivery/{id}',[AdminController::class,'delivery']);

Route::get('/delete_order/{id}',[AdminController::class,'delete_order']);

Route::get('/print_order/{id}',[AdminController::class,'print_order']);

Route::get('/send_email/{id}',[AdminController::class,'send_email']);

Route::post('send_user_email/{id}',[AdminController::class,'send_user_email']);

Route::get('search_order',[AdminController::class,'search_order']);


Route::get('/auth/google',[GoogleController::class,'googlePage']);

Route::get('/auth/google/callback',[GoogleController::class,'callbackPage']);


Route::get('/send_sms/{id}',[SendSmsController::class,'send_sms']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
