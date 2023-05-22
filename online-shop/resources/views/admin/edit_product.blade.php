@extends('admin_layout')
@section('admin_content')
<div class="card-body">
    <div class="card-title">
        <h3 class="text-center title-2 text-uppercase">Cập Nhật Sản Phẩm</h3>
        
    </div>
    <hr>
    <div>
    @foreach($edit_product as $key => $value_produtc)
    <div>
    <form action="{{URL::to('/update_product/'.$value_produtc->product_id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="text-input" class="form-control-label">Tên sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="text" id="text-input" name="product_name"class="form-control" value="{{$value_produtc->product_name}}">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="textarea-input" class="form-control-label">Mô tả sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <textarea name="product_description" id="textarea-input" rows="6" class="form-control">{{$value_produtc->product_description}}</textarea>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="textarea-input" class="form-control-label">Nội dung sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <textarea name="product_content" id="textarea-input" rows="6" class="form-control">{{$value_produtc->product_content}}</textarea>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="text-input" class="form-control-label">Giá sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="text" id="text-input" name="product_price" class="form-control" value="{{$value_produtc->product_price}}">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="file-input" class=" form-control-label">Hình ảnh sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="file" id="file-input" name="product_image" class="form-control-file">
                <img src="{{URL::to('public/upload_image/product/'.$value_produtc->product_image)}}" width="100px" height="100px" style="margin-top: 10px;">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="select" class="form-control-label">Danh mục sản phẩm</label>
            </div>
            <div class="col-11 col-md-9">
                <select name="product_category" id="select" class="form-control">
                    @foreach($category as $key => $value_category)
                        @if($value_category->category_id == $value_produtc->category_id)
                            <option selected="selected" value="{{$value_category->category_id}}">{{$value_category->category_name}}</option>
                        @else 
                            <option value="{{$value_category->category_id}}">{{$value_category->category_name}}</option>
                        @endif
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
                    @foreach($brand as $key => $value_brand)
                        @if($value_brand->brand_id == $value_produtc->brand_id)
                            <option selected="selected" value="{{$value_brand->brand_id}}">{{$value_brand->brand_name}}</option>
                        @else 
                            <option value="{{$value_brand->brand_id}}">{{$value_brand->brand_name}}</option>
                        @endif
                    @endforeach    
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 70%">
                <i class="fa fa-plus"></i> Cập nhật
            </button>
        </div>
    </form>
    </div>
    @endforeach
    </div>
</div>
@endsection  