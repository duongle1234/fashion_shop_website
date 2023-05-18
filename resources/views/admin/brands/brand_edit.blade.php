@extends('admin/index')
@section('title','Sửa thương hiệu')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Sửa thương hiệu </h3>
                <div class="tile-body">
                    <div class="row element-button">
                        
                    </div>
                    <form class="row" method="POST" action="{{route('brand_edit',$brand->id)}}">
                        @csrf
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên thương hiệu</label>
                            <input class="form-control" value="{{$brand->name}}" name="name" type="text">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Trạng thái</label>
                            <select class="form-control" name="status" id="exampleSelect1">
                                <option>-- Chọn trạng thái --</option>
                                <option value="1" {{$brand->status == '1' ? 'selected' : ''}}>Hiển thị</option>
                                <option value="0" {{$brand->status == '0' ? 'selected' : ''}}>Tạm ẩn</option>
                            </select>
                            @error('status')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <button class="btn btn-save" type="submit">Lưu lại</button>
                        <a class="btn btn-cancel" href="{{route('brand')}}">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
