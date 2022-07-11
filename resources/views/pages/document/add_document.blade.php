@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-heading" style="margin:40px 0">
                    <h4 class="page-title" style="text-align: center; color: #c96">Thêm tài liệu</h4>
                </div>  
                    <section class="panel">
                        
                                 <?php
                                    $message= Session::get('message');
                                    if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                    }
                                ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-document')}}" enctype="multipart/form-data" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài liệu</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="document_name" class="form-control " id="slug"  onkeyup="ChangeToSlug();"> 
                                   
                                </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="document_slug" class="form-control " id="convert_slug" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tiêu đề tài liệu</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="document_title" id="exampleInputPassword1" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả tài liệu</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="document_desc" id="ckeditor" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục tài liệu</label>
                                      <select name="category_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_document as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh tài liệu</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Upload tài liệu</label> <br>
                                    <input type="file" name="file" accept=".pdf" required="required">                               
                                </div>
                                <div class="submit-update" style="margin: 10px 35%;">
                                    <button type="submit" name="add_document" class="btn btn-info">Thêm tài liệu</button>
                                </div>                                  
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
    </div>
</div>
@endsection