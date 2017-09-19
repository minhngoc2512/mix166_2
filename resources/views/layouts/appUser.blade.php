<?php
use App\Category;
?>
<html lang="en" class=" responsejs ">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="fb:app_id" content="1037661906285329">
    <meta property="og:url" content="http://mix166.com">
    <meta property="og:title" content="Mix166 - Listen to EDM &amp; Mixset">
    <meta property="og:description"
          content="Listen to Electro Dance Music on Mix166 - the first EDM App Asia. Listen to newest dance remix 2016 with exclusive mixset on your mobile phone. Compatible with iPhone, iPad, and iPod touch go with iOS 8.0 or later.">
    <meta property="og:image" content="http://st.mix166.com/html/images/400x400.jpg">
    <meta name="title" content="Mix166 - Listen to EDM &amp; Mixset">
    <meta name="keywords"
          content="dj ,remix ,the remix, electro house ,nhạc remix ,edm ,hardwell, trap ,skrillex,dubstep">
    <meta name="description"
          content="Listen to Electro Dance Music on Mix166 - the first EDM App Asia. Listen to newest dance remix 2016 with exclusive mixset on your mobile phone. Compatible with iPhone, iPad, and iPod touch go with iOS 8.0 or later.">
    <title>Mix166 - Listen to EDM &amp; Mixset</title>
    <link href="http://mix166.com" rel="canonical">
    <link href="http://st.mix166.com/html/images/400x400.jpg" rel="image_src">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="google-site-verification" content="CPBlLIUXuIgKiPcEmGenAeJMJ1laVvBk59bZh28EmLs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/flaticon.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/live-stream.css')}}"
          media="screen">
    <link rel="icon" href="{{asset('mix166.ico')}}" type="image/ico" sizes="16x16">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>


    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}" >

</head>

<body>
<div id="fb-root"></div>

<header id="header">
    <nav class="navbar navbar-inverse navbar-default "  >
        <div class="container">
            @include('user.logerror.error')
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="http://st.mix166.com/html/images/logo.png" alt="">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="/">FEATURED</a></li>-->
                   
                    @foreach($category as $value)
                    <li><a href="{{url('cate',['name'=>$value['name']])}}">{!! $value['name'] !!}</a></li>

                        @endforeach
                </ul>

                <ul class="nav navbar-nav navbar-right visible-sm">
                    <li><a href="javascript:void(0)" id="link_search_tl"><i class="flaticon-search"></i></a></li>
                </ul>

                <form id="search" class="navbar-form navbar-right hidden-sm" action="/search">
                    <div class="form-group">
                        <div class="input-g">
                            <input id="search_input_text" type="text" class="form-control input-sm" name="q" value=""
                                   placeholder="Search">
                            <i class="flaticon-search"></i>
                        </div>
                        <!-- /input-group -->
                    </div>


                    @if(auth::check())
                        <div id="user-login" class="user-login-default">

                            <a >
                                <img src="http://st.cdn.nhacso.net//images/avatars/avatar_defaultedm.jpg" alt="">
                                <span class="name">{{strtoupper(auth::user()->name)}}</span>
                                <span class="glyphicon glyphicon-menu-down"></span>
                            </a>
                            <div class="list-action" style="display: none;">
                                <ul>
                                    <li><a href="{{url('UserProfile',['id'=>auth::user()->id])}}" title="Profile">Profile</a></li>

                                    <li><a href="{{url('logoutUser')}}">Logout</a></li>
                                </ul>
                            </div>
                        </div>

                        @else


                    <button type="button" class="btn btn-link btn-sm btn-login" data-toggle="modal"
                    data-target="#login">LOG IN
                    </button>


                        @endif

                </form>
                <div id="search_tl" class="">

                    <div class="search-tl">
                        <form id="search" action="/search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="flaticon-search"></i></span>
                                <input id="search_input_text1" type="text" class="form-control input-sm" name="q"
                                       value="" placeholder="Search">
                                <span id="close_search_tl" class="input-group-addon"><i
                                            class="flaticon-delete"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>

