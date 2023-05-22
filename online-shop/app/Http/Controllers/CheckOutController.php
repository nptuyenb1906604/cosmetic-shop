<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckOutController extends Controller
{
    public function login_checkout(){
    	$category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        return view('pages.checkout.login_checkout')
        ->with('category', $category)
        ->with('brand', $brand);
    }

    public function show_checkout(){
    	$category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();
        //$product = DB::table('tbl_product')->where('tbl_product', '1')->get()

        return view('pages.checkout.show_checkout')
        ->with('category', $category)
        ->with('brand', $brand);
    }

    public function save_customer(Request $request){
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_password'] = md5($request->customer_password);
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_phone'] = $request->customer_phone;

    	$customer_id = DB::table('tbl_customer')->insertGetId($data);

    	Session::put('customer_id', $customer_id);
		Session::put('customer_name', $request->customer_name);

		return Redirect::to('/show_shipping');
    }

    public function show_shipping(){
    	$category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        return view('pages.checkout.show_shipping')
        ->with('category', $category)
        ->with('brand', $brand);
    }

    public function save_shipping(Request $request){
    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_address'] = $request->shipping_address;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_note'] = $request->shipping_note;

    	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

    	Session::put('shipping_id', $shipping_id);
		Session::put('shipping_name', $request->shipping_name);

		return Redirect::to('/show_checkout');
    }

    public function logout_customer(){
    	Session::flush();
    	return Redirect::to('/login_checkout');
    }

    public function login_customer(Request $request){
    	$customer_email = $request->login_email;
    	$customer_password = md5($request->login_password);
    	$account = DB::table('tbl_customer')->where('customer_email', $customer_email)->where('customer_password', $customer_password)->first();

    	if($account){
    		Session::put('customer_id', $account->customer_id);
    		//Session::put('customer_name', $account->customer_name);
    		return Redirect::to('/show_shipping');
    	}else{
    		return Redirect::to('/login_checkout');
    	}
    }

    public function order_place(Request $request){
    	//insert payment
    	$data = array();
    	$data['payment_method'] = $request->paymentMethod;
    	$data['payment_status'] = 'Đang chờ xử lý';

    	$payment_id = DB::table('tbl_payment')->insertGetId($data);

    	//insert order
    	$data1 = array();
    	$data1['customer_id'] = Session::get('customer_id');
    	$data1['shipping_id'] = Session::get('shipping_id');
    	$data1['payment_id'] = $payment_id;
    	$data1['order_status'] = 'Đang chờ xử lý';
    	$data1['order_total'] = Cart::total();

    	$order_id = DB::table('tbl_order')->insertGetId($data1);

    	//insert order
    	$data2 = array();
    	$content = Cart::content();
    	foreach($content as $key => $value){
    		$data2['order_id'] = $order_id;
	    	$data2['product_id'] = $value->id;
	    	$data2['product_name'] = $value->name;
	    	$data2['product_price'] = $value->price;
	    	$data2['product_quantity'] = $value->qty;
	    	$order_detail_id = DB::table('tbl_order_detail')->insertGetId($data2);
    	}

    	if($data['payment_method'] == 1){
    		Cart::destroy();
    		$category = DB::table('tbl_category')->where('category_status', '1')->get();
	        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

	        return view('pages.checkout.handcash')
	        ->with('category', $category)
	        ->with('brand', $brand);
    	}elseif ($data['payment_method'] == 2) {
    		echo "Thanh toán bằng thẻ ghi nợ";
    	}else{
    		echo "Thanh toán bằng chuyển khoản ngân hàng";
    	}
    }

    public function manage_order(){
    	$all_order = DB::table('tbl_order')
    	->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
    	->select('tbl_order.*', 'tbl_customer.customer_name')
    	->get();
    	
    	return view('admin.manage_order')->with('all_order', $all_order);
    	
    }

    public function view_order($orderId){
    	$order_by_id = DB::table('tbl_order')
    	->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
    	->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
    	->join('tbl_order_detail', 'tbl_order.order_id', '=', 'tbl_order_detail.order_id')
    	->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_detail.*')->first();

    	$order_detail = DB::table('tbl_order_detail')->where('order_id', $orderId)->get();
    	return view('admin.view_order')->with('order_by_id', $order_by_id)->with('order_detail', $order_detail);
    	// echo '<pre>';
    	// print_r($order_by_id);
    	// echo '</pre>';
    }
}
