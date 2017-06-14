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
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/font.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/flaticon.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/plugins/slick/slick.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/live-stream.css?v=1494145966"
          media="screen">
    <link rel="icon" href="http://st.mix166.com/html/images/mix166.ico" type="image/ico" sizes="16x16">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style type="text/css">
        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset > div {
            overflow: hidden
        }

        .fb_link img {
            border: none
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }
            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_dialog {
            background: rgba(82, 82, 82, .7);
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reset .fb_dialog_legacy {
            overflow: visible
        }

        .fb_dialog_advanced {
            padding: 10px;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px
        }

        .fb_dialog_content {
            background: #fff;
            color: #333
        }

        .fb_dialog_close_icon {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
            cursor: pointer;
            display: block;
            height: 15px;
            position: absolute;
            right: 18px;
            top: 17px;
            width: 15px
        }

        .fb_dialog_mobile .fb_dialog_close_icon {
            top: 5px;
            left: 5px;
            right: auto
        }

        .fb_dialog_padding {
            background-color: transparent;
            position: absolute;
            width: 1px;
            z-index: -1
        }

        .fb_dialog_close_icon:hover {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
        }

        .fb_dialog_close_icon:active {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
        }

        .fb_dialog_loader {
            background-color: #f6f7f9;
            border: 1px solid #606060;
            font-size: 24px;
            padding: 20px
        }

        .fb_dialog_top_left, .fb_dialog_top_right, .fb_dialog_bottom_left, .fb_dialog_bottom_right {
            height: 10px;
            width: 10px;
            overflow: hidden;
            position: absolute
        }

        .fb_dialog_top_left {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;
            left: -10px;
            top: -10px
        }

        .fb_dialog_top_right {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;
            right: -10px;
            top: -10px
        }

        .fb_dialog_bottom_left {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;
            bottom: -10px;
            left: -10px
        }

        .fb_dialog_bottom_right {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;
            right: -10px;
            bottom: -10px
        }

        .fb_dialog_vert_left, .fb_dialog_vert_right, .fb_dialog_horiz_top, .fb_dialog_horiz_bottom {
            position: absolute;
            background: #525252;
            filter: alpha(opacity=70);
            opacity: .7
        }

        .fb_dialog_vert_left, .fb_dialog_vert_right {
            width: 10px;
            height: 100%
        }

        .fb_dialog_vert_left {
            margin-left: -10px
        }

        .fb_dialog_vert_right {
            right: 0;
            margin-right: -10px
        }

        .fb_dialog_horiz_top, .fb_dialog_horiz_bottom {
            width: 100%;
            height: 10px
        }

        .fb_dialog_horiz_top {
            margin-top: -10px
        }

        .fb_dialog_horiz_bottom {
            bottom: 0;
            margin-bottom: -10px
        }

        .fb_dialog_iframe {
            line-height: 0
        }

        .fb_dialog_content .dialog_title {
            background: #6d84b4;
            border: 1px solid #365899;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            margin: 0
        }

        .fb_dialog_content .dialog_title > span {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
            float: left;
            padding: 5px 0 7px 26px
        }

        body.fb_hidden {
            -webkit-transform: none;
            height: 100%;
            margin: 0;
            overflow: visible;
            position: absolute;
            top: -10000px;
            left: 0;
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
            min-height: 100%;
            min-width: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 10001
        }

        .fb_dialog.fb_dialog_mobile.loading.centered {
            width: auto;
            height: auto;
            min-height: initial;
            min-width: initial;
            background: none
        }

        .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
            background: none
        }

        .loading.centered #fb_dialog_loader_close {
            color: #fff;
            display: block;
            padding-top: 20px;
            clear: both;
            font-size: 18px
        }

        #fb-root #fb_dialog_ipad_overlay {
            background: rgba(0, 0, 0, .45);
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            width: 100%;
            min-height: 100%;
            z-index: 10000
        }

        #fb-root #fb_dialog_ipad_overlay.hidden {
            display: none
        }

        .fb_dialog.fb_dialog_mobile.loading iframe {
            visibility: hidden
        }

        .fb_dialog_content .dialog_header {
            -webkit-box-shadow: white 0 1px 1px -1px inset;
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));
            border-bottom: 1px solid;
            border-color: #1d4088;
            color: #fff;
            font: 14px Helvetica, sans-serif;
            font-weight: bold;
            text-overflow: ellipsis;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
            vertical-align: middle;
            white-space: nowrap
        }

        .fb_dialog_content .dialog_header table {
            -webkit-font-smoothing: subpixel-antialiased;
            height: 43px;
            width: 100%
        }

        .fb_dialog_content .dialog_header td.header_left {
            font-size: 12px;
            padding-left: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .dialog_header td.header_right {
            font-size: 12px;
            padding-right: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .touchable_button {
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));
            border: 1px solid #29487d;
            -webkit-background-clip: padding-box;
            -webkit-border-radius: 3px;
            -webkit-box-shadow: rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;
            display: inline-block;
            margin-top: 3px;
            max-width: 85px;
            line-height: 18px;
            padding: 4px 12px;
            position: relative
        }

        .fb_dialog_content .dialog_header .touchable_button input {
            border: none;
            background: none;
            color: #fff;
            font: 12px Helvetica, sans-serif;
            font-weight: bold;
            margin: 2px -12px;
            padding: 2px 6px 3px 6px;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog_content .dialog_header .header_center {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            vertical-align: middle
        }

        .fb_dialog_content .dialog_content {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
            border: 1px solid #555;
            border-bottom: 0;
            border-top: 0;
            height: 150px
        }

        .fb_dialog_content .dialog_footer {
            background: #f6f7f9;
            border: 1px solid #555;
            border-top-color: #ccc;
            height: 40px
        }

        #fb_dialog_loader_close {
            float: left
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_button {
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
            visibility: hidden
        }

        #fb_dialog_loader_spinner {
            animation: rotateSpinner 1.2s linear infinite;
            background-color: transparent;
            background-image: url(http://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
            background-repeat: no-repeat;
            background-position: 50% 50%;
            height: 24px;
            width: 24px
        }

        @keyframes rotateSpinner {
            0% {
                transform: rotate(0deg)
            }
            100% {
                transform: rotate(360deg)
            }
        }

        .fb_iframe_widget {
            display: inline-block;
            position: relative
        }

        .fb_iframe_widget span {
            display: inline-block;
            position: relative;
            text-align: justify
        }

        .fb_iframe_widget iframe {
            position: absolute
        }

        .fb_iframe_widget_fluid_desktop, .fb_iframe_widget_fluid_desktop span, .fb_iframe_widget_fluid_desktop iframe {
            max-width: 100%
        }

        .fb_iframe_widget_fluid_desktop iframe {
            min-width: 220px;
            position: relative
        }

        .fb_iframe_widget_lift {
            z-index: 1
        }

        .fb_hide_iframes iframe {
            position: relative;
            left: -10000px
        }

        .fb_iframe_widget_loader {
            position: relative;
            display: inline-block
        }

        .fb_iframe_widget_fluid {
            display: inline
        }

        .fb_iframe_widget_fluid span {
            width: 100%
        }

        .fb_iframe_widget_loader iframe {
            min-height: 32px;
            z-index: 2;
            zoom: 1
        }

        .fb_iframe_widget_loader .FB_Loader {
            background: url(http://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat;
            height: 32px;
            width: 32px;
            margin-left: -16px;
            position: absolute;
            left: 50%;
            z-index: 4
        }</style>
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
                    <?php
                    $data = Category::all()->toArray();

                    ?>
                    @foreach($data as $value)
                    <li><a href="{{url('cate',['id'=>$value['id']])}}">{!! $value['name'] !!}</a></li>

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


                                @foreach($data as $value)
                                    <li><a href="cate/{!! $value['id'] !!}">{!! $value['name'] !!}</a></li>

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
<script>
    //Here we run a very simple test of the Graph API after login is
    //successful.  See statusChangeCallback() for when this call is made.
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
//                console.log(response.authResponse);
            // Logged into your app and Facebook.
            $.ajax({
                method: "POST",
                url: "/auth/loginFacebookv2",
                data: response.authResponse,
                dataType: "json"
            })
                .done(function (data) {
                    if (data.status == 1) {
                        location.reload();
                    } else {
                        alert(data.error);
                    }
                });
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            document.getElementById('status').innerHTML = 'Please log into this app.';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            document.getElementById('status').innerHTML = 'Please log into Facebook.';
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }
    function fb_login() {
        FB.login(function (response) {
            statusChangeCallback(response);
        }, {
            scope: 'public_profile, email'
        });
    }
</script>

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
<script type="text/javascript" src="http://st.mix166.com/html/js/lib.js"></script>
<script type="text/javascript" src="http://st.mix166.com/html/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://st.mix166.com/html/plugins/slick/slick.min.js"></script>
<script type="text/javascript" src="http://st.mix166.com/html/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://st.mix166.com/html/js/start.js?v=1494145966"></script>
<script type="text/javascript" src="http://st.mix166.com/html/js/function.js?v=1494145966"></script>
<script>
    $(document).ready(function () {
        $("body").append(jQuery("<div><dt/><dd/></div>").attr("id", "progress"));
        $("#progress").width(100 + "%");
        $("#progress").width("101%").delay(800).fadeOut(400, function () {
            $(this).remove();
        });
    });
</script>



<div id="fb-root" class=" fb_reset">
    <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
        <div></div>
    </div>
    <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
        <div>
            <iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true"
                    scrolling="no" id="fb_xdm_frame_http" aria-hidden="true"
                    title="Facebook Cross Domain Communication Frame" tabindex="-1"
                    src="http://staticxx.facebook.com/connect/xd_arbiter/r/87XNE1PC38r.js?version=42#channel=f1c251582d12c&amp;origin=http%3A%2F%2Fmix166.com"
                    style="border: none;"></iframe>
            <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true"
                    scrolling="no" id="fb_xdm_frame_https" aria-hidden="true"
                    title="Facebook Cross Domain Communication Frame" tabindex="-1"
                    src="https://staticxx.facebook.com/connect/xd_arbiter/r/87XNE1PC38r.js?version=42#channel=f1c251582d12c&amp;origin=http%3A%2F%2Fmix166.com"
                    style="border: none;"></iframe>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $("#link_search_tl").click(function () {
            $("#navbar > ul").css({
                "opacity": "0",
            });
            $("#search_tl").fadeIn();
        });

        $("#close_search_tl").click(function () {
            $("#navbar > ul").css({
                "opacity": "1",
            });
            $("#search_tl").fadeOut();
        });

        var isMobile = {
            Android: function () {
                return navigator.userAgent.match(/Android/i);
            },
            iOS: function () {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            }
        };

        if (!sessionStorage.getItem('app_mobile')) {
            if (isMobile.Android()) {
                var a = '<div class="app-mobile"><div id="android" class="app-mobile-block"><a onclick="clickCounter()" href="#" class="link-close">x</a><span class="a-icon"></span><div class="a-info"><strong>Mix166 - Listen to EDM &amp; Mixset</strong><span>FPT Telecom</span><span>Top Free in Music &amp; Audio</span></div><a target="_blank" href="https://play.google.com/store/apps/details?id=com.bda.mix166" class="link-view">view</a></div></div>';
                $('body').prepend(a);
            } else if (isMobile.iOS()) {
                var i = '<div class="app-mobile"><div id="ios" class="app-mobile-block"><a href="#" class="link-close">x</a><span class="a-icon"></span><div class="a-info"><strong>Mix166 - Listen to EDM &amp; Mixset</strong><span>FPT Telecom</span><span>Top Free in Music &amp; Audio</span></div><a target="_blank" href="https://itunes.apple.com/us/app/id1049233270?mt=8" class="link-view">view</a></div></div>';
                $('body').prepend(i);
            }
            $('.link-close, .link-view').click(function () {
                $('.app-mobile').remove();
                sessionStorage.setItem('app_mobile', '1');
            });
        }

    });
</script>

<!-- Google Tag Manager -->
<noscript>&lt;iframe src="//www.googletagmanager.com/ns.html?id=GTM-WK2Z3D"
    height="0" width="0" style="display:none;visibility:hidden"&gt;&lt;/iframe&gt;
</noscript>

<!-- End Google Tag Manager -->

</div>
</body>
</html>