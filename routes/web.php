<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\controllers\articlecontroller;
use App\Http\controllers\cotegorycontroller;
use App\Http\controllers\clientcontroller;
use App\Http\controllers\cartcontroller;
use App\Http\Controllers\checkoutcontroller;
use App\Http\Controllers\shipingcontroller;
use App\Http\Controllers\SslCommerzPaymentController;

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

Route::get('/', function () {
    return view('welcome');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

});

 //for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/myprofile', [DashboardController::class,'myprofile'])->name('dashboard.myprofile');
});
    //for admin
    Route::group(['middleware' => ['auth', 'role:admin']], function() { 
        Route::get('profile_admin',[DashboardController::class,'profile_admin'])->name('dashbord.profile_admin');
        Route::resource('/articles',articlecontroller::class);
        Route::POST('/articles/{id}',[articlecontroller::class,'delete'])->name('articles.delete');
    Route::POST('/edit/{id}',[articlecontroller::class,'edit'])->name('articles.edit');
    Route::POST('/update/{id}',[articlecontroller::class,'update'])->name('articles.update');
    Route::get('/recherche',[articlecontroller::class,'recherche']);
    Route::get('/a',[articlecontroller::class,'recherche2']);
    Route::get('/articles_par_date',[articlecontroller::class,'enter_in_a_date']);
    Route::POST('/result_article_date',[articlecontroller::class,'article_vendu_par_date']);

    });




require __DIR__.'/auth.php';
Route::get('/b',[DashboardController::class,'index']);
Route::resource('/categories',cotegorycontroller::class);
Route::resource('/',clientcontroller::class);


Route::POST('/ajouter_panier',[cartcontroller::class,'add']);
Route::get('/delete_cart/{id}',[cartcontroller::class,'delete']);
Route::get('/checkout',[checkoutcontroller::class,'index']);
Route::get('/search',[clientcontroller::class,'search']);
Route::POST('/shiping',[shipingcontroller::class,'store']);
Route::get('/payment',[shipingcontroller::class,'payment']);
Route::get('pdf',[shipingcontroller::class,'pdf']);
Route::POST('place_order',[shipingcontroller::class,'place_order']);
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
Route::get('/e',[articlecontroller::class,'adr']);

//SSLCOMMERZ END


