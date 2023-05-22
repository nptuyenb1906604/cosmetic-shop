@extends('admin_layout')
@section('admin_content')
<div class="card-body">
    <div class="card-title">
        <h3 class="text-center title-2 text-uppercase">Thêm Thương Hiệu</h3>
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
    <form action="{{URL::to('/save_brand')}}" method="post">
        {{ csrf_field() }}
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="text-input" class="form-control-label">Tên thương hiệu</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="text" id="text-input" name="brand_name" placeholder="Nhập tên thương hiệu" class="form-control">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="textarea-input" class="form-control-label">Mô tả thương hiệu</label>
            </div>
            <div class="col-11 col-md-9">
                <textarea name="brand_description" id="textarea-input" rows="9" placeholder="Viết gì đó về thương hiệu này..." class="form-control"></textarea>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Trạng thái</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="brand_status" id="select" class="form-control">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Không kích hoạt</option>
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 70%">
                <i class="fa fa-plus"></i> Thêm
            </button>
        </div>
    </form>
</div>
@endsection