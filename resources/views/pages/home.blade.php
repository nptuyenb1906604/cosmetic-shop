@extends('layout')
@section('content')
<!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{URL::to('public/frontend/images/banner1.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p><a class="btn hvr-hover" href="#">Mua Ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{URL::to('public/frontend/images/banner2.png')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p><a class="btn hvr-hover" href="#">Mua Ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{URL::to('public/frontend/images/banner3.png')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p><a class="btn hvr-hover" href="#">Mua Ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

<!-- Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Sản Phẩm Hiện Có</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">Tất cả</button>
                        <button data-filter=".top-featured">Sản phẩm mới</button>
                        <button data-filter=".best-seller">Sản phẩm bán chạy</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row special-list">
            @foreach($product as $key => $value)
            <form>
            {{ csrf_field() }}
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <input type="hidden" name="productId_hidden" value="{{$value->product_id}}">
                            <div class="type-lb">
                                <p class="sale">New</p>
                            </div>
                            <img src="public/upload_image/product/{{$value->product_image}}" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="{{URL::to('/product_detail/'.$value->product_id)}}" data-toggle="tooltip" data-placement="right" title="Chi tiết"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="So sánh"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Thêm vào mục yêu thích"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <input type="hidden" class="cart_product_id_{{$value->product_id}}" value="{{$value->product_id}}">
                                <input type="hidden" class="cart_product_name_{{$value->product_id}}" value="{{$value->product_name}}">
                                <input type="hidden" class="cart_product_image_{{$value->product_id}}" value="{{$value->product_image}}">
                                <input type="hidden" class="cart_product_price_{{$value->product_id}}" value="{{$value->product_price}}">
                                <input type="hidden" class="cart_product_qty_{{$value->product_id}}" value="1">
                                <input type="button" value="Thêm vào giỏ hàng" class="btn hvr-hover cart add_to_cart text-white font-weight-bold" data-id_product="{{$value->product_id}}">
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>{{$value->product_name}}</h4>
                            <h5>{{number_format($value->product_price,0,',','.').' VNĐ'}}</h5>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection