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
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button>
            </div>
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm danh mục</button>
                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Hiệu chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_category as $key => $value)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
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