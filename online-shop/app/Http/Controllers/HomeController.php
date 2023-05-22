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
    	$meta_description = "Các hãng thương hiệu mỹ phẩm ở Hasaki luôn là các thương hiệu uy tín, được mọi người tin dùng như : Secret Key, Laneige, Vichy, Avène, Yves Rocher, Laroche Posay, Lancôme,...";
    	$meta_keywords = "sữa rửa mặt, kem chống nắng, mỹ phẩm, kem nền";
    	$meta_title = "Mỹ phẩm chăm sóc da và làm đẹp"
    	$url_canonical = $request->url();

    	//End SEO
    	
    	$category = DB::table('tbl_category')->where('category_status', '1')->get();
    	$brand = DB::table('tbl_brand')->where('brand_status', '1')->get();
    	$product = DB::table('tbl_product')->where('product_status', '1')->limit(6)->get();

    	return view('pages.home')->with('category', $category)->with('brand', $brand)->with('product', $product); //-->C1
    	//return view('pages.home')->with(compact('category', 'brand', 'product')); -->C2
    	//Biến trong foreach chính là $category $brand $product
    }
}
