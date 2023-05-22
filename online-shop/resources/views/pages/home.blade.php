@extends('layout')
@section('content')
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
                            <!-- <input type="submit" value="Thêm vào giỏ hàng" class="btn hvr-hover cart" data-fancybox-close=""> -->
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


<!-- Blog  -->
<!-- <div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>latest blog</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{('public/frontend/images/blog-img.jpg')}}" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Fusce in augue non nisi fringilla</h3>
                            <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-comments"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{('public/frontend/images/blog-img-01.jpg')}}" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Fusce in augue non nisi fringilla</h3>
                            <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-comments"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{('public/frontend/images/blog-img-02.jpg')}}" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Fusce in augue non nisi fringilla</h3>
                            <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-comments"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection