@extends('admin_layout')
@section('admin_content')
<div class="card-body">
    <div class="card-title">
        <h3 class="text-center title-2 text-uppercase">Thêm Phí Vận Chuyển </h3>
        <?php 
            $message = Session::get('message');
            if($message){
                echo 
                '<div class="message-container">
                    <span class="message-styling alert alert-success">'.$message.'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                          </button>
                    </span>
                </div>';
                Session::put('message', null);
            }
        ?>
    </div>
    <hr>
    <form action="{{URL::to('/')}}" method="post">
        {{ csrf_field() }}
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Chọn tỉnh thành phố</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="city" id="city" class="form-control choose city">
                    <option value="">--Chọn tỉnh thành phố--</option>
                    @foreach($city as $key => $value)
                    <option value="{{$value->matp}}">{{$value->name_tp}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Chọn quận huyện</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="province" id="province" class="form-control choose province">
                    <option value="">--Chọn quận huyện--</option>
                </select>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Chọn xã phường</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="ward" id="ward" class="form-control ward">
                    <option value="">--Chọn xã phường--</option>
                </select>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="text-input" class="form-control-label">Phí vận chuyển</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="text" id="text-input" name="feeship" placeholder="Nhập phí vận chuyển" class="form-control fee_ship">
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary btn-lg add_delivery" style="width: 70%">
                <i class="fa fa-plus"></i> Thêm
            </button>
        </div>
        <div class="card-title mt-5">
            <h3 class="text-center title-2 text-uppercase">Liệt Kê Phí Vận Chuyển </h3>
        </div>
        <hr>
        <div id="load_delivery">
            
        </div>
    </form>
</div>
@endsection