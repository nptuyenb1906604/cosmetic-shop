<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Login;
use App\Social;
use Socialite;
session_start();

class AdminController extends Controller
{
    //Login Facebook
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            Session::put('admin_email',$account_name->admin_email);

            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $lavi = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'FACEBOOK'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''
                ]);
            }
            $lavi->login()->associate($orang);
            $lavi->save();

            $account_name = Login::where('admin_id',$lavi->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            Session::put('admin_email',$account_name->admin_email);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }

    //Login Google
    public function login_google(){
        return Socialite::driver('google')->redirect();
   }

    public function callback_google(){
            $users = Socialite::driver('google')->stateless()->user(); 
           
            $authUser = $this->findOrCreateUser($users,'google');
            if($authUser){
                $account_name = Login::where('admin_id',$authUser->user)->first();
                Session::put('admin_name',$account_name->admin_name);
                Session::put('admin_id',$account_name->admin_id);
                Session::put('admin_email',$account_name->admin_email);
            }elseif($lavi){
                $account_name = Login::where('admin_id',$authUser->user)->first();
                Session::put('admin_name',$account_name->admin_name);
                Session::put('admin_id',$account_name->admin_id);
                Session::put('admin_email',$account_name->admin_email);
            }
            
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    }

    public function findOrCreateUser($users, $provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $lavi = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);

            $orang = Login::where('admin_email',$users->email)->first();

                if(!$orang){
                    $orang = Login::create([
                        'admin_name' => $users->name,
                        'admin_email' => $users->email,
                        'admin_password' => '',
                        'admin_phone' => ''
                    ]);
                }
            $lavi->login()->associate($orang);
            $lavi->save();
            return $lavi;
            // $account_name = Login::where('admin_id',$lavi->user)->first();
            // Session::put('admin_name',$account_name->admin_name);
            // Session::put('admin_id',$account_name->admin_id);
            // Session::put('admin_email',$account_name->admin_email);
            // return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }


    public function check_login(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
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
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']); 
        $result = Login::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_email', $result->admin_email);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('dashboard');
        }else{
            Session::put('message', 'Tài khoản hoặc mật khẩu bị sai! Xin hãy nhập lại.');
            return Redirect::to('admin');
        }
    	// $admin_email = $request->admin_email;
    	// $admin_password = md5($request->admin_password);

    	// $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

    	// if($result){
    	// 	Session::put('admin_name', $result->admin_name);
    	// 	Session::put('admin_email', $result->admin_email);
     //        Session::put('admin_id', $result->admin_id);
    	// 	return Redirect::to('dashboard');
    	// }else{
    	// 	Session::put('message', 'Tài khoản hoặc mật khẩu bị sai! Xin hãy nhập lại.');
    	// 	return Redirect::to('admin');
    	// }
    }

    public function logout(){
    	Session::put('admin_name', null);
		Session::put('admin_email', null);
        Session::put('admin_id', null);
		return Redirect::to('admin');
    }
}
