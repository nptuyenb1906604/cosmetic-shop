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

    
}
