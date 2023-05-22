<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function check_login(){
        $admin_id = Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('admin')->send();
        }
    }

    public function add_category(){
    	return view('admin.add_category');
    }

    public function all_category(){
        $this->check_login();
    	$all_category = DB::table('tbl_category')->get();
    	return view('admin.all_category')->with('all_category', $all_category);
    }

    public function save_category(Request $request){
        $this->check_login();
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['category_status'] = $request->category_status;

    	DB::table('tbl_category')->insert($data);

    	if($data){
    		Session::put('message', 'Thêm danh mục thành công!');
    		return Redirect::to('add_category');
    	}
    }

    public function unactive_category($category_id){
        $this->check_login();
    	$unactive_category = DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status'=>1]);
    	Session::put('message', 'Danh mục đã được kích hoạt!');
    	return Redirect::to('all_category');
    }

	public function active_category($category_id){
        $this->check_login();
	    $active_category = DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status'=>0]);
    	Session::put('message', 'Danh mục đã tắt kích hoạt!');
    	return Redirect::to('all_category');
	}

	public function edit_category($category_id){
        $this->check_login();
		$edit_category = DB::table('tbl_category')->where('category_id', $category_id)->get();
    	return view('admin.edit_category')->with('edit_category', $edit_category);
	}

	public function update_category(Request $request, $category_id){
        $this->check_login();
		$data = array();
		$data['category_name'] = $request->category_name;
		$data['category_description'] = $request->category_description;

		DB::table('tbl_category')->where('category_id', $category_id)->update($data);
		Session::put('message', 'Cập nhật danh mục thành công!');
		return Redirect::to('all_category');
	}

	public function delete_category($category_id){
        $this->check_login();
		DB::table('tbl_category')->where('category_id', $category_id)->delete();
		Session::put('message', 'Xóa danh mục thành công!');
		return Redirect::to('all_category');
	}

    //Show category home
    public function show_category_home($category_id){
        $category = DB::table('tbl_category')->where('category_status', '1')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', '1')->get();
        $product_by_category = DB::table('tbl_product')
        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
        ->where('tbl_product.category_id', $category_id)
        ->get();
        $category_name = DB::table('tbl_category')->where('category_id', $category_id)->limit(1)->get();

        return view('pages.category.show_category_home')
        ->with('category', $category)
        ->with('brand', $brand)
        ->with('product_by_category', $product_by_category)
        ->with('category_name', $category_name);
    }
}
