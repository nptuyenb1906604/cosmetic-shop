<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function show_home(Request $request){
    	//SEO
    	// $meta_description = "Các hãng thương hiệu mỹ phẩm ở Hasaki luôn là các thương hiệu uy tín, được mọi người tin dùng như : Secret Key, Laneige, Vichy, Avène, Yves Rocher, Laroche Posay, Lancôme,...";
    	// $meta_keywords = "sữa rửa mặt, kem chống nắng, mỹ phẩm, kem nền";
    	// $meta_title = "Mỹ phẩm chăm sóc da và làm đẹp"
    	// $url_canonical = $request->url();

    	//End SEO
    	
    	$category = DB::table('tbl_category')->where('category_status', '1')->get();
    	$brand = DB::table('tbl_brand')->where('brand_status', '1')->get();
    	$product = DB::table('tbl_product')->where('product_status', '1')->get();

    	return view('pages.home')->with('category', $category)->with('brand', $brand)->with('product', $product); //-->C1
    	//return view('pages.home')->with(compact('category', 'brand', 'product')); -->C2
    	//Biến trong foreach chính là $category $brand $product
    }

    public function login(){
        $category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        return view('pages.login')
        ->with('category', $category)
        ->with('brand', $brand);
    }

    public function login_home(Request $request){
        $customer_email = $request->login_email;
        $customer_password = md5($request->login_password);
        $account = DB::table('tbl_customer')->where('customer_email', $customer_email)->where('customer_password', $customer_password)->first();

        if($account){
            Session::put('customer_id', $account->customer_id);
            Session::put('customer_name', $account->customer_name);
            return Redirect::to('/home');
        }
    }

    public function register_home(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect::to('/home');
    }
}
