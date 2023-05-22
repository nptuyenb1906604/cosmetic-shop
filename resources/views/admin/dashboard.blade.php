@extends('admin_layout')
@section('admin_content')
<!-- BREADCRUMB-->
<section class="au-breadcrumb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <div class="au-breadcrumb-left">
                        <span class="au-breadcrumb-span">Bạn đang ở:</span>
                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                            <li class="list-inline-item active">
                                <a href="#">Trang Chủ</a>
                            </li>
                            <li class="list-inline-item seprate">
                                <span>/</span>
                            </li>
                            <li class="list-inline-item">Tổng Quan</li>
                        </ul>
                    </div>
                    <form class="au-form-icon--sm" action="" method="post">
                        <input class="au-input--w300 au-input--style2" type="text" placeholder="Tìm kiếm...">
                        <button class="au-btn--submit2" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<!-- WELCOME-->
<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-4">Chào mừng trở lại
                    <span>
                        <?php 
                        $name = Session::get('admin_name');
                        if($name)
                        {
                            echo $name.'!';
                        }
                    ?>
                    </span>
                </h1>
                <hr class="line-seprate">
            </div>
        </div>
    </div>
</section>
<!-- END WELCOME-->

<!-- DATA TABLE-->
<section class="p-t-20">
    
</section>
<!-- END DATA TABLE-->
@endsection