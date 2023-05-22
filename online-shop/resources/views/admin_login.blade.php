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
    <title>Admin Login</title>

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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <!-- <a href="#">
                                <img src="{{('ublic/admin/images/icon/logo.png')}}" alt="Admin">
                            </a> -->
                            <?php 
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="message_styling">'.$message.'</span>';
                                    Session::put('message', null);
                                }
                            ?>
                        </div>
                        <div class="login-form">
                            <form action="{{URL::to('/admin_dashboard')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="admin_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="admin_password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Nhớ lần đăng nhập sau
                                    </label>
                                    <label>
                                        <a href="#">Quên mật khẩu?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng Nhập</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Đăng Nhập Bằng Facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">Đăng Nhập Bằng Gmail</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Bạn chưa có tài khoản?
                                    <a href="#">Đăng Ký Ngay</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="{{asset('public/admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('public/admin/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->