<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use Cart;

class CartController extends Controller
{ 
    public function show_cart(){
    	$category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        return view('pages.cart.show_cart')
        ->with('category', $category)
        ->with('brand', $brand);
    }

    public function save_cart(Request $request){
    	$productId = $request->productId_hidden;
    	$productQty = $request->product_quantity;
    	$productInfo = DB::table('tbl_product')->where('product_id', $productId)->first();

    	$data['id'] = $productId;
    	$data['name'] = $productInfo->product_name;
    	$data['qty'] = $productQty;
    	$data['price'] = $productInfo->product_price;
    	$data['weight'] = '123';
    	$data['options']['image'] = $productInfo->product_image;
    	Cart::add($data);
    	Cart::setGlobalTax(0);
    	// Cart::destroy();
    	return Redirect::to('show_cart');
    }

    public function delete_cart($rowId){
    	Cart::remove($rowId);
    	return Redirect::to('show_cart');
    }

    public function update_cart(Request $request){
    	$rowId = $request->rowId_hidden;
    	$qty = $request->update_qty;

    	Cart::update($rowId, $qty);
    	return Redirect::to('show_cart');
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0,26),5);
        $cart = Session::get('cart');
        if($cart == true){
            $is_avaiable = 0;
            foreach ($cart as $key => $value) {
                if($value['product_id'] == $data['cart_product_id']){
                    $is_avaiable++;
                    $cart[$key]['product_qty']++;
                    Session::put('cart',$cart);
                    }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_image' => $data['cart_product_image'],
                    'product_price' => $data['cart_product_price'],
                    'product_qty' => $data['cart_product_qty'],
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_qty' => $data['cart_product_qty'],
            );
            Session::put('cart', $cart);
        }
        Session::save();
    }

    public function show_cart_ajax(){
        $category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        return view('pages.cart.cart_ajax')
        ->with('category', $category)
        ->with('brand', $brand);
    }
    public function delete_product_ajax($session_id){
        $cart = Session::get('cart');
        if($cart){
            foreach($cart as $key => $value){
                if($value['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
        }
    }
    public function update_cart_ajax(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart){
            foreach($data['cart_qty'] as $session_id_at_name => $qty){
                foreach ($cart as $session_id_at_card => $value) {
                    if($value['session_id'] == $session_id_at_name){
                        $cart[$session_id_at_card]['product_qty'] = $qty;
                    }
                }

            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Cập nhật sản phẩm thành công');
        }
    }

    public function delete_all_product_ajax(){
        if(Session::get('cart')){
            Session::forget('cart');
            return redirect()->back()->with('message', 'Xóa hết sản phẩm trong giỏ hàng thành công');

        }
    }
    
    
    
}
