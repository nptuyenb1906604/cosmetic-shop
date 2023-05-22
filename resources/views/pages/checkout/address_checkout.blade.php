@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Điền địa chỉ</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<div class="cart-box-main">
    <div class="container">
		<div class="col-sm-12 col-lg-12 mb-3">
		    <div class="checkout-address">
		        <div class="title-left">
		            <h3>Địa chỉ giao hàng</h3>
		        </div>
		        <form>
		            {{ csrf_field() }}
		            <div class="col-md-12 mb-3">
		                <label for="city">Chọn tỉnh thành phố</label>
		                <select name="city" class="wide w-100 choose city" id="city">
		                    <option value="" data-display="Select">--Chọn tỉnh thành phố--</option>
		                    @foreach($city as $key => $value)
		                    <option value="{{$value->matp}}">{{$value->name_tp}}</option>
		                    @endforeach
		                </select>
		                <div class="invalid-feedback">Xin hãy chọn tỉnh thành phố</div>
		            </div>
		            <div class="col-md-12 mb-3">
		                <label for="province">Chọn quận huyện</label>
		                <select name="province" class="wide w-100 choose province" id="province">
		                    <option value="">--Chọn quận huyện--</option>
		                    
		                </select>
		                <div class="invalid-feedback">Xin hãy chọn quận huyện</div>
		            </div>
		            <div class="col-md-12 mb-3">
		                <label for="ward">Chọn xã phường</label>
		                <select name="ward" class="wide w-100 ward" id="ward">
		                    <option value="">--Chọn xã phường--</option>
		                    
		                </select>
		                <div class="invalid-feedback">Xin hãy chọn xã phường</div>
		            </div>
		            <hr class="mb-4">
		            <div class="col-12 d-flex shopping-box"><button class="ml-auto btn hvr-hover calculate_delivery" type="button">Tiếp theo</button></div>
		        </form>
		    </div>
		</div>
	</div>
</div>
@endsection