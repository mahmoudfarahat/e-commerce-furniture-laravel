<?php

use Illuminate\Support\Facades\Route;
use App\PaymentGateway\Payment;

use App\Models\Order;
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

// Route::get('/', function () {
//     return view('welcome');
// });
view()->composer('layouts.master' , function($view){

    $products = DB::table('products')

    ->join('carts','products.id','=','carts.product_id')

    ->select('carts.customer_id','products.prodname','products.prodpicture','products.prodprice','products.quantity')

    ->where('carts.customer_id','=',  session()->get('id'))
    ->where('carts.ordered','=', 0)

    ->get();

    $count = $products->count();

    $orders = DB::table('orders')->where('orders.customer_id', session()->get('id'));


    $orderCount = $orders->count();






    View::share( 'orderCount', $orderCount );

    View::share('count', $count  );
});

Route::get('/', function () {
    return view('index');
});
/////

Route::resource('singleorder','myorders');



//////////

Route::get('/myorder','OrderController@myorder' );

Route::get('/customerorders/{id}','OrderController@customerorders' );


Route::get('/order/{id}','OrderController@index' );

Route::post('/makeorder/{id}','OrderController@store' );


Route::post('/sendContact','contact@store' );

Route::get('/orderCart','OrderController@orderCart' );


Route::post('/makeOrder','OrderController@makeOrder' );

Route::resource('cart','cartControllers');






Route::get('cartPage','cartControllers@cartPage');

Route::post('addtocart/{id}','cartControllers@addtocart');
/////////////////// customer

Route::resource('customer','customerController');

Route::post('customerloginlogic', 'customerController@customerloginlogic');

Route::get('login', 'customerController@login');


Route::get('customerlogout', 'customerController@logout');





/////////////

Route::resource('admin','admincontroller');

Route::get('adminlogin', 'admincontroller@adminlogin');



Route::get('adminprofile', 'admincontroller@adminprofile');

Route::get('logout', 'admincontroller@logout');



// ->middleware('checkuser');

Route::post('adminloginlogic', 'admincontroller@adminloginlogic');

Route::get('importForm', 'admincontroller@importForm');

Route::get('exportoo', 'admincontroller@exportoo');

Route::post('importoo', 'admincontroller@import');

//dealing with sessions
Route::get('getSessionData', 'sessionController@getSessionData');

Route::get('storeSessionData', 'sessionController@storeSessionData');

Route::get('deleteSessionData', 'sessionController@deleteSessionData');

//////////////////

// productController
Route::resource('product','productController');


Route::get('autocomplete','productController@autocomplete');

Route::get('myproducts','productController@getProductsbyID');

Route::get('/inner-join','productController@innerJoinCaluse');

Route::get('/left-join','productController@leftJoinClause');

Route::get('/downlaodpdf','productController@downlaodpdf');

Route::get('/sendEmail','productController@Sendemail');

Route::get('/clear-cache' , function (){
    Artisan::call('cache:clear');
    return "Cashe is cleared";
    });

///////////////
Route::get('/payment',function(){
    return Payment::process();
});
