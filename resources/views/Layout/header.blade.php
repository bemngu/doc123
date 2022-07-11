<header class="header-personal">
        <div class="container-xl header-top">
			<div class="row align-items-center">

				<div class="col-4 d-none d-md-block d-lg-block">
					<!-- social icons -->
					<ul class="social-icons list-unstyled list-inline mb-0">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12 text-center">
				<!-- site logo -->
					<a class="navbar-brand" href="{{URL::to('/trang-chu')}}"><img src="{{asset('frontend/images/other/l.jpg')}}" alt="logo" /></a>
					<a href="{{URL::to('/trang-chu')}}" class="d-block text-logo">IT<span class="dot">.</span>DOC</a>
					<span class="slogan d-block">Đọc, đóng góp & Chia sẻ</span>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">
					<!-- header buttons -->
					<div class="header-buttons float-md-end mt-4 mt-md-0">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button ms-2 float-end float-md-none">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>

			</div>
        </div>

		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<div class="collapse navbar-collapse justify-content-center centered-nav">
					<!-- menus -->
					<ul class="navbar-nav">
						<li class="nav-item dropdown ">
							<a class="nav-link " href="{{URl::to('trang-chu')}}">Trang chủ</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="">Danh mục</a>
							<ul class="dropdown-menu">
							@foreach($cate_document as $key => $cate)
								<li><a class="dropdown-item" href="{{route('view',['category_id'=>$cate->category_id])}}">{{$cate->category_name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{URl::to('all-document')}}">Tài liệu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{URL::to('/profile')}}">Tài khoản</a>
						</li>
					</ul>
				</div>

			</div>
		</nav>
	</header>