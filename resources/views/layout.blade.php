<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>26Doc - Document& Read</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.png')}}">

	<!-- STYLES -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap1.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/simple-line-icons.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/style1.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

<!-- preloader -->

<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	@include('Layout.header')

    <!-- haah  -->
   @yield('content')

	<!-- instagram feed -->


	<!-- footer -->
	@include('Layout.footer')
</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Tìm kiếm tài liệu</h3>
		</div>
		<!-- form -->
		<form class=" search-form" action="{{URL::to('/tim-kiem')}}" method="POST">
		{{csrf_field()}}
			<div class="d-flex">
			<input class="form-control me-2" name="keywords_submit" type="search" placeholder="Tìm kiếm và nhấn enter..." aria-label="Search">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
			</div>
			<div class="">
			@foreach($cate_document as $key =>$cate_doc)
			<input type="radio" id="vehicle1" style="width:120px" name="checkbox" value="{{$cate_doc->category_id}}">
			<label for="vehicle1">{{$cate_doc->category_name}}</label><br>
			@endforeach
			</div>
		</form>
	</div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
	<a href="{{URL::to('/trang-chu')}}" class="d-block text-logo">IT<span class="dot">.</span>DOC</a>
	</div>

	<!-- menu -->
	<nav>
		<ul class="vertical-menu">
			
			
			<li>Xin chào <span style="color:red;"><?php echo $session_name?></span></li>
			<li>
				<a  href="">Tài liệu</a>
				<ul class="submenu">
					<li><a href="{{URL::to('/all-document')}}">Quản lý tài liệu</a></li>
					<li><a href="{{URL::to('/add-document')}}">Thêm tài liệu</a></li>
					
				</ul>
			</li>
			<li><a href="{{URL::to('profile')}}">Quản lý tài khoản</a></li>
			<?php
			if(isset($session_name)){
				echo '<li><a href="/log-out">Đăng xuất</a></li>';
			}else{
				echo '<li><a href="/sign-in">Đăng nhập</a></li>';
			}
			?>
			
		</ul>
	</nav>

	<!-- social icons -->

</div>

<!-- JAVA SCRIPTS -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="{{asset('frontend/ckeditor/ckeditor.js')}}"></script>


<script type="text/javascript">
 
 function ChangeToSlug()
     {
         var slug;
      
         //Lấy text từ thẻ input title 
         slug = document.getElementById("slug").value;
         slug = slug.toLowerCase();
         //Đổi ký tự có dấu thành không dấu
             slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
             slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
             slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
             slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
             slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
             slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
             slug = slug.replace(/đ/gi, 'd');
             //Xóa các ký tự đặt biệt
             slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
             //Đổi khoảng trắng thành ký tự gạch ngang
             slug = slug.replace(/ /gi, "-");
             //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
             //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
             slug = slug.replace(/\-\-\-\-\-/gi, '-');
             slug = slug.replace(/\-\-\-\-/gi, '-');
             slug = slug.replace(/\-\-\-/gi, '-');
             slug = slug.replace(/\-\-/gi, '-');
             //Xóa các ký tự gạch ngang ở đầu và cuối
             slug = '@' + slug + '@';
             slug = slug.replace(/\@\-|\-\@|\@/gi, '');
             //In slug ra textbox có id “slug”
         document.getElementById('convert_slug').value = slug;
     }
</script>
<script>
	CKEDITOR.replace('ckeditor');
</script>
<script>
	const allItem =  document.querySelectorAll(".nav-item");


	if(window.location.pathname == '/trang-chu' || window.location.pathname == '/'){
		allItem[0].classList.add('active');
	}else
	if(window.location.pathname == '/all-document'){
		allItem[2].classList.add('active');
	}else
	if(window.location.pathname == '/profile'){
		allItem[3].classList.add('active');
	}else{
		allItem[1].classList.add('active');
	}


</script>
</body>
</html>