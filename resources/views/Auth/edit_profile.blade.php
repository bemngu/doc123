@extends('layout') @section('content')
<div
    class="page-header text-center"
    style="background-image: url('assets/images/page-header-bg.jpg')"
>
    <div class="container">
        <h1 class="page-title">Chỉnh sửa tài khoản</h1>
    </div>
    <!-- End .container -->
</div>
<!-- End .page-header -->
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <img src="/uploads/avatar/{{Auth::user()->img}}" alt="" style="height:100px; width:100px;margin-top:50px; object-fit:cover; border-radius:50%;border:3px solid black;">
        </div>
        <div class="col-sm-6">
            <form action="/update-user" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <label>Tên</label>
                        <input
                            type="text"
                            name="name"
                            value="{{Auth::user()->name}}"
                            class="form-control"
                            required
                        />
                    </div>
                    <!-- End .col-sm-6 -->
                </div>
                <!-- End .row -->
                <label>Địa chỉ email *</label>
                <input
                    type="email"
                    value="{{Auth::user()->email}}"
                    name="email"
                    class="form-control"
                    required
                />
                <label>Mật khẩu mới </label>
                <input type="password" class="form-control" name="confirm_pass"  required/>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="file">
                </div>
                <button type="submit" class="btn btn-outline-primary-2">
                    <span style="background: steelblue;
                                    padding: 13px;
                                    display: block;
                                    margin: 21px 0;
                                    border-radius: 20px;" >Lưu thay đổi</span>
                    <i class="icon-long-arrow-right"></i>
                </button>
                <style>
                    label{
                        margin: 12px 0;
                        font-weight: 600;
                    }
                </style>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

@endsection
