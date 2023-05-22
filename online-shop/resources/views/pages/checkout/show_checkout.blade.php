@extends('layout')
@section('content')
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
            <div class="col-sm-12 col-lg-12 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Giỏ hàng</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                <?php
                                    $content = Cart::content();
                                ?>
                                @foreach($content as $key => $value)
                                <div class="media mb-2 border-bottom">
                                    <div class="media-body"> <a href="{{URL::to('/show_cart')}}"> {{$value->name}}</a>
                                        <div class="small text-muted">Giá tiền: {{number_format($value->price).' VNĐ'}} <span class="mx-2">|</span> Số lượng: {{$value->qty}} <span class="mx-2">| Tổng tiền: </span>
                                            <span> 
                                                <?php
                                                    $sum = $value->qty * $value->price;
                                                    echo number_format($sum).' VNĐ';
                                                ?>
                                            </span>
                                         </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Chi tiết thanh toán</h3>
                            </div>
                            <!-- <div class="d-flex">
                                <div class="font-weight-bold"></div>
                                <div class="ml-auto font-weight-bold"></div>
                            </div> -->
                            <div class="d-flex">
                                <h4>Tổng tiền hàng</h4>
                                <div class="ml-auto font-weight-bold">{{Cart::priceTotal().' VNĐ'}}</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Tổng cộng Voucher giảm giá</h4>
                                <div class="ml-auto font-weight-bold">0 VNĐ</div>
                            </div>
                            <div class="d-flex">
                                <h4>Tổng tiền phí vận chuyển</h4>
                                <div class="ml-auto font-weight-bold"> {{number_format(25000).' VNĐ'}}</div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Tổng thanh toán</h5>
                                <?php
                                    $total = 0;
                                ?>
                                @foreach($content as $key => $value)
                                    <?php
                                        $sum = $value->qty * $value->price;
                                        $total += $sum;
                                    ?>
                                
                                @endforeach
                                <div class="ml-auto h5"> 
                                    <?php
                                    $total = $total + 25000;
                                        echo number_format($total).' VNĐ';
                                    ?>
                                </div>
                                <!-- <div class="ml-auto h5">{{Cart::total()}}</div> -->
                            </div>
                            <hr> </div>
                    </div>
                    <form action="{{URL::to('/order_place')}}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12 col-lg-12">
                            <div class="title"> <span>Phương thức thanh toán</span> </div>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input value="1" id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input name="paymentMethod" id="debit" value="2" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="debit">Thẻ tín dụng/ Ghi nợ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input value="3" id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="paypal">Chuyển khoản ngân hàng</label>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"><button class="ml-auto btn hvr-hover" type="submit">Đặt Hàng</button></div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
@endsection