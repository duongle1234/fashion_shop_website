@extends('admin/index')
@section('title','Danh sách khách hàng')
@section('main')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <h3 class="tile-title">Danh sách tài khoản</h3>
          <div class="row element-button">
            <div class="col-sm-2">

              <!-- <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm"><i class="fas fa-plus"></i>
                Tạo mới nhân viên</a> -->
            </div>
          </div>
          <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
            id="sampleTable">
            <thead>
              <tr>
                
                <th width="150">Mã tài khoản</th>
                <th width="300">Họ và tên</th>
                <th width="600">Địa chỉ</th>
                <th width="150">SĐT</th>
                <th>Chức vụ</th>
                <!-- <th width="100">Tính năng</th> -->
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
              <tr>
                
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <form action="{{route('customer.update',$user->id)}}">
                        <select name="level" onchange="this.form.submit();">
                            <option {{$user->level == 0 ? 'selected' : ''}} value="0">Admin</option>
                            <option {{$user->level == 1 ? 'selected' : ''}} value="1">Người dùng</option>
                        </select>
                    </form>
                </td>
                <!-- <td class="table-td-center"><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                    onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                  </button>
                  <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                    data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                  </button>
                </td> -->
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
