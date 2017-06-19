$(document).ready(function() {
  $('.slider-producer').slick({
    centerMode: true,
    centerPadding: '100px',
    slidesToShow: 7,
    responsive: [
         {
        breakpoint: 1440,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 7
        }
      },

        {
        breakpoint: 1366,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 7
        }
      },

       {
        breakpoint: 1199,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 5
        }
      },

      {
        breakpoint: 992,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 4
        }
      },

      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '100px',
          slidesToShow: 1
        }
      }
    ]
  });

  $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 195) {
          $(".navbar").addClass("active");
          $("#page").css("margin-top","100px");
      }
      else {
          $(".navbar").removeClass("active");
          $("#page").css("margin-top","0px");
      }
  });

  $(document).on('click', function(e) {
    var elem = $(e.target).closest('#user-login'),
        box  = $(e.target).closest('.list-action');
    if ( elem.length ) {
        $('.list-action').toggle();
    }else if (!box.length){
        $('.list-action').hide();
    }
  });


  $('.view-long button').click(function(){
    $('.row-2').slideToggle( "slow" );
	 $(this).text(function(i, v){
	   return v === 'XEM THÊM' ? 'THU GỌN' : 'XEM THÊM'
	})
  })

  $('.btn-apply-1').click(function () {
    $(this).parent().parent().parent().addClass('selected');
  });

  $('.panel-action .btn-apply').click(function () {
    $(this).parent().parent().parent().parent().addClass('selected');
  });

  $('.menu-bar .btn-reset').click(function(){
    $('.list-menu-bar > li').removeClass('selected');
  });

  $('#slide-banner').slick({
    autoplay: true,
    dots: true,
    fade: true,
    cssEase: 'linear',
    speed: 700
  });

  setTimeout(function explode(){
      $('#slide-banner').css('opacity','1');
  }, 1000)

  $('#slide-dj').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 5,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
  ]
  });

  $('.list-menu-bar > li > a').click(function(e){
    $(".list-menu-bar .sub-menu").removeAttr('style');
      if($(this).parent().hasClass('active')){
        $(this).parent().parent().find('li').removeClass('active')
      }
      else {
    $(this).parent().parent().find('li').removeClass('active')
    $(this).parent().addClass('active')
      }
    });


   $('.container').click(function (e)
   {
    var container = $(".list-menu-bar>li.active");
    var containercon=$(".list-menu-bar>li>div");
    var containerss = $(".list-menu-bar .sub-menu");
    if (!container.is(e.target)
     && container.has(e.target).length === 0 && !containercon.is(e.target))
    {
     $(".list-menu-bar li").parent().parent().find('li').removeClass('active')
     // containerss.attr('style', 'display: none !important;')
    }
   });


    if ($('.datepicker-start').length > 0) {
        $('.datepicker-start').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    }

    if ($('.birthday-artist').length > 0) {
        $('.birthday-artist').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    }

    if ($('.datepicker-end').length > 0) {
        $('.datepicker-end').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    }

    $('.datepicker-start').click(function (){
       var val = $('.datepicker-start').val();
       if(val!=''){
        $('#release-date').css('display','block');
       }
    });

    $('#release-date').mouseover(function(){
      $('#release-date').css('display','block');
    }).mouseout(function(e){
      $('#release-date').css('display','none');
    });

    if ($('.timerpicker').length > 0) {
        $('.timerpicker').datetimepicker({});
    }

    $('.profile-artist .btn-favorite').click(function() {
      $(this).addClass('btn-selected');
    });

    $("#my-link").keyup(function(){
          var value = $(this).val();
          $('.link').text(value);
      });

    // if ($( "#form-edit").length > 0) {
    //     $("#form-edit").validate({
    //         rules: {
    //             full_name: {
    //                 required: true,
    //                 rangelength: [8, 30]
    //             },
    //             my_link: {
    //                 required: true,
    //                 rangelength: [8, 20]
    //             },
    //             email: {
    //                 required: true,
    //                 email: true
    //             },
    //             address: {
    //                 required: true
    //             },
    //             about: {
    //                 required: true
    //             },
    //             gender: {
    //                 required: true
    //             }
    //         }
    //     });
    // }

    $('.input-cb').click(function(){
        if ($(this).is(":checked")) {
            $(this).parent().css('color','#bf0610');
        }
        else if ($(this).is(":not(:checked)")) {
            $(this).parent().css('color','#aeaeae');
        }
    })
});




