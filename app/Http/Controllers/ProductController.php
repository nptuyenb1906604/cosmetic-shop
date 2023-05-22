<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function check_login(){
        $admin_id = Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('admin')->send();
        }
    }

    public function add_product(){
    	$this->check_login();
    	$category = DB::table('tbl_category')->get();
    	$brand = DB::table('tbl_brand')->get();
    	return view('admin.add_product')->with('category', $category)->with('brand', $brand);
    }

    public function save_product(Request $request){
    	$this->check_login();
    	$data = array();
    	$data['category_id'] = $request->product_category;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_description'] = $request->product_description;
    	$data['product_content'] = $request->product_content;
    	$data['product_status'] = $request->product_status;

    	$get_name_image = $request->file('product_image');

    	if($get_name_image){
    		$get_name = $get_name_image->getClientOriginalName();
    		$split_name_image = current(explode('.', $get_name));
    		$change_name_image = $split_name_image.rand(0, 99).'.'.$get_name_image->getClientOriginalExtension();
    		$get_name_image->move('public/upload_image/product', $change_name_image);
    		$data['product_image'] = $change_name_image;
    		DB::table('tbl_product')->insert($data);
    		Session::put('message', 'Thêm sản phẩm thành công!');
    		return Redirect::to('all_product');
    	}
    		$data['product_image'] = '';
    		DB::table('tbl_product')->insert($data);
			Session::put('message', 'Thêm sản phẩm thành công!');
			return Redirect::to('all_product');
    }

    public function all_product(){
    	$this->check_login();
    	$all_product = DB::table('tbl_product')
    	->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')->get();
    	return view('admin.all_product')->with('all_product', $all_product);
    }

    public function active_product($product_id){
    	$this->check_login();
    	DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>0]);
    	Session::put('message', 'Sản phẩm đã tắt kích hoạt!');
    	return Redirect::to('all_product');
    }

    public function unactive_product($product_id){
    	$this->check_login();
    	DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>1]);
    	Session::put('message', 'Sản phẩm đã được kích hoạt!');
    	return Redirect::to('all_product');
    }

    public function edit_product($product_id){
    	$this->check_login();
    	$category = DB::table('tbl_category')->get();
    	$brand = DB::table('tbl_brand')->get();
    	$edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
    	return view('admin.edit_product')->with('category', $category)->with('brand', $brand)->with('edit_product', $edit_product);
    }

    public function update_product(Request $request, $product_id){
    	$this->check_login();
    	$data = array();
    	$data['category_id'] = $request->product_category;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_description'] = $request->product_description;
    	$data['product_content'] = $request->product_content;

    	$get_name_image = $request->file('product_image');
    	if($get_name_image){
    		$get_name = $get_name_image->getClientOriginalName();
    		$split_name_image = current(explode('.', $get_name));
    		$change_name_image = $split_name_image.rand(0, 99).'.'.$get_name_image->getClientOriginalExtension();
    		$get_name_image->move('public/upload_image/product', $change_name_image);
    		$data['product_image'] = $change_name_image;
    		DB::table('tbl_product')->where('product_id', $product_id)->update($data);
    		Session::put('message', 'Cập nhật sản phẩm thành công!');
    		return Redirect::to('all_product');
    	}
    		DB::table('tbl_product')->where('product_id', $product_id)->update($data);
			Session::put('message', 'Cập nhật sản phẩm thành công!');
			return Redirect::to('all_product');
    }

    public function delete_product($product_id){
    	$this->check_login();
    	DB::table('tbl_product')->where('product_id', $product_id)->delete();
    	Session::put('message', 'Xóa sản phẩm thành công');
    	return Redirect::to('all_product');
    }

    //Show product detail
    public function show_product_detail($product_id){
        $category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();
        $product_detail = DB::table('tbl_product')
        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
        ->where('tbl_product.product_id', $product_id)
        ->get();

        foreach($product_detail as $key => $value){
            $category_id = $value->category_id;
        }

        $replated_products = DB::table('tbl_product')
        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
        ->where('tbl_category.category_id', $category_id)
        ->whereNotIn('tbl_product.product_id', [$product_id])
        ->get();

        return view('pages.product.show_product_detail')
        ->with('category', $category)
        ->with('brand', $brand)
        ->with('product_detail', $product_detail)
        ->with('replated_products', $replated_products);
    }

    //Search
    public function search(Request $request){
        $category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();

        $keyword = $request->search_keyword;
        Session::put('keyword', $request->search_keyword);
        $product = DB::table('tbl_product')->where('product_name', 'like', '%'.$keyword.'%')->get();
        return view('pages.product.search')->with('category', $category)->with('brand', $brand)->with('product', $product);
    }
}
