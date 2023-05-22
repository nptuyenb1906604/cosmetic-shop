@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng nhập - Đăng ký</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng Nhập</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng Ký</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="{{URL::to('/login_home')}}" method="post">
					{{ csrf_field() }}
					<div class="group">
						<label for="pass" class="label">Địa Chỉ Email</label>
						<input name="login_email" id="pass" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Mật khẩu</label>
						<input name="login_password" id="pass" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Nhớ lần Đăng nhập sau</label>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Đăng Nhập">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">Quên mật khẩu?</a>
					</div>
				</form>
			</div>
			<form action="{{URL::to('/register_home')}}" method="post">
				<div class="sign-up-htm">
					{{ csrf_field() }}
					<div class="group">
						<label for="user" class="label">Tên đăng nhập</label>
						<input name="customer_name" id="user" type="text" class="input">
					</div> 
					<div class="group">
						<label for="pass" class="label">Mật khẩu</label>
						<input name="customer_password" id="pass" type="password" class="input" data-type="password">
					</div>
					<!-- <div class="group">
						<label for="pass" class="label">Nhập Lại Mật khẩu</label>
						<input id="pass" type="password" class="input" data-type="password">
					</div> -->
					<div class="group">
						<label for="pass" class="label">Địa Chỉ Email</label>
						<input name="customer_email" id="pass" type="text" class="input">
					</div>
					<div class="group">
						<label for="phone" class="label">Số điện thoại</label>
						<input name="customer_phone" id="phone" type="text" class="input">
					</div>
					<div class="group">
						<input type="submit" class="button" value="Đăng Ký">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection