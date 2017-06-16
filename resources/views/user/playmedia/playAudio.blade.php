@extends('layouts.appUser')
@section('content')

<div class="play-music">
    <div class="play-music-bg"
         style="background-image: url(http://st.cdn.mix166.com/images/edm_mixs/2017/04/19/1492568470-summer-background-design1314-43.jpg);"></div>
    <div class="container">
        <div class="play-music-header" style="background-image: url(http://st.cdn.nhacso.net//images/avatars/avatar_imagecover.jpg)">
            <div class="row">
                <div class="col-md-2 hidden-sm">
                    <div class="box-img" >
                        <img class="bgi img-circle"  src="http://st.mix166.com/html/images/spacer.gif"
                             style="background-image: url({{asset($data[0]->artist_image)}});width: 200px;height: 200px "

                             alt="Summer Dreams - Best Of Vocal Deep House 2017 &amp; Tropical Music">
                    </div>
                </div>
                <div class="col-md-10 col-sm-12">
                    <div class="player-box">
                        <div class="player-info">
                            <div class="row">
                                <div class="col-lg-7 col-sm-6">
                                    <h1 class="song-name">{{$data[0]->file_name}}</h1>
                                    <h2 class="song-singer">
                                        <a href="/dj/v-a-2000864.html" title="V.A"> {{$data[0]->artist_name}} </a>


                                    </h2>
                                    <div class="tags">
                                        <ul class="list-inline">
                                            <li><a class="btn btn-tag btn-xs" href=""
                                                   role="button">#Deep House</a></li>
                                            <li><a class="btn btn-tag btn-xs" href=""
                                                   role="button">#Tropical House</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-6">
                                    <div class="pm-statistic">
                                        <ul class="list-inline">
                                            <li>{{$data[0]->view_count}} <br><br>
                                                <small>PLAYS</small>
                                            </li>
                                            <li ><span id="like-count">{{$favorite[0]->favorite}}</span> <br><br>
                                                <small>LIKES</small>
                                            </li>
                                            <li>4 <br><br>
                                                <small>SHARE</small>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="player-music">

                            <div class="video-js vjs-default-skin audio-dimensions vjs-controls-enabled vjs-audio vjs-has-started vjs-paused vjs-user-inactive"
                                 id="audio">
                                <audio style="width: 70%;background-color: red"  controls autoplay="">
                                    <!--                        <source src="--><!--?//=$link_mp3;?-->
                                    <!--" type='audio/mp3' />-->
                                    <source src="{{asset($data[0]->file_path)}}"
                                            type="audio/mp3">
                                </audio>
                                <br><br>
                                <div></div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-md-9">
                <div class="content-left">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="play-music-singer">

                                <a onclick="userFavorite({{$data[0]->file_id}})"
                                   class="btn btn-outline"> <i class="glyph-icon flaticon-favorite"></i> Favorite</a>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="fb-comments"
                                 data-href="https://developers.facebook.com/docs/plugins/comments#lengshop2512_<?=$data[0]->file_id?>"
                                 data-numposts="5"></div> <!--  <div class="play-more-text">
                               <p>Trong đêm thi được đánh giá khá khó này bởi rock vốn không phải là sở trường của các thí sinh, nhóm Hương Tràm nổi trội khá rõ rệt nhờ cách chọn bài khéo léo, tạo xúc cảm cho người nghe qua Tâm hồn của đá. Sáng tác gắn liền với nhiều thế hệ khán giả của Trần Lập được khoác lên mình lớp áo mới với bản hòa âm phối khí theo thể loại drum bass. Bên cạnh đó, với lợi thế chất giọng nội lực và đầy cháy bỏng, quán quân The Voice mùa 1 biết cách đẩy tiết mục của mình lúc cao trào, lúc sâu lắng một cách linh loạt.</p>
                             </div> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="play-music-list-related">
                        <h4 class="title">Related</h4>
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
                                <a class="link-img" href="{{url('file',['id'=>$value->file_id ])}}"><img
                                            src="http://st.mix166.com/html/images/spacer.gif"
                                            style="background-image: url({{asset($value->artist_image)}});"
                                            alt=""></a>
                            </div>
                            <div class="media-body">
                                <h2 class="global-name"><a href="{{url('file',['id'=>$value->file_id ])}}">{{$value->file_name}}</a></h2>
                                <h3 class="global-author">
                                    <a href="{{url('file',['id'=>$value->file_id])}}">{{$value->artist_name}}</a>
                                </h3>
                                <ul class="details list-inline">
                                    <li><a href="#" title="" class="play"><i class="flaticon-arrows"></i>351</a></li>
                                    <li><a href="#" title="" class="like"><i class="flaticon-favorite"></i>1</a></li>
                                    <li><a href="#" title="" class="comment"><i class="flaticon-other"></i>0</a></li>
                                    <li><a href="#" title="" class="share"><i class="flaticon-connection"></i>1</a></li>
                                </ul>
                            </div>
                        </div>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(auth::check())
    <script>
        function userFavorite($id){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(this.readyState==4 && this.status==200){
                    document.getElementById('like-count').innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","./favorite/{{$data[0]->file_id}}",true);
            xmlhttp.send();

        }
    </script>
    @else
    <script>
        function userFavorite($id){
            alert("Please login!");
        }
    </script>
    @endif
    @endsection