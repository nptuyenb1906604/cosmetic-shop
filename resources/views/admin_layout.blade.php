<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('public/admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('public/admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('public/admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('public/admin/css/theme.css')}}" rel="stylesheet" media="all">

    <!-- Validation CSS-->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css" rel="stylesheet" media="all"> -->

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        
                            <h3 style="color: white;">AdminLavi<h3>
                        
                        <!-- <a href="#">
                            <img src="{{URL::to('ublic/admin/images/icon/logo-white.png')}}" alt="Admin" />
                        </a> -->
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-tachometer-alt"></i>Tổng quan
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="#">Thống kê</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-table"></i>Danh Mục
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="{{URL::to('/add_category')}}">Thêm danh mục</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/all_category')}}">Liệt kê danh mục</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-table"></i>Thương Hiệu
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="{{URL::to('/add_brand')}}">Thêm thương hiệu</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/all_brand')}}">Liệt kê thương hiệu</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-table"></i>Sản Phẩm
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="{{URL::to('/add_product')}}">Thêm sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/all_product')}}">Liệt kê sản phẩm</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-table"></i>Đơn hàng
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="{{URL::to('/manage_order')}}">Quản lý đơn hàng</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-table"></i>Vận chuyển 
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="{{URL::to('/delivery')}}">Quản lý vận chuyển </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                                <!-- <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="header-button-item js-item-menu">
                            <i class="zmdi zmdi-settings"></i>
                            <div class="setting-dropdown js-dropdown">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-globe"></i>Language</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-pin"></i>Location</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-email"></i>Email</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{URL::to('public/admin/images/icon/avatar.png')}}" alt="Name" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">
                                        <?php 
                                            $name = Session::get('admin_name');
                                            if($name){
                                                echo $name;
                                            } 
                                        ?>
                                    </a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{URL::to('public/admin/images/icon/avatar.png')}}" alt="Name" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">
                                                    <?php 
                                                        $name = Session::get('admin_name');
                                                        if($name){
                                                            echo $name;
                                                        } 
                                                    ?>
                                                </a>
                                            </h5>
                                            <span class="email">
                                                <?php  
                                                    $email = Session::get('admin_email');
                                                    if($email){
                                                        echo $email;
                                                    }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Tài khoản</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Cài đặt</a>
                                        </div>
                                        <!-- <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div> -->
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{URL::to('/logout')}}">
                                            <i class="zmdi zmdi-power"></i>Đăng xuất
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            @yield('admin_content')
            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Bản quyền © 2023 Lavi.vn Công Ty cổ phần <a href="#">LAVI BEAUTY & CLINIC</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('public/admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('public/admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('public/admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('public/admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/select2/select2.min.js')}}"></script>
    <!-- Main JS-->
    <script src="{{asset('public/admin/js/main.js')}}"></script>
    <!-- <script src="{{asset('public/admin/js/jquery.form-validator.min.js')}}"></script>
    <script>
        $.validate({

        });
    </script> -->
    <!-- CK Editor-->
    <script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('textarea-input');
        CKEDITOR.replace('textarea-input1');
    </script>

    <script type="text/javascript">
        $(document).ready(function(){

            fetch_delivery();

            function fetch_delivery(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'{{url('/select_feeship')}}',
                    method:'POST', //post phải có token
                    data:{_token:_token},
                    success:function(data){
                        $('#load_delivery').html(data);
                    }
                });
            }

            $(document).on('blur', '.fee_feeship_edit', function(){
                var feeship_id = $(this).data('feeship_id');
                var feeship_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'{{url('/update_delivery')}}',
                    method:'POST',
                    data:{feeship_id:feeship_id,feeship_value:feeship_value,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
            });

            $('.add_delivery').click(function(){
                var city = $('.city').val();
                var province = $('.province').val();
                var ward = $('.ward').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                
                $.ajax({
                    url:'{{url('/insert_delivery')}}',
                    method:'POST',
                    data:{city:city,province:province,ward:ward,fee_ship:fee_ship,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
            });
            
            $('.choose').on('change', function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                
                if(action == 'city'){
                    result = 'province';
                }else{
                    result = 'ward';
                }
                $.ajax({
                    url:'{{url('/select_delivery')}}',
                    method:'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
        });
    </script>

</body>

</html>
<!-- end document-->
