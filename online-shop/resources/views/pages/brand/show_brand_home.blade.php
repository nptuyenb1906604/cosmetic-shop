@extends('layout')
@section('content')
<!-- Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    @foreach($brand_name as $key => $value)
                    <h1>Thương hiệu {{$value->brand_name}}</h1>
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

        
        <div class="row special-list">
            @foreach($product_by_brand as $key => $value)
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
        </div>
    </div>
</div>
@endsection