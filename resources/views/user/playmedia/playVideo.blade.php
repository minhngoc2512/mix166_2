@extends('layouts.appUser')
@section('content')

    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col-md-9">
                    <div class="content-left">
                        <div class="player-video clearfix">
                            <div class="vjs-loading" id="loadingVideo" style="display: none;">
                                <p>Next video will play in <strong id="countDown">5</strong> seconds</p>
                                <h3>
                                    <a href="/videos/symphony-ft-zara-larsson-2000251.html"
                                       title="Symphony (ft. Zara Larsson)">Symphony (ft. Zara Larsson)</a>
                                </h3>
                                <h4>
                                    <a href="/dj/clean-bandit-2000671.html" title="Clean Bandit">Clean Bandit</a>
                                </h4>
                                <ul class="list-btn-video list-inline">
                                    <li><a id="playAgain" href="javascript:void(0);"><i class="fa fa-repeat"></i><span>replay</span></a>
                                    </li>
                                    <li><a id="playNext" href="/videos/symphony-ft-zara-larsson-2000251.html"><i
                                                    class="fa fa-play"></i><span>next play</span></a></li>
                                </ul>
                            </div>


                            <div poster="http://st.cdn.mix166.com/images/edm_videos/2017/04/03/1491189494-ad.jpg?h=480&amp;mode=scale"
                                 class="video-js vjs-default-skin video-dimensions vjs-controls-enabled vjs-playing vjs-has-started vjs-user-inactive"
                                 id="video">
                                <video style="width: 100%" controls class="vjs-tech"
                                       poster="http://st.cdn.mix166.com/images/edm_videos/2017/04/03/1491189494-ad.jpg?h=480&amp;mode=scale"
                                >

                                    <source src="{{asset($data->path)}}"
                                            type="video/mp4">
                                </video>
                                <div></div>

                            </div>
                        </div>

                        <div class="video-info clearfix">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-6">
                                    <h1 class="song-name">{{$data->name}}</h1>
                                    <h2 class="song-singer">
                                        <a href="" title="Marnik">{{$data->Artist->name}}</a>
                                    </h2>
                                    <div class="tags">
                                        <ul class="list-inline">
                                            <li><a class="btn btn-tag btn-xs" href="/genre/dance-2000004.html"
                                                   role="button">#{{strtoupper($data->Genre->name)}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="video-o">
                                        <span class="views">{{$data->count_view}}</span>
                                        <ul class="list-inline">
                                            <li>
                                                <a><i onclick="userFavorite({{$data->id}})"
                                                      class="glyph-icon flaticon-favorite"></i><span
                                                            id="like-count"> {{$favorite}}</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="glyph-icon flaticon-connection"></i> 3</a>
                                            </li>
                                        </ul>
                                        <ul class="list-inline list-button">

                                            <li><a href="javascript:void(0)" data-object-id="2000252"
                                                   data-object-type="edm_video" title="Share" class="btn btn-outline"
                                                   data-link-share="http://mix166.com/videos/children-of-a-miracle-2000252.html"
                                                   onclick="shareLink(this);"><i
                                                            class="glyph-icon flaticon-connection"></i>
                                                    share</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="play-music-singer">
                                    <a class="link-img" href="#">

                                        <img class="bgi" src="{{asset($data->path_image_video)}}"
                                             style="background-image: url({{asset($data->path_image_video)}})"
                                             alt="">
                                    </a>
                                    <h3 class="singer-name">
                                        <a href="/dj/don-diablo-2000573.html" title="Marnik">Marnik</a>
                                    </h3>
                                    <span class="follow"><i class="fa fa-heart fa-fw"></i><span
                                                id="like-count-artist">2</span></span>
                                    <a href="#" class="btn btn-outline btn-xs" data-toggle="modal" data-target="#login"><i
                                                class="glyph-icon flaticon-favorite"></i> Favorite</a>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="comments">

                                    <div class="fb-comments"
                                         data-href="https://developers.facebook.com/docs/plugins/comments#mix166-laravel-{!! $data->id !!}"
                                         data-width="500" data-numposts="5"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="video-other">
                            <div class="list-video-other">
                                <div class="auto-play">
                                    <div class="checkbox checkbox-slider--b rtl">
                                        <label>
                                            <input type="checkbox" checked=""><span>Auto-play</span>
                                        </label>
                                    </div>
                                </div>

                                @foreach($random as $value)
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{url('file',['id'=>$value->id])}}" class="link-img"><img
                                                        class="bgi" src="{{asset($value->path_image_video)}}"
                                                        style="background-image: url({{asset($value->video_image)}});"
                                                        alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <h2 class="name"><a
                                                        href="{{url('file',['id'=>$value->id])}}">{{$value->name}}</a>
                                            </h2>
                                            <h3 class="singer">by
                                                <a href="{{url('file',['id'=>$value->id])}}">{{$value->name}}</a>
                                            </h3>
                                            <span class="views">{{$value->count_view}} views</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth::check())
        <script>
            function userFavorite($id) {
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('like-count').innerHTML = 20;
                    }
                }
                xmlhttp.open("GET", "./favorite/{{$data->id}}", true);
                xmlhttp.send();

            }
        </script>
    @else
        <script>
            function userFavorite($id) {
                alert("Please login!");
            }
        </script>
    @endif
@endsection