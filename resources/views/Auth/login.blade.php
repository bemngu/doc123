
@extends('layout')
@section('content')
<body>
    <div class="page-wrapper">
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                       <!-- <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li> -->
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background:#248aac">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link active " id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Đăng nhập</a>
							    </li>
							    <li class="nav-item">
							        <a class="nav-link " id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Đăng ký</a>
							    </li>
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
							    	<form action="{{URL::to('/profile')}}" method="POST">
									{{csrf_field()}}
									@if (Session::has('message'))
									<div class="alert alert-danger">{{ Session::get('message') }}</div>
									@endif
							    		<div class="form-group">
							    			<label for="singin-email-2">Địa chỉ email *</label>
							    			<input type="text" class="form-control" id="singin-email-2" name="customer_email" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="singin-password-2">Mật khẩu *</label>
							    			<input type="password" class="form-control" id="singin-password-2" name="customer_password" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>Đăng nhập</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                				<div class="custom-control custom-checkbox">
												<input name="remember" type="checkbox" class="custom-control-input" id="signin-remember-2">
												<label class="custom-control-label" for="signin-remember-2">Remember Me</label>
											</div><!-- End .custom-checkbox -->

											<!-- <a href="#" class="forgot-link">Forgot Your Password?</a> -->
							    		</div><!-- End .form-footer -->
										@csrf
							    	</form>
							    	
							    </div><!-- .End .tab-pane -->
							    <div class="tab-pane fade " id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
							    <form action="{{URL::to('/add-customer')}}" method="POST">
								{{csrf_field()}}
									@if (Session::has('messagee'))
									<div class="alert alert-success">{{ Session::get('messagee') }}</div>
									@endif
									<div class="form-group">
							    			<label for="register-name-2">Tên của bạn *</label>
							    			<input type="name"  class="form-control" id="register-name-2" name="customer_name" required>
							    		</div><!-- End .form-group -->
							    		<div class="form-group">
							    			<label for="register-email-2">Email của bạn *</label>
							    			<input type="email" class="form-control" id="register-email-2" name="customer_email" required>
							    		</div><!-- End .form-group -->
							  	  <div class="form-group">
							    			<label for="register-password-2">Mật khẩu *</label>
							    			<input type="password" class="form-control" id="register-password-2" name="customer_password" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>Đăng ký</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="register-policy-2" required>
												<label class="custom-control-label" for="register-policy-2">Tôi đồng ý chính sách <a href="https://www.manulife.com.vn/vi/manulife-vietnam/chinh-sach-bao-mat-thong-tin.html" target="_blank">bảo mật</a> *</label>
											</div><!-- End .custom-checkbox -->
							    		</div><!-- End .form-footer -->
										@csrf
							    </form>
							    	
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

       
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
       
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
   
	@endsection