@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Thông tin tài khoản</h3>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr-shadow">
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                    </tr>
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br></br>

<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Thông tin người nhận</h3>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Phương thức thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr-shadow">
                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>{{$shipping->shipping_note}}</td>
                        <td>
                            @if($shipping->shipping_payment == 1)
                                Thanh toán khi nhận hàng
                            @elseif($shipping->shipping_payment == 2)
                                Thẻ tín dụng/ Ghi nợ
                            @else 
                                Chuyển khoản ngân hàng
                            @endif
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br></br>

<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Địa chỉ nhận hàng</h3>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                        <th>Tỉnh thành phố</th>
                        <th>Quận huyện</th>
                        <th>Xã phường</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr-shadow">
                        <td>{{$tp->name_tp}}</td>
                        <td>{{$qh->name_qh}}</td>
                        <td>{{$xp->name_xp}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                    </tr>
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br></br>

<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Chi tiết đơn hàng</h3>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            Số thứ tự
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $total = 0;
                         $i = 0; 
                         $feeship = 0;      
                    @endphp
                    @foreach($order_detail as $key =>$value)
                        @php 
                            $i++;
                            $feeship = $value->product_feeship;
                        @endphp
                        <tr class="tr-shadow">
                            <td>{{$i}}</td>
                            <td>{{$value->product_name}}</td>
                            <td><img src="{{URL::to('/public/upload_image/product/'.$value->product_image)}}" width="100px" height="100px"></td>
                            <td>{{number_format($value->product_price,0,',','.').' VNĐ'}}</td>
                            <td>{{$value->product_quantity}}</td>
                            <td>
                                @php
                                    $sum = $value->product_quantity * $value->product_price;
                                    echo number_format($sum,0,',','.').' VNĐ';
                                    $total += $sum;
                                @endphp
<!--                                 Cetaphil Gentle Skin Cleanse 500ml62.jpg
 -->                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        @php
                            $total += $feeship;
                        @endphp
                        <td colspan="6" class="bg-primary text-white font-weight-bold">Tổng thanh toán: {{number_format($total,0,',','.').' VNĐ'}} (bao gồm {{number_format($feeship,0,',','.')}} phí vận chuyển)</td>
                    </tr>
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection