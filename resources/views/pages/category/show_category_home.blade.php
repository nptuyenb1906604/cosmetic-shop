@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                    @foreach($category_name as $key => $value)
                    <li class="breadcrumb-item active">Danh mục {{$value->category_name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    @foreach($category_name as $key => $value)
                    <h1>Danh mục {{$value->category_name}}</h1>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".top-featured">Top featured</button>
                        <button data-filter=".best-seller">Best seller</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row special-list">
            @foreach($product_by_category as $key => $value)
            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">New</p>
                        </div>
                        <img src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Chi tiết"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="So sánh"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Thêm vào mục yêu thích"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>{{$value->product_name}}</h4>
                        <h5>{{number_format($value->product_price).' VNĐ'}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div> -->
        <div class="row special-list">
            @foreach($product_by_category as $key => $value)
            <form>
            {{ csrf_field() }}
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <input type="hidden" name="productId_hidden" value="{{$value->product_id}}">
                            <div class="type-lb">
                                <p class="sale">New</p>
                            </div>
                            <img src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" class="img-fluid" alt="Image">
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