@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Thương hiệu sản phẩm</h3>
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
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Hiệu chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_brand as $key => $value)
                    <tr class="tr-shadow">
                        <td>{{$value->brand_name}}</td>
                        <td class="desc">{{$value->brand_description}}</td>
                        <td>
                            <?php
                                if($value->brand_status == 0){
                            ?>
                                    <a href="{{URL::to('/unactive_brand/'.$value->brand_id)}}"><span class="fa fa-ban" data-toggle="tooltip" data-placement="top" title="Đang không kích hoạt"></span></a>
                            <?php
                                }else{
                            ?>   
                                    <a href="{{URL::to('/active_brand/'.$value->brand_id)}}"><span class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Đang kích hoạt"></span></a>
                            <?php       
                                }
                            ?>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Cập nhật">
                                    <a href="{{URL::to('/edit_brand/'.$value->brand_id)}}"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Xóa">
                                    <a onclick="return confirm('Bạn muốn xóa thương hiệu này chứ?');" href="{{URL::to('/delete_brand/'.$value->brand_id)}}"><i class="zmdi zmdi-delete"></i></a>
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