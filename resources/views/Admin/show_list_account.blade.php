@extends('Admin.admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách Tai Khoan
    </div>
    <?php
              $message= Session::get('message');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message',null);
              }
          ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>id</th>
            <th>Tên Tài Khoản</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
          @foreach($all_account as $key =>$cate_pro)
          <tr>
            <td>{{$cate_pro->id}}</td>
            <td>{{$cate_pro->name}}</td>
            <td>{{$cate_pro->email}}</td>
            <td>
                <?php
                if($cate_pro->role == 0 ){
                    echo '<p style="color:red">Người Dùng</p>';
                }else if($cate_pro->role == 1){
                    echo '<p style="color:yellow">Quản Trị</p>';
                }else if($cate_pro->role == 2){
                    echo '<p style="color:green">Admin</p>';
                }
                ?>
            </td>
            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa Tai Khoan này không?')" href="{{URL::to('/admin/remove-user/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
              <a href="{{URL::to('/admin/list-user/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class="" style="margin-left:20px">
              <i class="fa fa-info-circle" aria-hidden="true"></i>
              </a> 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
      </div>
    </footer>
  </div>
</div>
@endsection