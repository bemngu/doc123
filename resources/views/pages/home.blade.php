@extends('layout')
@section('content')
<div class="hero-banner-four">
	<img src="{{asset('frontend/images/shape/100.svg')}}" alt="" class="shapes shape-four">
	<img src="{{asset('frontend/images/shape/101.svg')}}" alt="" class="shapes shape-five">
	<img src="{{asset('frontend/images/shape/102.svg')}}" alt="" class="shapes shape-six">
	<img src="{{asset('frontend/images/shape/103.svg')}}" alt="" class="shapes shape-seven">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 order-lg-last">
				<div class="illustration-holder">
					<img src="{{asset('frontend/images/assets/ils_14.svg')}}" alt="" class="illustration">
					<img src="{{asset('frontend/images/assets/ils_14.1.svg')}}" alt="" class="shapes shape-one">
					<img src="{{asset('frontend/images/assets/ils_14.2.svg')}}" alt="" class="shapes shape-two">
					<img src="{{asset('frontend/images/assets/ils_14.3.svg')}}" alt="" class="shapes shape-three">
				</div>
				<p class="review-text">Hơn <span>169,000+ tài liệu</span> trong tất cả lĩnh vực.</p>
			</div>
			<div class="col-lg-6 order-lg-first">
				<div class="text-wrapper">
					<h1><span>Cùng học vui</span> đọc tài liệu dễ dàng.</h1>
					<p class="sub-text">Đầy đủ giáo trình, tài liệu chất lượng đa dạng.</p>
					<a href="login.html" class="theme-btn-five">Bắt đầu nào</a>
				</div> <!-- /.text-wrapper -->
			</div>
		</div>
	</div>

	
    </div> <!-- /.hero-banner-four -->
    <section class="hero-carousel">
        <div class="row post-carousel-featured post-carousel">
            
            <!-- post -->
            @foreach($cate_document as $key => $cate)
            <div class="post featured-post-md">
                <div class="details clearfix">
                    <a href="{{route('view',['category_id'=>$cate->category_id])}}" class="category-badge">{{$cate->category_name}}</a>
                    <h4 style="line-height: 23px;
    				font-size: 12px;margin-top: 30px" class="post-title"><a href="blog-single.html">{{$cate->category_desc}}</a></h4>
                    <ul class="meta list-inline mb-0">
                        <li class="list-inline-item"><a href="#">Admin</a></li>
                     
                    </ul>
                </div>
                <a href="blog-single.html">
                    <div class="thumb rounded">
                        <div class="inner data-bg-image" data-bg-image="{{asset('frontend/images/posts/featured-md-4.jpg')}}"></div>
                    </div>
                </a>
				
            </div>
            <!-- post -->
            @endforeach
           
        </div>
    </section>

	<!-- section main content -->	
	<section class="main-content">
		<div class="container-xl">
			<div class="row gy-4">
				<div class="col-lg-8">
                    <div class="row gy-4">
						@foreach($all_document as $key => $document)
                    
						<div class="col-sm-4">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                   
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="{{url('/view-document',$document->document_id)}}">
                                        <div class="inner">
                                            <img style=" height: 234px;width: auto;
											border-radius: 18px;margin-left: 33px;" src="{{URL::to('uploads/product/'.$document->product_image)}}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                            
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{url('/view-document',$document->document_id)}}">{{$document->document_name}}</a></h5>
                                    <p class="excerpt mb-0">{{$document->document_title}}</p>
									<ul class="meta list-inline mt-1 mb-0">
									<i class="fa fa-eye" aria-hidden="true"></i>
											<li class="list-inline-item">{{$document->document_views}}</li>
										</ul>
									
                                </div>
                              
                            </div>
						
					<style>
							.post.post-grid.rounded.bordered{
								height: 437px;
							}
							.post .excerpt {
							padding-top: 20px;
							font-size: 9px;
						}
						</style>

                        </div>
						@endforeach
                       

                    </div>
					
				
					<ul class="pagination justify-content-center">
                       {!!$all_product->links()!!}
                      </ul>
				</div>
				<div class="col-lg-4">
					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="{{asset('frontend/images/map-bg.png')}}">
							<a href="{{URL::to('/trang-chu')}}" class="d-block text-logo mb-4">IT<span class="dot">.</span>DOC</a>
								<p class="mb-4">Xin chào, chúng tôi ở đây để chia sẻ cho bạn những tài liệu đầy đủ nhất. Với những nội dung cụ thể, chân thật giúp bài học của bạn trở nên đa dạng phong phú hơn.</p>
								<ul class="social-icons list-unstyled list-inline mb-0">
									<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								
									<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>

						<!-- widget popular posts -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Tài liệu nổi bật</h3>
								<img src="{{asset('frontend/images/wave.svg')}}" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<!-- post -->
							@foreach($document_views as $key => $views)
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="#">
											<div class="inner">
												<img src="{{URL::to('uploads/product/'.$views->product_image)}}" alt="post-title" style="width:50px; height:50px; object-fix:cover" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{url('/view-document',$views->document_id)}}">{{$views->document_name}}</a></h6>
									</div>
								</div>
								<!-- post -->
							@endforeach
							</div>		
						</div>
						<!-- widget categories -->
					

					</div>

				</div>

			</div>

		</div>
	</section>
@endsection