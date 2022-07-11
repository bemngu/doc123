@extends('Admin.admin_layout')
@section('admin_content')
<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
					<i style="color:white" class="fas fa-list"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 
						 <p>SL Danh Mục</p>
					<h3>{{$sl_category}}</h3>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
					<i style="color:white" class="fas fa-user"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<p>SL Tài Khoản</p>
					<h3>{{$sl_user}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
					<i style="color:white" class="fas fa-book"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<p>SL Tài Liệu</p>
					<h3>{{$sl_doc}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
					<i style="color:white" class="fas fa-eye"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<p>View Cao Nhất</p>
					<h3>{{$max_viewer->document_views}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
@endsection