@extends('layouts.appUser')
@section('content')
<div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-md-9">
                <div class="content-left">
                    <h2 class="main-title">
                        videos
                    </h2>
                    <div class="video-section video-hl list-video">
                        <div class="row">
                        @foreach($videoTop as $value)
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="video">
                                    <div class="thumb">
                                        <div class="global-figure">
                                            <div class="global-image">
                                                <a href="{{url('file',['id'=>$value->id])}}" title="{{url('file',['id'=>$value->id])}}">
                                                    <span style="background-image: url({{asset($value->path_image_video)}})">
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <a class="global-action" href="{{url('file',['id'=>$value->id])}}" title="{{url('file',['id'=>$value->id])}}">
                                            <span class="video-play">
                                                <i class="flaticon-arrows">
                                                </i>
                                            </span>
                                        </a>
                                        <span class="video-time">
                                            04:01
                                        </span>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h1 class="global-name">
                                        <a href="{{url('file',['id'=>$value->id])}}" title="">
                                            {{$value->name}}
                                        </a>
                                    </h1>
                                    <h2 class="global-author">
                                        <span>
                                            by
                                            <a href="{{url('artists',['id'=>$value->artist_id])}}" title="{{$value->artist->name}}">
                                                {{$value->artist->name}}
                                            </a>
                                            >
                                        </span>
                                    </h2>
                                    <span class="total-views">
                                        {{$value->count_view}} view
                                    </span>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                    <div class="video-section list-video">
                        <div class="row">
                        @foreach($data as $value)
                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <div class="video">
                                    <div class="thumb">
                                        <div class="global-figure">
                                            <div class="global-image">
                                                <a href="{{url('file',['id'=>$value->id])}}" title="{{url('file',['id'=>$value->id])}}">
                                                    <span style="background-image: url({{asset($value->path_image_video)}})">
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <a class="global-action" href="{{url('file',['id'=>$value->id])}}" title="">
                                            <span class="video-play">
                                                <i class="flaticon-arrows">
                                                </i>
                                            </span>
                                        </a>
                                        <span class="video-time">
                                            03:33
                                        </span>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h1 class="global-name">
                                        <a href="{{url('file',['id'=>$value->id])}}" title="Stay">
                                            {{$value->name}}
                                        </a>
                                    </h1>
                                    <h2 class="global-author">
                                        <span>
                                            by
                                            <a href="{{url('artists',['id'=>$value->artist_id])}}" title="{{$value->artist->name}}">
                                                {{$value->artist->name}}
                                            </a>
                                            
                                        </span>
                                    </h2>
                                    <span class="total-views">
                                        {{$value->count_view}} view
                                    </span>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="comment-footer">
                        <ul class="pagination" data-current="1" data-total="18" id="pagination">
                          {{$data->render()}}
                        </ul>
                    </div>
                </div>
                <!-- end .content-left -->
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="right-menu">
                        <h3>
                            genres
                        </h3>
                        <div class="panel-group" id="accordion">
                        @foreach($data as $value)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{url('genres',['id'=>$value->genre_id])}}">
                                            {{$value->genre->name}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end .container -->
    </div>
</div>
@endsection
