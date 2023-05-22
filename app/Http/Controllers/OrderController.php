<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use App\City;
use App\Province;
use App\Ward;
use App\FeeShip;
use App\Shipping;
use App\Order;
use App\OrderDetail;
use App\Customer;

class OrderController extends Controller
{
    public function manage_order(){
    	$order = Order::orderby('created_at', 'DESC')->get();
    	return view('admin.manage_order')->with(compact('order'));
    }

    public function view_order($orderCode){
    	$order_details = OrderDetail::where('order_code', $orderCode)->get();
    	$order = Order::where('order_code', $orderCode)->get();
    	foreach ($order as $key => $value) {
    		$customer_id = $value->customer_id;
    		$shipping_id = $value->shipping_id;
    	}
    	$customer = Customer::where('customer_id', $customer_id)->first();
    	$shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $tp = City::where('matp', $shipping->matp)->first();
        $qh = Province::where('maqh', $shipping->maqh)->first();
        $xp = Ward::where('xaid', $shipping->xaid)->first();
        //$order_detail = OrderDetail::with('product')->where('order_code', $orderCode)->get();
        $order_detail = OrderDetail::where('order_code', $orderCode)->get();

    	return view('admin.view_order')->with(compact('order_details', 'customer', 'shipping', 'order_detail', 'tp', 'qh', 'xp'));

    }

}
