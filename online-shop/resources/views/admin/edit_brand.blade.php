@extends('admin_layout')
@section('admin_content')
<div class="card-body">
    <div class="card-title">
        <h3 class="text-center title-2 text-uppercase">Cập Nhật Thương Hiệu</h3>
        
    </div>
    <hr>
    <div>
    @foreach($edit_brand as $key => $value)
    <div>
    <form action="{{URL::to('/update_brand/'.$value->brand_id)}}" method="post">
        {{ csrf_field() }}
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="text-input" class="form-control-label">Tên thương hiệu</label>
            </div>
            <div class="col-11 col-md-9">
                <input type="text" value="{{$value->brand_name}}" id="text-input" name="brand_name" placeholder="Nhập tên thương hiệu" class="form-control">
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col col-md-2">
                <label for="textarea-input" class="form-control-label">Mô tả thương hiệu</label>
            </div>
            <div class="col-11 col-md-9">
                <textarea name="brand_description" id="textarea-input" rows="9" class="form-control">{{$value->brand_description}}</textarea>
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