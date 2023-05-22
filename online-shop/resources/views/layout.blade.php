<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    <title>Lavi Shop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="canonical" href="http://localhost/laravel/online-shop/home">

    <!-- <meta property="og:image" content="{{$image_og}}" />
    <meta property="og:site_name" content="thiatv.com" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="website" /> -->


    <!-- Site Icons -->
    <!-- <link rel="shortcut icon" href="{{URL::to('public/frontend/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{URL::to('public/frontend/images/apple-touch-icon.png')}}"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/custom.css')}}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Liên hệ: <a href="#"> 093 813 7777</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="{{URL::to('/login_checkout')}}"><i class="fa fa-user s_color"></i> Tài khoản </a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Địa chỉ</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-box">
                        <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id){
                        ?>
                                <a id="basic" class="selectpicker show-tick form-control" href="{{URL::to('/logout_customer')}}"><i class="fa-solid fa-lock"></i> Đăng xuất</a>
                        <?php
                            }else{
                        ?>
                                <a id="basic" class="selectpicker show-tick form-control" href="{{URL::to('/login_checkout')}}"><i class="fa-solid fa-lock"></i> Đăng nhập</a>
                        <?php
                            }
                        ?>
                        <!-- <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                            <option>Đăng Ký</option>
                            <a id="basic" class="selectpicker show-tick form-control" href="{{URL::to('/login_checkout')}}">gg</a>
                        </select> -->
                    </div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm 20% cho toàn bộ giao dịch. Mã khuyến mãi: laviT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm 20% - 30% cho các sản phẩm Kem chống nắng
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm 25% cho học sinh, sinh viên
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="{{URL::to('public/frontend/images/logo.png')}}" class="logo" alt="" width="100px" height="100px"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active styling-3-li"><a class="nav-link" href="{{URL::to('/home')}}">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle styling-3-li" data-toggle="dropdown">CỬA HÀNG</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.html">Menu</a></li>
                                <li><a href="shop-detail.html">Chi tiết về cửa hàng</a></li>
                                <li><a href="{{URL::to('/show_cart')}}">Giỏ hàng</a></li>
                                <li><a href="checkout.html">Thanh toán</a></li>
                                <li><a href="my-account.html">Tài khoản</a></li>
                                <li><a href="wishlist.html">Yêu thích</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle styling-3-li" data-toggle="dropdown" href="#">Danh Mục</a>
                            <ul class="dropdown-menu">
                                @foreach($category as $key => $value)
                                <li><a href="{{URL::to('/category_home/'.$value->category_id)}}">{{$value->category_name}}</li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Thương Hiệu</a>
                            <ul class="dropdown-menu">
                                @foreach($brand as $key => $value)
                                <li><a href="{{URL::to('/brand_home/'.$value->brand_id)}}">{{$value->brand_name}}</li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.html">Liên hệ</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge"></span>
                                <p>Giỏ Hàng</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <?php
                $content = Cart::content();
            ?>
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        @foreach($content as $key => $value)
                        <li>
                            <a href="#" class="photo"><img src="{{URL::to('public/upload_image/product/'.$value->options->image)}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">{{$value->name}}</a></h6>
                            <p>1x - <span class="price">{{number_format($value->price).' VNĐ'}}</span></p>
                        </li>
                        @endforeach
                        <li class="total">
                            <span class="float-right"><strong>Tổng tiền: </strong>{{Cart::total().' VNĐ'}}</span>
                            <a href="#" class="btn btn-default hvr-hover btn-cart">Xem Giỏ Hàng</a>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <form action="{{URL::to('/search')}}" method="post">
                {{ csrf_field() }}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input name="search_keyword" type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                    <button type="button" class="btn btn-light">Tìm</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Top Search -->

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

    <div>
        @yield('content')
    </div>

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Thời gian làm việc</h3>
                            <ul class="list-time">
                                <li>Thứ 2 - 6: 08.00 sáng - 05.00 chiều</li> <li>Thứ 7: 10.00 sáng - 08.00 chiều</li> <li>Chủ nhật: <span>Nghỉ</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Góp ý</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Địa chỉ Email*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Gửi</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Phương tiện truyền thông</h3>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Về chúng tôi</h4>
                            <p>Lavi shop luôn tôn trọng khách hàng, lấy niềm vui, sự hài lòng của khách hàng để làm động lực, không ngừng tìm kiếm các sản phẩm tốt nhất để mỗi khách hàng đều có thể trở nên tự tin và xinh đẹp hơn. Các hãng thương hiệu mỹ phẩm ở Hasaki luôn là các thương hiệu uy tín, được mọi người tin dùng như : Secret Key, Laneige, Vichy, Avène, Yves Rocher, Laroche Posay, Lancôme,...Bên cạnh đó khi mua hàng ở Hasaki, khách luôn được giá ưu đãi tốt nhất, dịch vụ nhanh chóng & nhiều chương trình Khuyến Mãi khác.</p>                             
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Thông tin</h4>
                            <ul>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Dịch vụ khách hàng</a></li>
                                <li><a href="#">Chỉ đường</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Liên Hệ Qua</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Địa chỉ: đường 3/2 <br>Q. Ninh Kiều,<br> TP. Cần thơ </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Số điện thoại: <a href="tel:+1-888705770">093 813 7777</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">lavishop@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <!-- <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p> -->
        <p>Bản quyền © 2023 Lavi.vn Công Ty cổ phần <a href="#">LAVI BEAUTY & CLINIC</a>.</p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('public/frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('public/frontend/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('public/frontend/js/inewsticker.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootsnav.js.')}}"></script>
    <script src="{{asset('public/frontend/js/images-loded.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/isotope.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/form-validator.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/contact-form-script.js')}}"></script>
    <script src="{{asset('public/frontend/js/custom.js')}}"></script>
</body>

</html>