</header>
  @yield('content')
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="footer-logo">
                    <div class="row">
                        <div class="col-sm-12 col-xs-6">
                            <div class="mix166">
                                <a href="/"><img src="http://st.mix166.com/html/images/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-6">
                            <div class="app-store">
                                <a href="https://itunes.apple.com/us/app/id1049233270?mt=8" target="_blank"><img src="http://st.mix166.com/html/images/app-store.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="footer-menu">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <h4 class="title">about</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Feedback</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <h4 class="title">Menu</h4>
                            <ul class="list-unstyled">


                                @foreach($category as $value)
                                    <li><a href="{{url('cate',['name'=>$value['name']])}}">{!! $value['name'] !!}</a></li>

                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <h4 class="title">Social network</h4>
                            <ul class="list-inline social">
                                <li class="facebook"><a target="_blank" href="https://www.facebook.com/appmix166/"><i class="glyph-icon flaticon-social-network"></i></a></li>
                                <li class="twitter"><a target="_blank" href="https://twitter.com/Appmix166"><i class="glyph-icon flaticon-social-media"></i></a></li>
                                <li class="youtube"><a target="_blank" href="https://www.youtube.com/channel/UC26cKvVE9UryMvtFBHTr8ew"><i class="glyph-icon flaticon-social"></i></a></li>
                                <li class="instagram"><a target="_blank" href="https://instagram.com/mix166/"><i class="glyph-icon flaticon-social-media-1"></i></a></li>
                                <li class="google"><a target="_blank" href="https://plus.google.com/u/1/103042902420628455208/posts?hl=vi"><i class="glyph-icon flaticon-circle"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="search_block" class="search-block">
    <div class="container">
        <div class="search">
            <div class="search-title">
                Search results for
                <a href="#" class="exit"><i class="flaticon-delete"></i></a>
            </div>
            <div class="search-results">
                <h1>kevin</h1>
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>

<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{route('UserLogin')}}" method="post" >
                <div class="header-login">
                    <ul class="list-logo">
                        <li><a href="/" title=""><img src="http://st.mix166.com/html/images/logo.png"></a></li>
                    </ul>
                </div>
                {{csrf_field()}}
                <div class="form-group">
                    <label><h3>Email</h3></label>
                    <input  type="email" name="email" placeholder="EMAIL" class="form-control" style="    border: 1px solid #fff;
    color: #fff!important;
    background: #000;
    text-align: center;
    padding: 32px;
    font-size: 20px;
    letter-spacing: 2px;
">

                </div>
                <div class="form-group">
                    <lable><h3>Password</h3></lable>
                    <input  type="password" name="password" placeholder="PASSWORD" class="form-control" style="    border: 1px solid #fff;
    color: #fff!important;
    background: #000;
    text-align: center;
    padding: 32px;
    font-size: 20px;
    letter-spacing: 2px;">

                </div>
                <div class="form-group">
                <input type="submit" value="LOGIN" class="btn btn-login" style="
                    margin-bottom: 20px;
                background: #ed1c24;
                    display: block;
                width: 100%;
                padding: 16px 0;
                font-size: 23px;
                color: #fff;
                text-transform: uppercase;
                font-weight: 700;


"  >
                </div>



            </form>
            <div class="login-content">

                <div class="form-group">
                    <ul class="notes">
                        <li class="note-1">
                            <a href="#" data-toggle="modal" data-dismiss="modal"
                               data-target="#forgot_password">Forgot password ?</a>
                        </li>
                        <li class="note-2">
                            <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#register">Create
                                new account</a>
                        </li>
                    </ul>
                </div>

            </div>



        </div>
    </div>
</div>

<script async="" src="//www.googletagmanager.com/gtm.js?id=GTM-WK2Z3D"></script>
<script id="facebook-jssdk" src="//connect.facebook.net/en_US/sdk.js"></script>
<script async="" src="//www.google-analytics.com/analytics.js"></script>


