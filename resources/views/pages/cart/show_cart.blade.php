@extends('layout')
@section('content')
<!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <?php
                            $content = Cart::content();
                            // echo '<pre>';
                            //     print_r($content);
                            // echo '</pre>';  
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $key => $value)
                                <form action="{{URL::to('/update_cart/'.$value->rowId)}}" method="post">
                                    {{ csrf_field() }}
                                <input type="hidden" name="rowId_hidden" value="{{$value->rowId}}">
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{URL::to('public/upload_image/product/'.$value->options->image)}}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">{{$value->name}}</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{number_format($value->price).' VNĐ'}}</p>
                                    </td>
                                    <td class="quantity-box"><input name="update_qty" type="number" size="4" value="{{$value->qty}}" min="1" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>
                                            <?php
                                                $sum = $value->qty * $value->price;
                                                echo number_format($sum).' VNĐ';
                                            ?>
                                        </p>
                                    </td>
                                    <td>
                                        <button class="btn-show-cart" type="submit"><i class="fa-sharp fa-solid fa-pen"></i></button>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{URL::to('/delete_cart/'.$value->rowId)}}">
									       <i class="fas fa-times"></i>
								        </a>
                                    </td>
                                </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input form="formBtn" value="Cập Nhật" type="submit">
                    </div>
                </div>
            </div> -->

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Tổng Đơn Hàng</h3>
                        <!-- <div class="d-flex">
                            <h4>Tổng tiền</h4>
                            <div class="ml-auto font-weight-bold">{{Cart::subtotal().' VNĐ'}}</div>
                        </div> -->
                        <!-- <div class="d-flex">
                            <h4>Chiết khấu</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div> -->
                        <hr class="my-1">
                        <!-- <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div> -->
                        <!-- <div class="d-flex">
                            <h4>Thuế</h4>
                            <div class="ml-auto font-weight-bold">{{Cart::tax(0).' VNĐ'}}</div>
                        </div> -->
                        <!-- <div class="d-flex">
                            <h4>Phí vận chuyển</h4>
                            <div class="ml-auto font-weight-bold">{{number_format(25000).' VNĐ'}}</div>
                        </div> 
                        <hr> -->
                        <div class="d-flex gr-total">
                            <h5>Thành tiền</h5>
                            <div class="ml-auto h5">{{Cart::priceTotal().' VNĐ'}}</div>
                        </div>
                        <hr> </div>
                </div>
                <?php
                    $customer_id = Session::get('customer_id');
                    $shipping_id = Session::get('shipping_id');
                    if($customer_id && $shipping_id){
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
    </div>
<!-- End Cart -->
@endsection