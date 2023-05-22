@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Cart  -->
    <div class="cart-box-main">
        @if(Session::get('cart'))

        <div class="container">
            <?php 
                $message = Session::get('message');
                if($message){
                    echo 
                    '<div class="alert alert-success" role="alert">
                      '.$message.'
                    </div>';
                    Session::put('message', null);
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <form action={{url('/update_cart_ajax')}} method="post" id="formBtn">
                            @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $total = 0; ?>
                                @foreach(Session::get('cart') as $key => $value)
                                <input type="hidden" name="rowId_hidden" value="">
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{asset('public/upload_image/product/'.$value['product_image'])}}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">{{$value['product_name']}}</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{number_format($value['product_price'],0,',','.').' VNĐ'}}</p>
                                    </td>
                                    <td class="quantity-box"><input name="cart_qty[{{$value['session_id']}}]" type="number" size="4" value="{{$value['product_qty']}}" min="1" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>
                                            <?php
                                                $sum = $value['product_qty'] * $value['product_price'];
                                                echo number_format($sum).' VNĐ';
                                                $total += $sum;
                                            ?>
                                        </p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{URL::to('/delete_product_ajax/'.$value['session_id'])}}">
									       <i class="fas fa-times"></i>
								        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row my-3">
                <div class="col-lg-2 col-sm-1">
                    <div class="update-box">
                        <input form="formBtn" value="Cập Nhật" type="submit">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <div class="col-12 d-flex shopping-box">
                        <a href="{{URL::to('/delete_all_product_ajax')}}" class="ml-auto btn hvr-hover">Xóa Tất Cả</a>
                    </div>
                </div>
            </div>
            
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Tổng Đơn Hàng</h3>
                        <hr class="my-1">
                        <div class="d-flex gr-total">
                            <h5>Thành tiền</h5>
                            <div class="ml-auto h5">
                                {{number_format($total,0,',','.').' VNĐ'}}
                            </div>
                        </div>
                        <hr> 
                    </div>
                </div>
                <?php
                    $customer_id = Session::get('customer_id');
                    if($customer_id){
                ?>
                        <div class="col-12 d-flex shopping-box"><a href="{{URL::to('/address_checkout')}}" class="ml-auto btn hvr-hover">Thanh Toán</a></div>
                <?php
                    }
                    else{
                ?>
                        <div class="col-12 d-flex shopping-box"><a href="{{URL::to('/login_checkout')}}" class="ml-auto btn hvr-hover">Thanh Toán</a></div>
                <?php
                    }
                ?>
            </div>
        </div>
        @else
            <?php 
                echo '<div class="text-center display-5">Hãy thêm sản phẩm vào giỏ hàng</div>';
            ?>
        @endif
    </div>
<!-- End Cart -->
@endsection