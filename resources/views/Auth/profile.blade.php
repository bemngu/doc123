@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Tài khoản</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								  
			
								    <li class="nav-item">
								        <a class="nav-link" href="{{'log-out'}}">Đăng xuất</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								 	<div class="tab-pane fade  show active" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    <form action="#">
											<div class="row">
								    			<div class="col-lg-6 m-3">
								    				<div class="card card-dashboard">
								    					<div class="card-body">												
																<div class="form-group">
																<label for="exampleInputEmail1">Tên tài khoản</label>
																<input type="text" name="" value="{{Auth::user()->name}}" class="form-control ">
															</div>
																<div class="form-group">
																<label  for="exampleInputEmail1">Email</label>
																<input type="text" name="" value="{{Auth::user()->email}}" class="form-control ">
															</div>
																<a href="{{URL::to('/edit-profile/')}}">Chỉnh sửa<i class="icon-edit"></i></a></p>
															
								    					</div><!-- End .card-body -->
								    				</div><!-- End .card-dashboard -->
								    			</div><!-- End .col-lg-6 -->
								    		</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->
									</form>
								    </div><!-- .End .tab-pane -->

									
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection