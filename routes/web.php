<?php

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

//Home
Route::get('/','HomeController@show_home');
Route::get('/home','HomeController@show_home');
Route::get('/login','HomeController@login');
Route::post('/register_home', 'HomeController@register_home');
Route::post('/login_home', 'HomeController@login_home');


//Admin
Route::get('/admin', 'AdminController@show_login');
Route::get('/dashboard', 'AdminController@show_dashboard'); //return dashboard page after login
Route::post('/admin_dashboard', 'AdminController@dashboard'); //post form to check email and password
Route::get('/logout', 'AdminController@logout'); 

//Category
Route::get('/add_category', 'CategoryController@add_category');
Route::post('/save_category', 'CategoryController@save_category');

Route::get('/all_category', 'CategoryController@all_category');

Route::get('/unactive_category/{category_id}', 'CategoryController@unactive_category');
Route::get('/active_category/{category_id}', 'CategoryController@active_category');

Route::get('/edit_category/{category_id}', 'CategoryController@edit_category');
Route::post('/update_category/{category_id}', 'CategoryController@update_category');

Route::get('/delete_category/{category_id}', 'CategoryController@delete_category');

//Brand
Route::get('/add_brand', 'BrandController@add_brand');
Route::post('/save_brand', 'BrandController@save_brand');

Route::get('all_brand', 'BrandController@all_brand');

Route::get('active_brand/{brand_id}', 'BrandController@active_brand');
Route::get('unactive_brand/{brand_id}', 'BrandController@unactive_brand');

Route::get('edit_brand/{brand_id}', 'BrandController@edit_brand');
Route::post('update_brand/{brand_id}', 'BrandController@update_brand');

Route::get('delete_brand/{brand_id}', 'BrandController@delete_brand');

//Product
Route::get('/add_product', 'ProductController@add_product');
Route::post('/save_product', 'ProductController@save_product');

Route::get('/all_product', 'ProductController@all_product');

Route::get('/active_product/{product_id}', 'ProductController@active_product');
Route::get('/unactive_product/{product_id}', 'ProductController@unactive_product');

Route::get('/edit_product/{product_id}', 'ProductController@edit_product');
Route::post('/update_product/{product_id}', 'ProductController@update_product');

Route::get('/delete_product/{product_id}', 'ProductController@delete_product');

Route::post('/search', 'ProductController@search');

//Category Home
Route::get('/category_home/{category_id}', 'CategoryController@show_category_home');

//Brand Home
Route::get('/brand_home/{brand_id}', 'BrandController@show_brand_home');

//Product Detail
Route::get('/product_detail/{product_id}', 'ProductController@show_product_detail');

//Cart
Route::post('/save_cart', 'CartController@save_cart');
Route::get('/show_cart', 'CartController@show_cart');
Route::get('/delete_cart/{rowId}', 'CartController@delete_cart');
Route::post('/update_cart/{rowId}', 'CartController@update_cart');

Route::post('/add_cart_ajax', 'CartController@add_cart_ajax');
Route::get('/show_cart_ajax', 'CartController@show_cart_ajax');
Route::post('/update_cart_ajax', 'CartController@update_cart_ajax');
Route::get('/delete_product_ajax/{session_id}', 'CartController@delete_product_ajax');
Route::get('/delete_all_product_ajax/', 'CartController@delete_all_product_ajax');


//Checkout
Route::get('/login_checkout', 'CheckOutController@login_checkout');
Route::get('/show_checkout', 'CheckOutController@show_checkout');
Route::post('/save_customer', 'CheckOutController@save_customer');

Route::post('/login_customer', 'CheckOutController@login_customer');
Route::get('/logout_customer', 'CheckOutController@logout_customer');

Route::get('/show_shipping', 'CheckOutController@show_shipping');
Route::post('/save_shipping', 'CheckOutController@save_shipping');

Route::post('/order_place', 'CheckOutController@order_place');

Route::post('/select_delivery_home', 'CheckOutController@select_delivery_home');
Route::post('/calculate_fee', 'CheckOutController@calculate_fee');
Route::post('/confirm_order', 'CheckOutController@confirm_order');

Route::get('address_checkout', 'CheckOutController@address_checkout');



//Order
Route::get('/manage_order', 'OrderController@manage_order');
Route::get('/view_order/{orderCode}', 'OrderController@view_order');
// Route::get('/manage_order', 'CheckOutController@manage_order');

//Login facebook
Route::get('/login_facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//Login google
Route::get('/login_google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');

//Delivery
Route::get('/delivery', 'DeliveryController@delivery');
Route::post('/select_delivery', 'DeliveryController@select_delivery');
Route::post('/insert_delivery', 'DeliveryController@insert_delivery');
Route::post('/select_feeship', 'DeliveryController@select_feeship');
Route::post('/update_delivery', 'DeliveryController@update_delivery');





















