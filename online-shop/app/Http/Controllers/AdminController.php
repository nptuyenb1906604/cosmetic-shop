<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function check_login(){
        $admin_id = Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('admin')->send();
        }
    }

    public function show_login(){
    	return view('admin_login');
    }

    public function show_dashboard(){
        $this->check_login();
    	return view('admin.dashboard');
    }

    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

    	if($result){
    		Session::put('admin_name', $result->admin_name);
    		Session::put('admin_email', $result->admin_email);
            Session::put('admin_id', $result->admin_id);
    		return Redirect::to('dashboard');
    	}else{
    		Session::put('message', 'Tài khoản hoặc mật khẩu bị sai! Xin hãy nhập lại.');
    		return Redirect::to('admin');
    	}
    }

    public function logout(){
    	Session::put('admin_name', null);
		Session::put('admin_email', null);
        Session::put('admin_id', null);
		return Redirect::to('admin');
    }
}
