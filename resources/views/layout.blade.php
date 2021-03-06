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
			<h3 class="mb-4 mt-0">T??m ki???m t??i li???u</h3>
		</div>
		<!-- form -->
		<form class=" search-form" action="{{URL::to('/tim-kiem')}}" method="POST">
		{{csrf_field()}}
			<div class="d-flex">
			<input class="form-control me-2" name="keywords_submit" type="search" placeholder="T??m ki???m v?? nh???n enter..." aria-label="Search">
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
			
			
			<li>Xin ch??o <span style="color:red;"><?php echo $session_name?></span></li>
			<li>
				<a  href="">T??i li???u</a>
				<ul class="submenu">
					<li><a href="{{URL::to('/all-document')}}">Qu???n l?? t??i li???u</a></li>
					<li><a href="{{URL::to('/add-document')}}">Th??m t??i li???u</a></li>
					
				</ul>
			</li>
			<li><a href="{{URL::to('profile')}}">Qu???n l?? t??i kho???n</a></li>
			<?php
			if(isset($session_name)){
				echo '<li><a href="/log-out">????ng xu???t</a></li>';
			}else{
				echo '<li><a href="/sign-in">????ng nh???p</a></li>';
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
      
         //L???y text t??? th??? input title 
         slug = document.getElementById("slug").value;
         slug = slug.toLowerCase();
         //?????i k?? t??? c?? d???u th??nh kh??ng d???u
             slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
             slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
             slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
             slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
             slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
             slug = slug.replace(/??|???|???|???|???/gi, 'y');
             slug = slug.replace(/??/gi, 'd');
             //X??a c??c k?? t??? ?????t bi???t
             slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
             //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
             slug = slug.replace(/ /gi, "-");
             //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
             //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
             slug = slug.replace(/\-\-\-\-\-/gi, '-');
             slug = slug.replace(/\-\-\-\-/gi, '-');
             slug = slug.replace(/\-\-\-/gi, '-');
             slug = slug.replace(/\-\-/gi, '-');
             //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
             slug = '@' + slug + '@';
             slug = slug.replace(/\@\-|\-\@|\@/gi, '');
             //In slug ra textbox c?? id ???slug???
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