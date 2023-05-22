@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đặt hàng thành công</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
            <p>Cảm ơn bạn đã đặt hàng ở chỗ chúng tôi, chúng tôi sẽ liên hệ với bạn sớm nhất.</p>
    </div>
</div>
<!-- End Cart -->
@endsection