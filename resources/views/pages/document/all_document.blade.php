@extends('layout')
@section('content')
<div class="container">   
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-heading" style="margin:50px 0">
                <h4 class="page-title" style="text-align: center; color: #c96">Liệt kê tài liệu</h4>
			</div>            
                                <?php
                                    $message= Session::get('message');
                                    if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                    }
                                ?>   
		<div class="table-agile-info">
			<div class="panel panel-default">
				
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
                        @foreach($alll_document as $key =>$cate_doc)
							<tr>
                            <td style="padding: 10px;">{{$cate_doc->document_name}}</td>
                                <td>
                                {{$cate_doc->category_name}}
                                </td>
                                <td>
                                {{$cate_doc->document_title}}
                                </td>
                                
                                <td><img src="uploads/product/{{$cate_doc->product_image}}" height="100" width="100"></td>
                                
                            
                                <td style="text-align: center;" >{{$cate_doc->file}}</td>
                                <td style="text-align: center;" >
                                    <?php
                                    if($cate_doc->active == 0){
                                        echo '<p style="color:red">Chưa được Duyệt</p>';
                                    }else{
                                        echo '<p style="color:green">Bài được Duyệt</p>';
                                    }
                                    ?>
                                </td>
                                <td style="text-align: center; font-size:25px;">
								<a style="margin:0 10px;" href="{{URL::to('/edit-document/'.$cate_doc->document_id)}}" class="active styling-edit" ui-toggle-class="">
									<i class="fa fa-pencil-square-o text-success text-active"></i>
								</a>
								<a style="margin:0 10px;" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')" href="{{URL::to('/delete-document/'.$cate_doc->document_id)}}" class="active styling-edit" ui-toggle-class="">
									<i class="fa fa-times text-danger text"></i>
								</a>  
								</td>
							</tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
    </div>
</div>
@endsection