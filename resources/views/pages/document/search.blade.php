@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <h5 class="title text-center">Kết quả tìm kiếm</h2>
                    
                       <div class="container">
                           <div class="row">
                              @foreach($search_document as $key => $document)
                              <div class="col-sm-4">
                            <!-- post -->
						
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img style=" height: 234px;width: auto;
											border-radius: 18px;margin-left: 45px;" src="{{URL::to('uploads/product/'.$document->product_image)}}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                       
    
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{url('/view-document',$document->document_id)}}">{{$document->document_name}}</a></h5>
                                    <p class="excerpt mb-0">{{$document->document_title}}</p>
                                </div>
                              
                            </div>
						<style>
							.post.post-grid.rounded.bordered{
								height: 437px;
							}
                            .mb-3{
								height:69px;
							}
							.post .excerpt {
							padding-top: 20px;
							font-size: 9px;
						}
						</style>

                        </div>
                               @endforeach
                           </div>
                       </div>
                     
                    
                    </div><!--features_items--> 
        <!--/recommended_items-->
 @endsection