@extends('layout')
@section('content')
@forelse ($courses as $course)
                            <div class="col-4 col-md-6 col-12">
                                <div class="box">
                                        <a href="{{$course->path()}}">
                                            <img class="card-img-top" src="{{'/storage/' . $course->banner->files['600']}}" alt="Card image cap">
                                        </a>
                                        <div class="box-body">
                                            <div class="text-left">
                                                <h4 class="box-title"><a href="{{$course->path()}}">{{$course->limitCharTitle()}}</a></h4>
                                                <p>{!! $course->limitCharBody()!!}</p>
                                                <div class="row">
                                                    <p class="mb-10 text-light font-size-12"><i class="fa fa-graduation-cap mr-5"></i>{{$course->teacher->fullName ?? ''}}</p>
                                                    <p class="mb-10 text-light font-size-12" style="margin-left: 30px"><b class="badge badge-info">{{$course->getFreeOrCash()}}</b><b class="text-danger"> : قیمت</b></p>
                                                </div>
                                                <div class="row">
                                                    <a href="{{$course->path()}}" class="btn btn-outline btn-primary btn-sm">جزئیات دوره</a>
                                                    <span class="btn btn-outline btn-info btn-sm" style="margin-left: 10px">{{$course->formatTime()}}  : زمان دوره</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-danger">
                                    <b>دوره ای یافت نشد</b>
                                </div>
                            @endforelse
@endsection