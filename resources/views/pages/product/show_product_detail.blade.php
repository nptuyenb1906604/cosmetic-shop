@extends('layout')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            @foreach($product_detail as $key => $value)
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" alt="First slide"> </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" alt="Second slide"> </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" alt="Third slide"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span> 
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
                        <i class="fa fa-angle-right" aria-hidden="true"></i> 
                        <span class="sr-only">Next</span> 
                    </a>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                            <img class="d-block w-100 img-fluid" src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="1">
                            <img class="d-block w-100 img-fluid" src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="2">
                            <img class="d-block w-100 img-fluid" src="{{URL::to('public/upload_image/product/'.$value->product_image)}}" alt="" />
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="productId_hidden" value="{{$value->product_id}}">
                        <h2>{{$value->product_name}}</h2>
                        <h5>Thương hiệu: <span>{{$value->brand_name}}</span></h5>
                        <h5>Giá: <span>{{number_format($value->product_price).' VNĐ'}}</span></h5>
                        <h4>Mô tả sản phẩm:</h4>
                        <p>{!!$value->product_description!!}</p>
                        <ul>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Số lượng</label>
                                    <input type="hidden" class="cart_product_id_{{$value->product_id}}" value="{{$value->product_id}}">
                                    <input type="hidden" class="cart_product_name_{{$value->product_id}}" value="{{$value->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$value->product_id}}" value="{{$value->product_image}}">
                                    <input type="hidden" class="cart_product_price_{{$value->product_id}}" value="{{$value->product_price}}">
                                    <input class="form-control cart_product_qty_{{$value->product_id}}" name="product_quantity" value="1" min="1" max="20" type="number">
                                </div>
                            </li>
                        </ul>

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <input style="color: white; font-weight: bold;" type="submit" value="Mua ngay" class="btn hvr-hover" data-fancybox-close="">
                                <input style="color: white; font-weight: bold;" type="button" value="Thêm vào giỏ hàng" class="btn hvr-hover cart add_to_cart" data-id_product="{{$value->product_id}}">
                            </div>
                        </div>
                    </form>
                    <div class="add-to-btn">
                        <div class="add-comp">
                            <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Thêm vào yêu thích</a>
                        </div>
                        <div class="share-bar">
                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- <div class="row my-5">
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    <h2>Đánh giá</h2>
                </div>
                <div class="card-body">
                    <div class="media mb-3">
                        <div class="mr-2"> 
                            <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <p></p>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                    <hr>
                    <a href="#" class="btn hvr-hover">Bình luận</a>
                </div>
            </div>
        </div> -->

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Sản Phẩm Tương Tự</h1>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    @foreach($replated_products as $key => $value)
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="{{URL::to('/public/upload_image/product/'.$value->product_image)}}" class="img-fluid" alt="Image">
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
                                <h5>{{number_format($value->product_price).' VNĐ'}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
@endsection