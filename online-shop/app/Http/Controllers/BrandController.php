<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandController extends Controller
{
    public function check_login(){
        $admin_id = Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('admin')->send();
        }
    }

    public function add_brand(){
        $this->check_login();
    	return view('admin.add_brand');
    }

    public function save_brand(Request $request){
        $this->check_login();
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_description'] = $request->brand_description;
    	$data['brand_status'] = $request->brand_status;

    	DB::table('tbl_brand')->insert($data);
    	Session::put('message', 'Thêm thương hệu thành công!');
    	return Redirect::to('add_brand');
    }

    public function all_brand(){
        $this->check_login();
    	$all_brand = DB::table('tbl_brand')->get();
    	return view('admin.all_brand')->with('all_brand', $all_brand);
    }

    public function active_brand($brand_id){
        $this->check_login();
    	$active_brand = DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['brand_status'=>0]);
    	Session::put('message', 'Thương hiệu đã tắt kích hoạt!');
    	return Redirect::to('all_brand');
    }

	public function unactive_brand($brand_id){
        $this->check_login();
    	$unactive_brand = DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['brand_status'=>1]);
    	Session::put('message', 'Thương hiệu đã được kích hoạt!');
    	return Redirect::to('all_brand');
    }

    public function edit_brand($brand_id){
        $this->check_login();
    	$edit_brand = DB::table('tbl_brand')->where('brand_id', $brand_id)->get();
    	return view('admin.edit_brand')->with('edit_brand', $edit_brand);
    }

    public function update_brand(Request $request, $brand_id){
        $this->check_login();
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_description'] = $request->brand_description;

    	DB::table('tbl_brand')->where('brand_id', $brand_id)->update($data);
    	Session::put('message', 'Cập nhật thương hiệu thành công!');
    	return Redirect::to('all_brand');
    }

    public function delete_brand($brand_id){
        $this->check_login();
    	DB::table('tbl_brand')->where('brand_id', $brand_id)->delete();
    	Session::put('message', 'Xóa thương hiệu thành công!');
    	return Redirect::to('all_brand');
    }

    //Show brand home
    public function show_brand_home($brand_id){
        $category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();
        $product_by_brand = DB::table('tbl_product')
        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
        ->where('tbl_product.brand_id', $brand_id)
        ->get();
        $brand_name = DB::table('tbl_brand')->where('brand_id',$brand_id)->limit(1)->get();

        return view('pages.brand.show_brand_home')
        ->with('category', $category)
        ->with('brand', $brand)
        ->with('product_by_brand', $product_by_brand)
        ->with('brand_name', $brand_name);
    }
}
