@extends('layout')
@section('content')
<div class="cart-box-main">
    <div class="container">
        <div class="col-sm-12 col-lg-12 mb-3">
            <div class="checkout-address">
                <div class="title-left">
                    <h3>Thông tin thanh toán</h3>
                </div>
                <form class="needs-validation" novalidate action="{{URL::to('/save_shipping')}}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="firstName">Họ và Tên *</label>
                        <input name="shipping_name" type="text" class="form-control" id="firstName" placeholder=""required>
                        <div class="invalid-feedback"> Xin hãy nhập Họ và Tên! </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email *</label>
                        <input name="shipping_email" type="email" class="form-control" id="email" placeholder="">
                        <div class="invalid-feedback"> Xin hãy nhập Email hợp lệ để cập nhật trạng thái đơn hàng. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Địa chỉ *</label>
                        <input name="shipping_address" type="text" class="form-control" id="address" placeholder="" required>
                        <div class="invalid-feedback"> Xin hãy nhập địa chỉ giao hàng. </div>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber">Số điện thoại *</label>
                        <input name="shipping_phone" type="text" class="form-control" id="phoneNumber" placeholder="" value="" required>
                        <div class="invalid-feedback"> Xin hãy nhập số điện thoại! </div>
                    </div>
                    <div class="mb-3">
                        <label for="note">Thêm lưu ý</label>
                        <textarea name="shipping_note" row="5" class="form-control" id="note"></textarea>
                    </div>
                    <hr class="mb-4">
                    <!-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Lưu thông tin cho lần thanh toán sau</label>
                    </div> -->
                    <div class="col-12 d-flex shopping-box"><button class="ml-auto btn hvr-hover" type="submit">Lưu Thông Tin</button></div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection