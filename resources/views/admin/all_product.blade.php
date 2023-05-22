@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Sản phẩm</h3>
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
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2 table-product">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Hiệu chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key => $value)
                    <tr class="tr-shadow">
                        <td>{{$value->product_name}}</td>
                        <td><img src="public/upload_image/product/{{$value->product_image}}" width="100px" height="100px"></td>
                        <td>{{number_format($value->product_price,0,',','.')}}</td>
                        <td class="desc" data-toggle="tooltip" data-placement="top" title="{{$value->product_description}}">{{$value->product_description}}</td>
                        <td class="desc" data-toggle="tooltip" data-placement="top" title="{{$value->product_content}}">{{$value->product_content}}</td>
                        <td>
                            <?php
                                if($value->product_status == 0){
                            ?>
                                    <a href="{{URL::to('/unactive_product/'.$value->product_id)}}"><span class="fa fa-ban" data-toggle="tooltip" data-placement="top" title="Đang không kích hoạt"></span></a>
                            <?php
                                }else{
                            ?>   
                                    <a href="{{URL::to('/active_product/'.$value->product_id)}}"><span class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Đang kích hoạt"></span></a>
                            <?php       
                                }
                            ?>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Cập nhật">
                                    <a href="{{URL::to('/edit_product/'.$value->product_id)}}"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Xóa">
                                    <a onclick="return confirm('Bạn muốn xóa sản phẩm này chứ?');" href="{{URL::to('/delete_product/'.$value->product_id)}}"><i class="zmdi zmdi-delete"></i></a>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection