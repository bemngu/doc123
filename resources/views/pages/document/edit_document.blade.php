@extends('layout')
@section('content')
            <div class="container">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <section class="panel">
                            <div class="panel-heading" style="margin:40px 0">
                                <h4 class="page-title" style="text-align: center; color: #c96">Cập nhật tài liệu</h4>
                            </div>  
                        <div class="panel-body">
                            @foreach($edit_document as $key=>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-document/'.$edit_value->document_id)}}" enctype="multipart/form-data" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài liệu</label>
                                    <input type="text" data-validation="length" value="{{$edit_value->document_name}}" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="document_name" class="form-control " id="slug" placeholder="Tên tài liệu" onkeyup="ChangeToSlug();"> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="document_slug" value="{{$edit_value->document_slug}}" class="form-control " id="convert_slug" placeholder="Tên tài liệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tiêu đề tài liệu</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="document_title" id="exampleInputPassword1">{{$edit_value->document_title}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả tài liệu</label>
                                    <textarea style="resize:none" rows="5" class="form-control" name="document_desc" id="ckeditor" >{{$edit_value->document_desc}}</textarea>
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
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('uploads/product/'.$edit_value->product_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tài liệu</label>
                                    <input type="file" name="file" accept=".pdf" >   
                                    @if($edit_value->file)
                                    <p class="cofile">

                                        <a target="_blank" href="{{asset('uploads/document/'.$edit_value->file)}}">
                                            {{$edit_value->file}}
                                        </a>

                                        <button type="button" data-document_id="{{$edit_value->document_id}}" class="btn btn-sm btn-danger btn-delete-document"><i class="fa fa-times"></i></button>

                                    </p>
                                    @else 
                                    <p class="cofile">Không file</p>
                                    @endif
                                </div>
                                <div class="submit-update" style="margin: 10px 35%;">
                                    <button type="submit" name="add_document" class="btn btn-info">Cập nhật</button>
                                </div>                                    
                                </div>
                                
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
                </div>
            </div>
@endsection