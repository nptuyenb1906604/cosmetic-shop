@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Danh mục sản phẩm</h3>
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
                    @foreach($all_category as $key => $value)
                    <tr class="tr-shadow">
                        <td>{{$value->category_name}}</td>
                        <td class="desc">{{$value->category_description}}</td>
                        <td>
                            <?php
                                if($value->category_status == 0){
                            ?>
                                    <a href="{{URL::to('/unactive_category/'.$value->category_id)}}"><span class="fa fa-ban" data-toggle="tooltip" data-placement="top" title="Đang không kích hoạt"></span></a>
                            <?php
                                }else{
                            ?>   
                                    <a href="{{URL::to('/active_category/'.$value->category_id)}}"><span class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Đang kích hoạt"></span></a>
                            <?php       
                                }
                            ?>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Cập nhật">
                                    <a href="{{URL::to('/edit_category/'.$value->category_id)}}"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Xóa">
                                    <a onclick="return confirm('Bạn muốn xóa danh mục này chứ?');" href="{{URL::to('/delete_category/'.$value->category_id)}}"><i class="zmdi zmdi-delete"></i></a>
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