@extends('layout')
@section('content')
<section class="main-content mt-3">
	<div class="container-xl">
		<div class="row gy-4">
			<div class="col-lg-12">
				<!-- post single -->
				<div class="post post-single">
					<!-- post header -->
					<div class="post-header">
						<h1 style="text-align:center" class="title mt-0 mb-3">{{$data->document_name}}</h1>
					</div>
					<!-- featured image -->

					<!-- post content -->

					<div style="text-align:center" class="file">
						<iframe height="800" width="800" src="/uploads/document/{{$data->file}}"></iframe>
					</div>

					<div style="border: 1px solid;
                                        width: 114px;
                                        text-align: center;
                                        border-radius: 10px;
                                        padding: 10px;
                                        background: aliceblue;
                                        margin: auto;
                                        transform: translateY(41px);
										margin-bottom: 100px" class="download">
										<a href="{{url('/download',$data->file)}}">
									
										<?php
											if(isset($session_name)){
												echo 'Tải tài liệu';
											}else{
												echo '';
											}
											?>
											</a>
					</div>

					<div style="    margin-left: 48px;  font-size: 12px;font-family: math;"
						class="post-content clearfix">
						{!!$data->document_desc!!}
					</div>


					<div class="spacer" data-height="50"></div>
					<div style="margin-left:100px" class="binhluan">

						<!-- section header -->
						<div class="section-header">
							<h3 class="section-title">Bình luận</h3>
						</div>
						<!-- post comments -->
						<div class="comments bordered padding-30 rounded">

							<ul class="comments">
								<!-- comment item -->
								@foreach($show_comment as $key =>$doc)
								<li class="comment rounded">
									<div class="details">
										<h4 class="name"><a href="#">{{$doc->name}}</a></h4>
										<span class="date">{{$doc->date}}</span>
										<p>{{$doc->title}}</p>
									</div>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="spacer" data-height="50"></div>

						<!-- section header -->
						<div class="section-header">
							<h3 class="section-title">Bình luận của bạn</h3>
							<img src="{{asset('frontend/images/wave.svg')}}" class="wave" alt="wave" />
						</div>
						<!-- comment form -->
						<div class="comment-form rounded bordered padding-30">

							<form id="comment-form" class="comment-form" action="/admin/add-comment" method="post">
								@csrf
								<div class="messages"></div>

								<div class="row">
									<div class="column col-md-12">
										<!-- Comment textarea -->
										<input type="text" name="id_hidden" value="{{$data->document_id}}" hidden>
										<div class="form-group">
											<textarea id="InputComment" class="form-control"
											name="comment"
												rows="4" placeholder="Bình luận của bạn ..."
												required="required"></textarea>
										</div>
									</div>
								</div>

								<button type="submit" name="submit" id="submit" value="Submit"
									class="btn btn-default">Đăng bình luận</button><!-- Submit Button -->

							</form>
						</div>
					</div>

				</div>



			</div>
		
		
		</div>
</section>

@endsection