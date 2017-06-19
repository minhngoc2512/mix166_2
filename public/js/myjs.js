  $(document).ready(function () {
        $("body").append(jQuery("<div><dt/><dd/></div>").attr("id", "progress"));
        $("#progress").width(100 + "%");
        $("#progress").width("101%").delay(800).fadeOut(400, function () {
            $(this).remove();
        });
    });

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