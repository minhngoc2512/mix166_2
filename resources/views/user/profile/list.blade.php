@extends('layouts.appUser')
@section('content')
    <div class="profile">
        <div class="profile-bg"
             style="background-image: url(http://st.cdn.nhacso.net//images/avatars/avatar_imagecover.jpg)"></div>
        <div class="container">

            <div class="profile-header">
                <div class="row">
                    <div class="col-sm-4 col-md-2">
                        <form id="updateAvatarFrm">
                            <div class="box-img">
                                <img class="bgi" src="http://st.cdn.mix166.com/images/spacer.gif"
                                     style="background-image: url(http://st.cdn.nhacso.net//images/avatars/avatar_defaultedm.jpg);height: 200px"
                                     alt="">
                                <a href="#" class="shadow"></a>
                                <div id="fileUploadAvatar" class="file-upload-avatar dropper">
                                    <span>profile picture</span>
                                    <input type="hidden" id="location" name="location" value="">
                                    <input class="dropper-input upload" type="file" multiple=""></div>
                            </div>
                            <ul id="saveAvatar" style="display:none;" class="list-inline action-update action-update-1">
                                <li><a href="javascript:void(0)" class="saveChangeAvatar" title="">Save</a></li>
                                <li><a href="javascript:void(0)" onclick="cancelSaveAvatar(this)"
                                       data-avatar-old="http://st.cdn.nhacso.net//images/avatars/avatar_defaultedm.jpg"
                                       title="">Cancel</a></li>
                            </ul>
                        </form>
                    </div>
                    <div class="col-sm-8 col-md-10">
                        <div class="profile-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                                    <div class="profile-details">
                                        <h1 class="profile-name">
                                            Leng Keng </h1>
                                        <span class="old">
                          -                         </span>
                                        <span class="address">

                        </span>
                                    </div>
                                </div>
                                <div class="list-button col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="javascript:void(0)" onclick="shareLink(this);"
                                               data-link-share="http://mix166.com/profile/leng-keng-2006543.html"
                                               title="share" class="btn btn-outline btn-share"><i
                                                        class="flaticon-connection"></i> Share</a>
                                        </li>
                                        <li><a href="/profile/edit" title="" class="btn-edit btn-outline">Edit
                                                profile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="updateCoverFrm">
                    <div id="fileUploadCover" class="fileUpload dropper">
                        <span>update cover photo</span>
                        <input type="hidden" id="location_cover" name="location_cover" value="">
                        <input class="dropper-input upload" type="file" multiple=""></div>
                    <ul id="saveCover" style="display:none;" class="list-inline action-update">
                        <li><a href="javascript:void(0)" class="saveChangeCover" title="">Save changes</a></li>
                        <li><a href="javascript:void(0)" onclick="cancelSaveCover(this)"
                               data-cover-old="http://st.cdn.nhacso.net/images/avatars/avatar_imagecover.jpg" title="">Cancel</a>
                        </li>
                    </ul>
                </form>
            </div>

            <div class="main-content">
                <div class="row">


                    <div class="col-md-12 ">
                        <div class="list-object">
                            <ul>
                                <li ><a href="#" title="" class="active">Home</a></li>
                                <li><a href="{{url('user/upload')}}" title="" class="">Uploadfile</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="content-left">

                            <div class="home-section profile-section">
                                <div class="header-section">
                                    <h3 class="title">
                                        my music
                                    </h3>
                                    <ul class="type list-inline">
                                        <li class="active"><a title="" href="#mixset-tab" data-toggle="tab">mixsets</a>
                                        </li>
                                        <li><a title="" href="#track-tab" data-toggle="tab">tracks</a></li>
                                        <li><a title="" href="#video-tab" data-toggle="tab">videos</a></li>
                                    </ul>
                                    <a href="/profile/leng-keng-2006543.html?view_type=my_music" title=""
                                       class="view-all">View all</a>
                                </div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="mixset-tab">
                                        <div class="wrap">
                                            <div class="wrap-pl">


                                                @foreach($dataUserMixset as $data)
                                                    <div class="col-pl">
                                                        <div class="playlist">
                                                            <div class="thumb">
                                                                <div class="global-figure">
                                                                    <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                       title="{{$data->file_name}}"
                                                                       class="global-image">
                                                                        <span style="background-image: url({{asset($data->path_image)}})"></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <h2 class="global-name">
                                                                    <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                       title="{{$data->file_name}}">{{$data->file_name}}</a>
                                                                </h2>
                                                                <h3 class="global-author">
                                                                    <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->artist_name}}">{{$data->artist_name}} </a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach



                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="track-tab">
                                        <div class="list-song">

                                            @foreach($dataUserTrack as $data)
                                                <div class="media">
                                                    <div class="media-left">

                                                        <div class="thumb">
                                                            <div class="global-figure">
                                                                <div class="global-image">
                                                                    <a href="{{url('file',['id'=>$data->file_id])}}"><span
                                                                                style="background-image: url({{asset($data->path_image)}}); width: 80px; height: 80px;"></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h2 class="global-name"><a
                                                                    href="{{url('file',['id'=>$data->file_id])}}"
                                                                    title="{{$data->file_name}}">{{$data->file_name}}</a></h2>
                                                        <h3 class="global-author">
                                                            <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->artist_name}}">{{$data->artist_name}}</a>

                                                        </h3>
                                                        <h3 class="global-tag">
                                                            <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->gen_name}}">{{$data->gen_name}}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="media-right">
                                                        <div class="action">
                                                            <ul class="user-action list-inline">
                                                                <!--<li><a href="javascript:void(0)" data-object-id="2005021" data-image-url="http://st.cdn.mix166.com/images/edm_songs/2017/06/08/1496893616-sa.jpg?w=100&mode=scale" data-price="0" title="Buy" class="btn-buy modal_music_buy">buy</a></li>-->
                                                                <li><a href="javascript:void(0)" data-object-id="2005021"
                                                                       data-object-type="edm_song" title="Share"
                                                                       class="btn-share"
                                                                       data-link-share="http://mix166.com/tracks/back-to-me-ft-micky-blue-2005021.html"
                                                                       onclick="shareLink(this);">share</a></li>
                                                            </ul>
                                                            <ul class="details list-inline">
                                                                <li><a href="#" title="" class="play"><i
                                                                                class="flaticon-arrows"></i>92</a></li>
                                                                <li><a href="#" title="" class="like"><i
                                                                                class="flaticon-favorite"></i>92</a></li>
                                                                <li><a href="#" title="" class="comment"><i
                                                                                class="flaticon-other"></i>92</a></li>
                                                                <li><a href="#" title="" class="share"><i
                                                                                class="flaticon-connection"></i>92</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="video-tab">
                                        <div class="wrap">
                                            <div class="wrap-pl">


                                                <div class="video-section list-video">
                                                    <div class="row">
                                                        @foreach($dataUserVideo as $data)

                                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                                <div class="video">
                                                                    <div class="thumb">
                                                                        <div class="global-figure">
                                                                            <div class="global-image">
                                                                                <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                                   title="{{$data->file_name}}">
                                                                                    <span style="background-image: url({{asset($data->image_video)}})"></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                           title="{{$data->file_name}}" class="global-action">
                                                                  <span class="video-play">
                                                                    <i class="flaticon-arrows"></i>
                                                                  </span>
                                                                        </a>
                                                                        <span class="video-time">03:18      </span>
                                                                    </div>
                                                                </div>
                                                                <div class="caption">
                                                                    <h1 class="global-name">
                                                                        <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                           title="{{$data->file_name}}">{{$data->file_name}}</a>
                                                                    </h1>
                                                                    <h2 class="global-author">
                                                            <span>by
                                                              <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->artist_name}}">{{$data->artist_name}}</a>
                                                            </span>
                                                                    </h2>
                                                                    <span class="total-views">
                                                                View
                                                                        {{$data->count_view}}
                                                                  </span>

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
                            <div class="home-section profile-section">
                                <div class="header-section">
                                    <h3 class="title">
                                        favorite
                                    </h3>
                                    <ul class="type list-inline">
                                        <li class=""><a href="#mixset-tab-1" title="" data-toggle="tab"
                                                        aria-expanded="false">mixsets</a>
                                        </li>
                                        <li class=""><a href="#track-tab-1" title="" data-toggle="tab"
                                                        aria-expanded="false">tracks</a></li>
                                        <li class="active"><a href="#video-tab-1" title="" data-toggle="tab"
                                                              aria-expanded="true">videos</a></li>
                                    </ul>
                                    <a href="" title=""
                                       class="view-all">View all</a>
                                </div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="mixset-tab-1">
                                        <div class="wrap">
                                            <div class="wrap-pl">

                                                @foreach($dataMixset as $data)
                                                <div class="col-pl">
                                                    <div class="playlist">
                                                        <div class="thumb">
                                                            <div class="global-figure">
                                                                <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                   title="{{$data->file_name}}"
                                                                   class="global-image">
                                                                    <span style="background-image: url({{asset($data->path_image)}})"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="caption">
                                                            <h2 class="global-name">
                                                                <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                   title="{{$data->file_name}}">{{$data->file_name}}</a>
                                                            </h2>
                                                            <h3 class="global-author">
                                                                <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->artist_name}}">{{$data->artist_name}} </a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="track-tab-1">
                                        <div class="list-song">

                                            @foreach($dataTrack as $data)
                                            <div class="media">
                                                <div class="media-left">

                                                    <div class="thumb">
                                                        <div class="global-figure">
                                                            <div class="global-image">
                                                                <a href="{{url('file',['id'=>$data->file_id])}}"><span
                                                                            style="background-image: url({{asset($data->path_image)}}); width: 80px; height: 80px;"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h2 class="global-name"><a
                                                                href="{{$data->file_name}}"
                                                                title="{{$data->file_name}}">{{$data->file_name}}</a></h2>
                                                    <h3 class="global-author">
                                                        <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->artist_name}}">{{$data->artist_name}}</a>

                                                    </h3>
                                                    <h3 class="global-tag">
                                                        <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->gen_name}}">{{$data->gen_name}}</a>
                                                    </h3>
                                                </div>
                                                <div class="media-right">
                                                    <div class="action">
                                                        <ul class="user-action list-inline">
                                                            <!--<li><a href="javascript:void(0)" data-object-id="2005021" data-image-url="http://st.cdn.mix166.com/images/edm_songs/2017/06/08/1496893616-sa.jpg?w=100&mode=scale" data-price="0" title="Buy" class="btn-buy modal_music_buy">buy</a></li>-->
                                                            <li><a href="javascript:void(0)" data-object-id="2005021"
                                                                   data-object-type="edm_song" title="Share"
                                                                   class="btn-share"
                                                                   data-link-share="http://mix166.com/tracks/back-to-me-ft-micky-blue-2005021.html"
                                                                   onclick="shareLink(this);">share</a></li>
                                                        </ul>
                                                        <ul class="details list-inline">
                                                            <li><a href="#" title="" class="play"><i
                                                                            class="flaticon-arrows"></i>92</a></li>
                                                            <li><a href="#" title="" class="like"><i
                                                                            class="flaticon-favorite"></i>92</a></li>
                                                            <li><a href="#" title="" class="comment"><i
                                                                            class="flaticon-other"></i>92</a></li>
                                                            <li><a href="#" title="" class="share"><i
                                                                            class="flaticon-connection"></i>92</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="video-tab-1">
                                        <div class="video-section list-video">
                                            <div class="row">
                                                @foreach($dataVideo as $data)

                                                <div class="col-xs-6 col-sm-6 col-md-3">
                                                    <div class="video">
                                                        <div class="thumb">
                                                            <div class="global-figure">
                                                                <div class="global-image">
                                                                    <a href="{{url('file',['id'=>$data->file_id])}}"
                                                                       title="{{$data->file_name}}">
                                                                        <span style="background-image: url({{asset($data->image_video)}})"></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <a href="{{url('file',['id'=>$data->file_id])}}"
                                                               title="{{$data->file_name}}" class="global-action">
                                                                  <span class="video-play">
                                                                    <i class="flaticon-arrows"></i>
                                                                  </span>
                                                            </a>
                                                            <span class="video-time">03:18      </span>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <h1 class="global-name">
                                                            <a href="{{url('file',['id'=>$data->file_id])}}"
                                                               title="{{$data->file_name}}">{{$data->file_name}}</a>
                                                        </h1>
                                                        <h2 class="global-author">
                                                            <span>by
                                                              <a href="{{url('file',['id'=>$data->file_id])}}" title="{{$data->artist_name}}">{{$data->artist_name}}</a>
                                                            </span>
                                                        </h2>
                                                            <span class="total-views">
                                                                View
                                                                    {{$data->count_view}}
                                                                  </span>

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
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="block-sidebar">
                                <div class="header">
                                    <a href="#" title="">
                                        <img src="http://st.mix166.com/html/images/right-logo.png">
                                    </a>
                                    <div class="type">
                                        <span>top mixsets</span>
                                        <a href="/charts/" title="View all">View all</a>
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
                                                            <a href="{{url('file',['id'=>$value->file_id])}}"
                                                               title="{{$value->name_file}}"><span
                                                                        style="background-image: url({{asset($value->image_path)}}); width: 65px; height: 65px;"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <h2 class="global-name"><a
                                                            href="{{url('file',['id'=>$value->file_id])}}"
                                                            title="{{$value->name_file}}"></a></h2>
                                                <h3 class="global-author">
                                                    <a href="/">{{$value->name_artist}}</a>
                                                </h3>
                                                <h3 class="global-tag">
                                                    <a href="{{url('file',['id'=>$value->file_id])}}">{{$value->name_gen}}</a>
                                                </h3>
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
    </div>
@endsection