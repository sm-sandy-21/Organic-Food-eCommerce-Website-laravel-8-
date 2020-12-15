<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController; 

use App\Http\Controllers\adminController; 

use App\Http\Controllers\SuperAdminController; 

use App\Http\Controllers\catagoryController; 

use App\Http\Controllers\subcatagoryController; 

use App\Http\Controllers\manufactureController; 

use App\Http\Controllers\productController; 

use App\Http\Controllers\sliderController; 

use App\Http\Controllers\cartController;

use App\Http\Controllers\checkoutController;

use App\Http\Controllers\orderController;

use App\Http\Controllers\contactController;




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

//Route::get('/','homeController@index');


Route::get('/', [homeController::class, 'index']);

Route::get('/shop', [homeController::class, 'shop']);

//Contact US Route 
Route::get('/contact-us', [contactController::class, 'contact_us']);

Route::post('/save-contact', [contactController::class, 'save_contact']);






//show product by catagory wise
Route::get('/catagory_by_product/{catagory_id}', [homeController::class, 'show_product_by_catagory']);

Route::get('/manufacture_by_product/{manufacture_id}', [homeController::class, 'show_product_by_manufacture']);

Route::get('/view-product/{product_id}', [homeController::class, 'view_product_details']);

//Add to Cart Route
Route::post('/add-to-cart', [cartController::class, 'add_to_cart']);

Route::get('/show-cart', [cartController::class, 'show_cart']);

Route::get('/delete-to-cart/{id}', [cartController::class, 'delete_to_cart']);

Route::get('/update-cart-p/{id}/{quantity}', [cartController::class, 'update_cart_p']);

Route::get('/update-cart-m/{id}/{quantity}', [cartController::class, 'update_cart_m']);

//checkout Route
Route::get('/login-checkout', [checkoutController::class, 'login_checkout']);

Route::post('/customer-registration', [checkoutController::class, 'customer_registration']);

Route::get('/checkout', [checkoutController::class, 'checkout']);

Route::post('/save-shipping-details', [checkoutController::class, 'save_shipping_details']);

//customer login & logout rout
Route::post('/customer-login', [checkoutController::class, 'customer_login']);

Route::get('/customer-logout', [checkoutController::class, 'customer_logout']);

//payment Route
Route::get('/payment', [checkoutController::class, 'payment']);

Route::post('/order-place', [checkoutController::class, 'order_place']);


//Order Route

Route::get('/manage-order', [orderController::class, 'index']);

Route::get('/view-order/{order_id}', [orderController::class, 'view_order']);

Route::get('/unactive-order/{order_id}', [orderController::class, 'unactive_order']);

Route::get('/active-order/{order_id}', [orderController::class, 'active_order']);

Route::get('/delete-order/{order_id}', [orderController::class, 'delete_order']);




//Admin Route

Route::get('/admin', [adminController::class, 'index']);

Route::get('/logout', [SuperAdminController::class, 'logout']);

Route::get('/dashboard', [SuperAdminController::class, 'index']);

Route::post('/admin-dashboard', [adminController::class, 'admindashboard']);





//Catagori Route

Route::get('/add-catagory', [catagoryController::class, 'index']);        //must use catagoryController top section //,outherwise(show error) trget class does not exit

Route::get('/all-catagory', [catagoryController::class, 'all_catagory']); 

Route::post('/save-catagory', [catagoryController::class, 'save_catagory']);

Route::post('/update-catagory/{catagory_id}', [catagoryController::class, 'update_catagory']);

Route::get('/unactive/{catagory_id}', [catagoryController::class, 'unactive_catagory']);

Route::get('/active/{catagory_id}', [catagoryController::class, 'active_catagory']);

Route::get('/edit-catagory/{catagory_id}', [catagoryController::class, 'edit_catagory']);

Route::get('/delete-catagory/{catagory_id}', [catagoryController::class, 'delete_catagory']);

//Subcatagory Route
Route::get('/add-subcatagory', [subcatagoryController::class, 'index']);

Route::post('/save-subcatagory', [subcatagoryController::class, 'save_subcatagory']);



//Manufature Route
Route::get('/add-manufacture', [manufactureController::class, 'index']); //when show Target class [manufactureController] does not exist. Use this controller on the top section

Route::post('/save-manufacture', [manufactureController::class, 'save_manufacture']);

Route::get('/all-manufacture', [manufactureController::class, 'all_manufacture']); 

Route::get('/unactive-status/{manufacture_id}', [manufactureController::class, 'unactive_manufacture']);

Route::get('/active-status/{manufacture_id}', [manufactureController::class, 'active_manufacture']);

Route::get('/edit-manufacture/{manufacture_id}', [manufactureController::class, 'edit_manufacture']); 

Route::post('/update-manufacture/{manufacture_id}', [manufactureController::class, 'update_manufacture']);

Route::get('/delete-manufacture/{manufacture_id}', [manufactureController::class, 'delete_manufacture']);

//Product Route
Route::get('/add-product', [productController::class, 'index']);

Route::post('/save-product', [productController::class, 'save_product']);

Route::get('/all-product', [productController::class, 'all_product']);

Route::get('/unactive-product/{product_id}', [productController::class, 'unactive_product']);

Route::get('/active-product/{product_id}', [productController::class, 'active_product']);

Route::get('/delete-product/{product_id}', [productController::class, 'delete_product']);

Route::get('/edit-product/{product_id}', [productController::class, 'edit_product']);

Route::post('/update/{product_id}', [productController::class, 'update_product']);


//For Slider Route
Route::get('/add-slider', [sliderController::class, 'index']);

Route::post('/save-slider', [sliderController::class, 'save_slider']);

Route::get('/all-slider', [sliderController::class, 'all_slider']);

Route::get('/unactive-slider/{slider_id}', [sliderController::class, 'unactive_slider']);

Route::get('/active-slider/{slider_id}', [sliderController::class, 'active_slider']);

Route::get('/delete-slider/{slider_id}', [sliderController::class, 'delete_slider']);




