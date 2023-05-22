@extends('admin_layout')
@section('admin_content')
<div class="card-body">
    <div class="card-title">
        <h3 class="text-center title-2 text-uppercase">Thêm Sản Phẩm</h3>
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
    <form action="{{URL::to('/save_product')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="text-input" class="form-control-label">Tên sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="text" id="text-input" name="product_name" placeholder="Nhập tên sản phẩm" class="form-control">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="textarea-input" class="form-control-label">Mô tả sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <textarea name="product_description" id="textarea-input" rows="6" placeholder="Mô tả gì đó về sản phẩm này..." class="form-control"></textarea>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="textarea-input" class="form-control-label">Nội dung sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <textarea name="product_content" id="textarea-input1" rows="6" placeholder="Viết gì đó về sản phẩm này..." class="form-control"></textarea>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="text-input" class="form-control-label">Giá sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="text" id="text-input" name="product_price" placeholder="Nhập giá sản phẩm" class="form-control">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="file-input" class=" form-control-label">Hình ảnh sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="file" id="file-input" name="product_image" class="form-control-file">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Danh mục sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="product_category" id="select" class="form-control">
                    <option disabled="disabled" selected="selected">Chọn danh mục</option>
                    @foreach($category as $key => $value)
                    <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                    @endforeach                
                </select>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Thương hiệu sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="product_brand" id="select" class="form-control">
                    <option disabled="disabled" selected="selected">Chọn thương hiệu</option>
                    @foreach($brand as $key => $value)
                    <option value="{{$value->brand_id}}">{{$value->brand_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Trạng thái</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="product_status" id="select" class="form-control">
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