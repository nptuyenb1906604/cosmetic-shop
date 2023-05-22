@extends('layout')
@section('content')
<!-- Start Cart  -->
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đặt hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<div class="cart-box-main">
    <div class="container">
        <form class="needs-validation" novalidate method="post">
        {{ csrf_field() }}
        <div class="col-sm-12 col-lg-12 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Điền thông tin gửi hàng</h3>
                    </div>
                    
                        <div class="mb-3">
                            <label for="firstName">Họ và Tên *</label>
                            <input name="shipping_name" type="text" class="form-control shipping_name" id="firstName" placeholder=""required>
                            <div class="invalid-feedback"> Xin hãy nhập Họ và Tên! </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email *</label>
                            <input name="shipping_email" type="email" class="form-control shipping_email" id="email" placeholder="">
                            <div class="invalid-feedback"> Xin hãy nhập Email hợp lệ để cập nhật trạng thái đơn hàng. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ chi tiết*</label>
                            <input name="shipping_address" type="text" class="form-control shipping_address" id="address" placeholder="" required>
                            <div class="invalid-feedback"> Xin hãy nhập địa chỉ giao hàng. </div>
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber">Số điện thoại *</label>
                            <input name="shipping_phone" type="text" class="form-control shipping_phone" id="phoneNumber" placeholder="" value="" required>
                            <div class="invalid-feedback"> Xin hãy nhập số điện thoại! </div>
                        </div>
                        <div class="mb-3">
                            <label for="note">Thêm lưu ý</label>
                            <textarea name="shipping_note" row="5" class="form-control shipping_note" id="note"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="title"> 
                                <span>Phương thức thanh toán</span> 
                            </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input value="1" id="credit" name="paymentMethod" type="radio" class="custom-control-input shipping_payment" checked required>
                                    <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input value="2" name="paymentMethod" id="debit" type="radio" class="custom-control-input shipping_payment" required>
                                    <label class="custom-control-label" for="debit">Thẻ tín dụng/ Ghi nợ</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input value="3" id="paypal" name="paymentMethod" type="radio" class="custom-control-input shipping_payment" required>
                                    <label class="custom-control-label" for="paypal">Chuyển khoản ngân hàng</label>
                                </div>
                            </div>
                        </div>
                        @if(Session::get('fee'))
                            <input name="order_fee" type="hidden" class="order_fee" value="{{Session::get('fee')}}">
                        @else 
                            <input name="order_fee" type="hidden" class="order_fee" value="30000">
                        @endif
                        @if(Session::get('matp') && Session::get('maqh') && Session::get('xaid'))
                            <input name="order_matp" type="hidden" class="order_matp" value="{{Session::get('matp')}}">
                            <input name="order_maqh" type="hidden" class="order_maqh" value="{{Session::get('maqh')}}">
                            <input name="order_xaid" type="hidden" class="order_xaid" value="{{Session::get('xaid')}}">
                        @endif
                        <hr class="mb-4">
                        <!-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Lưu thông tin cho lần thanh toán sau</label>
                        </div> -->
                </div>
            </div>

            <div class="col-sm-12 col-lg-12 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Giỏ hàng</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                @php 
                                    $total = 0; 
                                @endphp
                                @if(Session::get('cart'))
                                @foreach(Session::get('cart') as $key => $value)
                                <div class="media mb-2 border-bottom">
                                    <div class="media-body"> 
                                        <img src="{{asset('public/upload_image/product/'.$value['product_image'])}}" alt="{{$value['product_name']}}" width="100px">
                                        <a href="{{URL::to('/show_cart')}}"> {{$value['product_name']}}</a>
                                        <div class="small text-muted">Giá tiền: {{number_format($value['product_price']).' VNĐ'}} 
                                            <span class="mx-2">|</span> Số lượng: {{$value['product_qty']}} 
                                            <span class="mx-2">| Tổng tiền: </span>
                                            <span> 
                                                <?php
                                                    $sum = $value['product_qty'] * $value['product_price'];
                                                    echo number_format($sum).' VNĐ';
                                                    $total += $sum;
                                                ?>
                                            </span>
                                         </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Chi tiết thanh toán</h3>
                            </div>
                            <div class="d-flex">
                                <h4>Tổng tiền hàng</h4>
                                <div class="ml-auto font-weight-bold">{{number_format($total,0,',','.').' VNĐ'}}</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Tổng Voucher giảm giá</h4>
                                <div class="ml-auto font-weight-bold">0 VNĐ</div>
                            </div>
                            <div class="d-flex">
                                <h4>Tổng tiền phí vận chuyển</h4>
                                <div class="ml-auto font-weight-bold"> 
                                    <span>{{number_format(Session::get('fee'),0,',','.').' VNĐ'}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Tổng thanh toán</h5>
                                <div class="ml-auto h5">
                                    <span>
                                        @php
                                            $total_all = $total + Session::get('fee');
                                            echo number_format($total_all,0,',','.').' VNĐ';
                                        @endphp
                                    </span>
                                </div>
                            </div>
                            <hr> 
                        </div>
                    </div>
                    <div class="col-12 d-flex shopping-box"><button class="ml-auto btn hvr-hover send_order" type="button">Đặt Hàng</button></div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- End Cart -->
@endsection