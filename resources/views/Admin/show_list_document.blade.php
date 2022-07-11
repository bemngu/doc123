@extends('Admin.admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách Tai Lieu
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
            <th>Tên tài liệu</th>
            <th>Danh mục</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            
            <th>File</th>
            <th>Trạng Thái</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
          @foreach($al_document as $key =>$cate_pro)
          <tr>
            <td>{{$cate_pro->document_name}}</td>
            <td>{{$cate_pro->category_name}}</td>
            <td>{{$cate_pro->document_title}}</td>
           
            <td><img style="object-fit:cover" src="../uploads/product/{{$cate_pro->product_image}}" height="100" width="100"></td>
            
            <td>{{$cate_pro->file}}</td>
            <td><span class="text-ellipsis">
                <?php
                  if($cate_pro->active==0){
                    ?>
                    <a href="{{URL::to('/admin/active-document/'.$cate_pro->document_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                    <?php
                  }else{
                    ?>
                    <a href="{{URL::to('/admin/unactive-document/'.$cate_pro->document_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                    <?php
                  }
                ?>
            </span></td>
            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')" href="{{URL::to('/admin/remove-document/'.$cate_pro->document_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
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