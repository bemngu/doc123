@extends('Admin.admin_layout')
@section('admin_content')
<div class="row">
                <div class="col-lg-12">
                <section class="panel">
                        <header class="panel-heading">
                            Chi tiết tài khoản 
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="/admin/add-permission"  method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài khoản </label>
                                    <input type="text" name="id" value="{{$detail_account->id}}" hidden>
                                    <input type="text" class="form-control" id="exampleInputEmail1" disabled value="{{$detail_account->name}}" placeholder="Tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" disabled value="{{$detail_account->email}}" placeholder="Email">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Xác Nhận  </label>
                                <select class="form-control m-bot15" name="role">
                                <option value="0" selected>Người Dùng</option>
                                <option value="1">Quản Trị </option>
                                <option value="2">Admin</option>
                            </select>
                                </div>
                                <button type="submit" class="btn btn-info">Xác Nhận </button>
                            </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>

@endsection