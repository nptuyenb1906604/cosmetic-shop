@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35 mt-4 text-center text-uppercase">Liệt kê đơn hàng</h3>
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
                <!-- <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm danh mục</button> -->
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
                            <!-- <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label> -->
                            Thứ tự
                        </th>
                        <th>Mã đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Hiệu chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $i = 0;
                    @endphp
                    @foreach($order as $key => $value)
                    @php 
                        $i++;
                    @endphp
                    <tr class="tr-shadow">
                        <td>
                            <!-- <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label> -->
                            {{$i}}
                        </td>
                        <td>{{$value->order_code}}</td>
                        <td class="desc">
                            @if($value->order_status == 1)
                                Đơn hàng mới
                            @else 
                                Đơn hàng đã xử lý
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                    <a href="{{URL::to('/view_order/'.$value->order_code)}}"><i class="fa-solid fa-eye"></i></a>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Hủy đơn">
                                    <a onclick="return confirm('Bạn muốn hủy đơn hàng này chứ?');" href="{{URL::to('/delete_order/'.$value->order_code)}}"><i class="zmdi zmdi-delete"></i></a>
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