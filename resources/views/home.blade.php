@extends('layouts.appUser')

@section('content')



    <?php
    if(isset($error))
        {
            echo $error;
        }else if(isset($ok)){
        echo $ok;
    }
            ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/tablesaw.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/bootstrap-datetimepicker.css"
          media="screen">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/style.css?v=1494261145" media="screen">


    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="{{asset('image/slider1.jpg')}}" alt="Los Angeles" style="width:100%;">

                </div>

                <div class="item">
                    <img src="{{asset('image/slider2.jpg')}}" alt="Chicago" style="width:100%;">

                </div>

                <div class="item">
                    <img src="{{asset('image/slider3.jpg')}}" alt="New York" style="width:100%;">

                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
<br>
        <br>



        <div class="main-content">
            <div class="row">
                <div class="col-md-9">
                    <div class="content-left">

                        <div class="home-section">
                            <div class="header">
                                <h3 class="title"><a href="/cate/2">MiXsets</a></h3>
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="" data-toggle="tab">Featured</a></li>
                                    <li><a href="" data-toggle="tab">Newest</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="misset_fetured">
                                    <div class="wrap">
                                        <div class="wrap-pl">
                                            @foreach($dataMix as $value)
                                                <div class="col-pl">
                                                    <div class="playlist">
                                                        <div class="thumb">
                                                            <div class="global-figure">
                                                                <a href="{{url('file',['id'=>$value->id])}}"
                                                                   title="{{$value->name}}" class="global-image">
                                                                    <span style="background-image: url({{asset($value->artist->image)}})"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="caption">
                                                            <h2 class="global-name">
                                                                <a href="{{url('file',['id'=>$value->id])}}"
                                                                   title="{{$value->name}}">{{$value->name}}</a>
                                                            </h2>
                                                            <h3 class="global-author">
                                                                <a href="{{url('artists',['id'=>$value->artist_id])}}"
                                                                   title="{{$value->artist->name}}">{{$value->artist->name}} </a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>

                                <div class="more">
                                    <a href="/cate/2" title="">More</a>
                                </div>
                            </div>
                        </div>
                        <!-- end .home-section -->
                        <div class="home-section">
                            <div class="header">
                                <h3 class="title"><a href="/cate/3">tracks</a></h3>
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="" data-toggle="tab">Featured</a></li>
                                    <li><a href="" data-toggle="tab">Newest</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="track_fetured">
                                    <div class="list-song">
                                        @foreach($dataTrack as $value)
                                            <div class="media">
                                                <div class="media-left">

                                                    <div class="thumb">
                                                        <div class="global-figure">
                                                            <div class="global-image">
                                                                <a href="{{url('file',['id'=>$value->id])}}"><span
                                                                            style="background-image: url({{asset($value->artist->image)}}); width: 80px; height: 80px;"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h2 class="global-name"><a
                                                                href="{{url('file',['id'=>$value->id])}}"
                                                                title="{{$value->name}}">{{$value->name}}</a>
                                                    </h2>
                                                    <h3 class="global-author">
                                                        <a href="{{url('artists',['id'=>$value->artist_id])}}"
                                                           title="{{$value->artist->name}}">{{$value->artist->name}}</a>
                                                    </h3>
                                                    <h3 class="global-tag">
                                                        <a href="{{url('genres',['id'=>$value->genre_id])}}" title="{{$value->genre->name}}">{{$value->genre->name}}</a>
                                                    </h3>
                                                </div>
                                                <div class="media-right">
                                                    <div class="action">
                                                        <ul class="user-action list-inline">
                                                            <!--<li><a href="javascript:void(0)" data-object-id="2004764" data-image-url="http://st.cdn.mix166.com/images/edm_songs/2017/05/08/1494231223-5fad6fb8b88c12b6246f07e60e19019e1491193016.jpg?w=100&mode=scale" data-price="0" title="Buy" class="btn-buy modal_music_buy">buy</a></li>-->
                                                            <li><a href="javascript:void(0)" data-object-id="2004764"
                                                                   data-object-type="edm_song" title="Share"
                                                                   class="btn-share"
                                                                   data-link-share="http://mix166.com/tracks/anh-se-ve-som-thoi-dj-gin-remix-2004764.html"
                                                                   onclick="shareLink(this);">share</a></li>
                                                        </ul>
                                                        <ul class="details list-inline">
                                                            <li><a href="#" title="" class="play"><i
                                                                            class="flaticon-arrows"></i>107</a></li>
                                                            <li><a href="#" title="" class="like"><i
                                                                            class="flaticon-favorite"></i>107</a></li>
                                                            <li><a href="#" title="" class="comment"><i
                                                                            class="flaticon-other"></i>107</a></li>
                                                            <li><a href="#" title="" class="share"><i
                                                                            class="flaticon-connection"></i>107</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <div class="more more-song">
                                        <a href="/cate/3" title="Load More">More</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="home-section">
                            <div class="header">
                                <h3 class="title"><a href="/cate/1">VIDEOS</a></h3>
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="" data-toggle="tab">Featured</a></li>
                                    <li><a href="" data-toggle="tab">Newest</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="video_fetured">
                                    <div class="video-section list-video">
                                        <div class="row">
                                            @foreach($dataVideo as $value )
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="video">
                                                    <div class="thumb">
                                                        <div class="global-figure">
                                                            <div class="global-image">
                                                                <a href="{{url('file',['id'=>$value->id])}}"
                                                                   title="{{$value->name}}">
                                                                    <span style="background-image: url({{asset($value->path_image_video)}})"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <a href="{{url('file',['id'=>$value->id])}}" title=""
                                                           class="global-action">
                                                  <span class="video-play">
                                                    <i class="flaticon-arrows"></i>
                                                  </span>
                                                        </a>
                                                        <span class="video-time">40:01</span>
                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <h1 class="global-name">
                                                        <a href="{{url('file',['id'=>$value->id])}}" title="{{$value->name}}">{{$value->name}}</a>
                                                    </h1>
                                                    <h2 class="global-author">
                                                <span>

                                                  <a href="{{url('artists',['id'=>$value->artist->id])}}" title="{{$value->genre->name}}">{{$value->genre->name}}</a>
                                                </span>
                                                    </h2>
                                                    <span class="total-views">{{$value->count_view}} view</span>

                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="more more-song" style="margin-top: -20px;">
                                        <a href="/cate/1" title="Load More">More</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!-- end .home-section -->
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- end .content-left -->
                    <div class="sidebar">

                        <div class="list-app">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="https://itunes.apple.com/us/app/id1049233270?mt=8" target="_blank"
                                       title="App Store">
                                        <img src="http://st.mix166.com/html/images/app-store.png" alt="app-store">
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="https://play.google.com/store/apps/details?id=com.bda.mix166"
                                       target="_blank"
                                       title="Google Play">
                                        <img src="http://st.mix166.com/html/images/google-play.png" alt="google play">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end .list-app -->
                        <div class="block-sidebar">
                            <div class="header">
                                <a href="#" title="">
                                    <img src="http://st.mix166.com/html/images/right-logo.png">
                                </a>
                                <div class="type">
                                    <span>top mixsets</span>
                                    <a href="/cate/2" title="View all">View all</a>
                                </div>
                            </div>

                            <div class="widget-song-list">
                                <?php $i = 1?>
                                @foreach($dataMixTop as $value)
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <div class="rank-up-down">
                            <span class="ratings">
                                {{$i++}}                            </span>
                                                <span><i class=""></i></span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="thumb">
                                                <div class="global-figure">
                                                    <div class="global-image">
                                                        <a href="{{url('file',['id'=>$value->id])}}"
                                                           title="{{$value->name}}"><span
                                                                    style="background-image: url({{asset($value->artist->image)}}); width: 65px; height: 65px;"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-right">
                                            <h2 class="global-name"><a
                                                        href="{{url('file',['id'=>$value->id])}}"
                                                        title="{{$value->name}}">{{$value->name}}</a></h2>
                                            <h3 class="global-author">
                                                <a href="{{url('artists',['id'=>$value->artist_id])}}">{{$value->artist->name}}</a>
                                            </h3>
                                            <h3 class="global-tag">
                                                <a href="{{url('genres',['id'=>$value->genre_id])}}">{{$value->genre->name}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <!-- end .block-sidebar -->
                        <div class="block-sidebar list-top-track">
                            <div class="header">
                                <a href="#" title="">
                                    <img src="http://st.mix166.com/html/images/right-logo.png">
                                </a>
                                <div class="type">
                                    <span>top tracks</span>
                                    <a href="" title="View all">View all</a>
                                </div>
                            </div>

                            <div class="widget-song-list">
                                <?php
                                    $i=1;
                                ?>


                                @foreach($dataTrackTop as $value)
                                    <div class="media">
                                        <div class="media-left"><span class="ratings"><?=$i++?></span></div>
                                        <div class="media-body">
                                            <h2 class="global-name"><a href="{{url('file',['id'=>$value->id])}}"
                                                                       title="{{$value->name}}">{{$value->name}}</a></h2>
                                            <h3 class="global-author">
                                                <a href="{{url('artists',['id'=>$value->artist_id])}}">{{$value->artist->name}}</a>
                                            </h3>
                                            <h3 class="global-tag">
                                                <a href="">{{$value->genre->name}}</a>

                                            </h3>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .sidebar -->
            </div>
            <!-- end .container -->
        </div>
    </div>

@endsection