<div id="register" class="modal fade" role="dialog" >
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form role="form"  action="{{route('user/registration')}}" method="post" novalidate="novalidate">

                {{csrf_field()}}
                <div class="header-login">
                    <ul class="list-logo">
                        <li><a href="#" title=""><img src="http://st.mix166.com/html/images/logo.png"></a></li>
                    </ul>
                </div>
                <div class="login-content">
                    <div class="form-group text-info">
                            <span class="success" style="display: none;" id="regNoti">
                                Registration successful
                            </span>
                    </div>
                    <div class="form-group text-info">
                        <input type="email" class="form-control text" id="reg_email" name="email"
                               placeholder="EMAIL">
                    </div>
                    <div class="form-group text-info">
                        <input type="text" class="form-control text" id="name" name="name" placeholder="FULL NAME">
                    </div>
                    <div class="form-group text-info">
                        <input type="password" class="form-control text" id="reg_password" name="pass"
                               placeholder="PASSWORD">
                    </div>
                    <div class="form-group text-info">
                        <input type="password" class="form-control text" id="reg_re_password" name="Repass"
                               placeholder="RETYPE NEW PASSWORD">
                    </div>
                    <div class="footer-login">
                        <div class="form-group">
                            <button type="submit" class="btn btn-register">Create an account</button>
                        </div>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>

<div id="forgot_password" class="modal fade" role="dialog" login="">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form role="form" action="{{route('resetPassword')}}" method="post" novalidate="novalidate">
                {{csrf_field()}}
                <div class="header-login">
                    <ul class="list-logo">
                        <li><a href="#" title=""><img src="http://st.mix166.com/html/images/logo.png"></a></li>
                    </ul>
                </div>
                <div class="form-group text-info">
                        <span class="success" style="display: none;" id="forgetNoti">

                        </span>
                </div>
                <div class="login-content">
                    <div class="form-group text-info">
                        <input type="email" class="form-control text" id="email" name="email"
                               placeholder="YOUR EMAIL">
                    </div>
                    <div class="form-group text-info">
                        <input type="password" class="form-control text" id="email" name="password"
                               placeholder="NEW PASSWORD">
                    </div>
                    <div class="form-group text-info">
                        <input type="password" class="form-control text" id="email" name="password_confirmation"
                               placeholder="PASSWROD CONFIRMATION">
                    </div>
                </div>
                <div class="footer-login">
                    <div class="form-group">
                        <button type="submit" class="btn btn-register">Get your password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="song_share" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-share-music">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title">Share</h4>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li>
                                <a href="#" id="facebookShare" class="ftg facebook popup"></a>
                            </li>
                            <li>
                                <a href="#" id="twitterShare" class="ftg twitter popup"></a>
                            </li>
                            <li>
                                <a href="#" id="googleShare" class="ftg google popup"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <div class="link-share">
                            <input type="text" id="link-share" class="form-control input-sm" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="massenger" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-share-music">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title">Massenger</h4>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <p>Complet</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal_music_buy">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title">BUY MIXSET</h4>
            </div>
            <div class="modal-body">
                <div class="media">
                    <div class="media-left" id="poup-image">
                        <!--<span class="bgi" style="background-image: url()"></span> -->
                    </div>
                    <div class="media-body">
                        <h3 class="price"><strong>price: <span>100.000 vnđ</span></strong></h3>
                        <ul>
                            <li>Listenning full version of this mixset</li>
                            <li>Download Mixset in MP3 and LossLess format</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" class="btn btn-default btn-addd-cart">ADDD TO CART</button>
                    <button type="button" class="btn btn-danger btn-addd-buy">BUY MIXSET NOW</button>
                </div>
            </div>
            <div>
                <div>
                    <input type="hidden" id="data-object">
                    <input type="hidden" id="data-user">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end #footer -->
<script type="text/javascript" src="{{asset('js/lib.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/start.js')}}"></script>
<script type="text/javascript" src="{{asset('js/function.js')}}"></script>
<script type="text/javascript" src="{{asset('js/myjs.js')}}"></script>



<!-- End Google Tag Manager -->

</div>
</body>
</html>