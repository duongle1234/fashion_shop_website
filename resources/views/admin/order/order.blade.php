@extends('admin/index')
@section('title','Danh sách đơn hàng')
@section('main')
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <h3 class="tile-title">Danh sách đơn hàng</h3>
                        <!-- <form class="form-inline">
                    <div class="form-group">
                        <select class="form-control" name="sort_by" id="exampleSelect1">
                            <option selected value="">Tìm kiếm theo</option>
                            <option value="id">Tìm mã đơn hàng</option>
                            <option value="full_name">Tìm tên</option>
                            <option value="price_shipping-DESC">Tìm theo giá: cao tới thấp</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input name="search" class="form-control" id="">
                        <button class="btn btn-success"><i class="fa fa-search"></i></button>
                    </div>
                </form> -->
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <!-- <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                        class="fas fa-file-upload"></i> Tải từ file</a> -->
                            </div>

                            <div class="col-sm-2">
                                <!-- <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                        class="fas fa-print"></i> In dữ liệu</a> -->
                            </div>

                            <div class="col-sm-2">
                                <!-- <a class="btn btn-excel btn-sm" href="{{route('export')}}" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a> -->
                            </div>
                            <div class="col-sm-2">
                                <!-- <a class="btn btn-delete btn-sm pdf-file" href="{{route('PDF')}}" type="button" title="In" onclick="myFunction(this)"><i
                                        class="fas fa-file-pdf"></i> Xuất PDF</a> -->
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-block" style="background-color: #f9c9cd !important;color: #a90312 !important">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <!-- <th width="10"><input type="checkbox" id="all"></th> -->
                                <th width="150">Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>SDT</th>
                                <th>Tình trạng</th>
                                <th>Tổng SL</th>
                                <th>Tổng tiền</th>
                                <!-- <th>Chức năng</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <!-- <td width="10"><input type="checkbox" id="all"></td> -->
                                <td>{{$order->id}}</td>
                                <td>{{$order->full_name}}</td>
                                <td>{{$order->phone}}</td>
                                <td>
                                    <form action="{{route('order.update',$order->id)}}">
                                        <select name="status" onchange="this.form.submit();">
                                                <option {{$order->status == 0 ? 'selected' : ''}} value="0">Chờ xử lý</option>
                                                <option {{$order->status == 1 ? 'selected' : ''}} value="1">Đang giao hàng</option>
                                                <option {{$order->status == 2 ? 'selected' : ''}} value="2">Đã giao hàng</option>
                                                <option {{$order->status == 3 ? 'selected' : ''}} value="3">Hủy đơn hàng</option>
                                        </select>
                                    </form>
                                </td>
                                <td>{{$order->getTotalQtt()}}</td>
                                <td>{{number_format($order->getTotalAmount())}}đ</td>

                                <!-- <td>
                                    <a class="btn btn-primary btn-sm view" href="{{route('order.show', $order->id)}}" title="Xem"><i class="fa fa-eye"></i></a>
                                </td> -->

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{ $orders->appends(['sort' => 'science-stream'])->links()}}
                </div>
            </div>
        </div>
@endsection
