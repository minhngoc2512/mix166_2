function ajax_loading(flag) {
    if ($("#bg-load").length == 0) {
        $('body').append('<div id="bg-load"><div class="loader"></div></div>');
    }

    if (flag) {
        $("#bg-load").show();
    } else {
        $("#bg-load").hide();
    }
}

$(document).ready(function() {

    $('.modal_music_buy').click(function () {
        var that=this;
        var object_id=$(that).data('object-id');
        var image_url=$(that).data('image-url');
        var price=$(that).data('price');
        $('.modal #poup-image').html('<span class="bgi" style="background-image: url('+image_url+')"></span>');
        $('#data-object').val(object_id);
        $('.price span').html(price);
        $('#modal_music_buy').modal('show');
    });
    $('.btn-addd-cart').click(function () {
        var object_id =$('#data-object').val();
        var url='/cart/add';
        $.ajax({
            method:"post",
            url:url,
            data:{
                object_id:object_id
            },
            dataType:"JSON",
            success:function (res) {
                if(res.success ==1 ){
                    $('.cart-num strong').html(res.toltalQuanty);
                    $('#modal_music_buy').modal('hide');
                    $('.total-price').html(res.toltalPrice);
                }
            }
        });
    });
    $('.remove').on('click',function (event) {
        event.preventDefault();
        var that=this;
        var song_id = $(that).data('song-id');
        var url='/cart/remove';
        $.ajax({
            method:"post",
            url:url,
            data:{
                song_id:song_id
            },
            dataType:"JSON",
            success:function (res) {
                if(res.success == 1 ){
                    $('.cart-num strong').html(res.toltalQuanty);
                    $('.sub-total').html("Subtotal ("+res.toltalQuanty+" items):");
                    $('.total-price').html(res.toltalPrice+ " VNĐ");
                    that.closest('tr').remove();
                }
            }
        });
    });
    $('.btn-addd-buy').on('click',function (event) {
        event.preventDefault();
        window.location.href="/cart";
    });
    $('.btn-checkout').on('click',function (event) {
        event.preventDefault();
        window.location.href='/cart/payment';
    });
    $('.local .sr-only').on('click',function (event) {
        event.preventDefault();
        window.location.href='/cart/local';
    });
    $('.visa .sr-only').on('click',function (event) {
        event.preventDefault();
        window.location.href='/cart/visa';
    });

    
    if ($( "#frmLogin").length > 0) {
        $("#frmLogin").validate({
            errorElement: "div",
            errorClass: 'error-message',
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6,
                    required: true
                }
            },
            messages: {
                email: {
                    email: "Your email address must be in the format of name@domain.com"
                },
                password: {
                    minlength: "Incorrect password"
                }
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'You missed 1 field. It has been highlighted'
                        : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.warning-login").show();
                    $("div.error-message").show();
                } else {
                    $("div.warning-login").hide();
                    $("div.error-message").hide();
                }
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                //ajax_loading(true);
                var data = $(form).serialize();
                $.post( "/auth/loginv2", data, function( rs ) {
                    $('#logNoti').text(rs.error).show();
                    if(rs.status == 1){
                        setTimeout(function(){ location.reload() }, 1500);
                    }
                }, "json");

                return false;
            }
        });
    }

    if ($("#frmRegister").length > 0) {
        $("#frmRegister").validate({
            errorElement: "div",
            errorClass: 'error-message',
            rules: {
                email: {
                    required: true,
                    email: true
                },
                name: {
                    required: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                re_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#reg_password"
                }
            },
            messages: {
                email: {
                    email: "Your email address must be in the format of name@domain.com"
                },
                password: {
                    minlength: "Password is too short or long"
                }
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'You missed 1 field. It has been highlighted'
                        : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error-message").show();
                } else {
                    $("div.error-message").hide();
                }
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                //ajax_loading(true);
                var data = $(form).serialize();
                $.post( "/auth/registerv2", data, function( rs ) {
                    $('#regNoti').text(rs.error).show();
                    if(rs.status == 1){
                        setTimeout(function(){ location.reload() }, 1500);
                    }
                }, "json");

                return false;
            }
        });
    }
    if ($("#resetPassword").length > 0) {
        $("#resetPassword").validate({
            errorElement: "div",
            errorClass: 'error-message',
            rules: {
                password: {
                    required: true,
                    minlength: 6
                }
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'You missed 1 field. It has been highlighted'
                        : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error-message").show();
                } else {
                    $("div.error-message").hide();
                }
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                //ajax_loading(true);
                var data = $(form).serialize();
                $.post( "/auth/updatePassword", data, function( rs ) {
                    $('#resetNoti').text(rs.error).show();
                    if(rs.status == 1){
                        setTimeout(function(){ window.location.href = "/"; }, 1500);
                    }
                }, "json");

                return false;
            }
        });
    }
    if ($("#frmForget").length > 0) {
        $("#frmForget").validate({
            errorElement: "div",
            errorClass: 'error-message',
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    email: "Your email address must be in the format of name@domain.com"
                }
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'You missed 1 field. It has been highlighted'
                        : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error-message").show();
                } else {
                    $("div.error-message").hide();
                }
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                //ajax_loading(true);
                var data = $(form).serialize();
                $.post( "/auth/forgetPassword", data, function( rs ) {
                    $('#forgetNoti').text(rs.error).show();
                }, "json");

                return false;
            }
        });
    }

    $("#search_input_text").keyup(function() {

        var bla = $("#search_input_text").val();

        if (bla.length > 2) {
            $("body").addClass("search-fix");
            $("#search_block").show();
            $("#search_block .search-results h1").text(bla);

            $.get( "/search/suggest", { q: bla } )
                .done(function( data ) {
                    $("#search_block .search-results .row").html( data );
                });
        } else {
            $("body").removeClass("search-fix");
            $("#search_block").hide();
        }

    });

    $("#search_input_text1").keyup(function() {

        var bla = $("#search_input_text1").val();
  
        if (bla.length > 2) {
            $("body").addClass("search-fix");
            $("#search_block").show();
            $("#search_block .search-results h1").text(bla);

            $.get( "/search/suggest", { q: bla } )
                .done(function( data ) {
                    $("#search_block .search-results .row").html( data );
                });
        } else {
            $("body").removeClass("search-fix");
            $("#search_block").hide();
        }

    });

    $(".search .exit").click(function() {
        $("#search_block").stop().hide();
        $("#search_input_text").val("");
        $("body").removeClass("search-fix");
    });
});

initPaginationNews();

// Ajax Load More 
$(document).on("click", "a.is-load-ajax", function(e) {

	var url 		 = $(this).attr('href');
	var idContent    = $(this).attr('data-id-content');
	var page 		 = $(this).attr('page');

	if(page)
	{
		url = url + "&page="+ page;
	}
	else
		url = url;

	var object = $(this);
	
	$.ajax({
		url: url,
		type: 'get',
		success: function(html){
			$(idContent).append(html);

			$(object).attr('page', parseInt(page) + 1);
		},
		error:function(){
		}
	});

	return false;
});

function updateUrlParameter(key, value, url){
    if (!url) url = window.location.href;
    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
        hash;

    if (re.test(url)) {
        if (typeof value !== 'undefined' && value !== null)
            return url.replace(re, '$1' + key + "=" + value + '$2$3');
        else {
            hash = url.split('#');
            url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
            if (typeof hash[1] !== 'undefined' && hash[1] !== null)
                url += '#' + hash[1];
            return url;
        }
    }
    else {
        if (typeof value !== 'undefined' && value !== null) {
            var separator = url.indexOf('?') !== -1 ? '&' : '?';
            hash = url.split('#');
            url = hash[0] + separator + key + '=' + value;
            if (typeof hash[1] !== 'undefined' && hash[1] !== null)
                url += '#' + hash[1];
            return url;
        }
        else
            return url;
    }
}


function toggleCheckbox(obj, id){
    
    $(obj).attr('checked');
    
    var isCheck = $(obj).is(":checked");
    var val = $(obj).val();
    if(isCheck){
        
        if($('#'+id).val() == '')
        {
            $('#'+id).val(obj.value);
        }else{
            $('#'+id).val($('#'+id).val()+','+obj.value);
        }
    }else{
        var arr = $('#'+id).val().split(",");
        var kq = [];
        $.each(arr, function (index, value) {
            if(val != value){
                kq.push(value);
            }
        });
        $('#'+id).val(kq);

    }

}

function onchangeObject(obj, id){
    $('#'+id).val(obj.value);
    
}

function request() {

    $( "#request" ).submit();
};

$( "#request" ).submit(function() {

    $.each( $( this ).serializeArray(), function( i, field ) {
        if (field.value=='') {
            $('#'+field.name).removeAttr('name');
        }
    });
});

function shareLink(obj){
    var link = $(obj).attr("data-link-share");

    var id = $(obj).attr("data-object-id");
    var type = $(obj).attr("data-object-type");
    var url = '/index/active?object_id='+id+'&object_type='+type;
    $.ajax({
        url: url,
        type: 'get',
        success: function(html){
            
        },
        error:function(){
        }
    });


    var linkFacebook = "https://www.facebook.com/sharer/sharer.php?u="+link;
    var linkTwitter  = "http://www.twitter.com/share?url="+link;
    var linkGoogle   = "https://plus.google.com/share?url="+link;
    

    $('#facebookShare').attr('href', linkFacebook);
    //$('#facebookShare').attr('onclick', linkFacebook);

    $('#googleShare').attr('href', linkGoogle);
    //$('#googleShare').attr('onclick', linkGoogle);

    $('#twitterShare').attr('href', linkTwitter);

    $('#link-share').val(link);
    $('#song_share').modal('show');
};

$('.popup').click(function(event) {
    event.preventDefault();
    window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=yes");
});

function getTime(obj, type){
    var currdate = new Date();
    var date_begin= currdate.getFullYear() +'-'+ (currdate.getMonth()+ 1) + '-' + currdate.getDate();
    if(type == 0){
        currdate.setDate(currdate.getDate() - 0);
        var date_end= currdate.getFullYear() +'-'+ (currdate.getMonth()+ 1) + '-' + currdate.getDate();
    }else if(type == 1){
        currdate.setDate(currdate.getDate() - 1);
        var date_end= currdate.getFullYear() +'-'+ (currdate.getMonth()+ 1) + '-' + currdate.getDate();
    }else if(type == 7){
        currdate.setDate(currdate.getDate() - 7);
        var date_end= currdate.getFullYear() +'-'+ (currdate.getMonth()+ 1) + '-' + currdate.getDate();
    }else if(type == 30){
        currdate.setDate(currdate.getDate() - 30);
        var date_end= currdate.getFullYear() +'-'+ (currdate.getMonth()+ 1) + '-' + currdate.getDate();
    }
    
     
    $('.datepicker-start').val(date_end);
    $('.datepicker-end').val(date_begin);
}

function initPaginationNews() {
    if ($('ul#pagination').length > 0) {
        $('ul#pagination').bootstrapPaginator({
            bootstrapMajorVersion: 3,
            currentPage: $('ul#pagination').attr('data-current'),
            totalPages: $('ul#pagination').attr('data-total'),
            onPageClicked: function (e, originalEvent, type, page) {
                var url = updateUrlParameter('page', page);
                $('#trigger-pagination').attr('href', url);
                window.location.href = url;
                $("#trigger-pagination").trigger("click");
            },
            shouldShowPage:function(type, page, current){
                switch(type)
                {
                    case "first":
                    case "last":
                        return false;
                    case "prev":
                        if (current==1) return false;
                        return true;
                    case "next":
                        if (current==$('ul#pagination').attr('data-total')) return false;
                        return true;
                    default:
                        return true;
                }
            },
            itemContainerClass: function (type, page, current) {
                return (page === current) ? "active" : "";
            },
            itemTexts: function (type, page, current) {
                switch (type) {
                    case "prev":
                        return '<i class="flaticon-interface-1"></i>';
                    case "next":
                        return '<i class="flaticon-arrows-7"></i>';
                    case "page":
                        return page;
                }
            }
        });
    }
}

function malert(msg, title, callback, sbcallback) {
    title = title || 'Massenger';
    callback = callback || function (e) {};

    if ($("#modal_alert").attr('id') != 'modal_alert') {
        var html = ''+
        '<div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
            '<div class="modal-dialog" role="document">' +
                '<div class="modal-content modal-share-music">' +
                    '<div class="modal-header">' +
                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '<h4 class="modal-title" id="myModalLabel">Massenger</h4>' +
                    '</div>' +
                    '<div class="modal-body">' +
                        '<p>Thành công!</p>' +
                    '</div>' +
                    '<div class="modal-footer">' +
                        '<button type="button" class="btn btn-success">OK</button>' +
                        '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>';

        $( "body" ).append(html);
    }

    $("#modal_alert .btn-success").unbind( "click" );
    if (sbcallback) {
        $("#modal_alert .modal-footer").show();
        $("#modal_alert .btn-success").bind( "click", sbcallback );
    } else {
        $("#modal_alert .modal-footer").hide();
    }

    $("#myModalLabel").html(title);
    $(".modal-body").html('<p>'+msg+'</p>');

    $('#modal_alert').modal('show');
    $('#modal_alert').on('hidden.bs.modal', callback);
}


function editProfile(obj){

    $("#form-edit").validate({
        // Specify the validation rules
        rules: {
            full_name: {
                required: true
            },
            my_link: {
                required: true
            },
            email: {
                required: true
            },
            address: {
                required: true
            },
            about: {
                required: true
            }
        },
        ////SelectName: { valueNotEquals: "" }
        // Specify the validation error messages
        messages: {
            full_name: {
                required: "Not null"
            },
            my_link: {
                required: "Not null"
            },
            email: {
                required: "Not null"
            },
            address: {
                required: "Not null"
            },
            about: {
                required: "Not null"
            }
        },
        submitHandler: function(form) {
                var url = '/profile/edit-ajax';
                var data = $("#form-edit").serialize();

                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    success: function(rs){
                      if(rs == 1) {
                        malert("Your information was saved");
                        var delay=1000; //1 second

                        setTimeout(function() {
                            window.location.href = '/profile';
                        }, delay);
                        
                      }
                    },error: function() {
                    malert("");
                    }
        });
    }

    });
}



function active(obj){

	var user_id =  $(obj).attr("data-user"); 
	var object_id =  $(obj).attr("data-id");
	var object_type =  $(obj).attr("data-type"); 
	var action_type =  $(obj).attr("data-action"); 
	var position = $(obj).attr("data-position"); 
	
	var url = '/profile/active?user_id='+user_id+'&object_id='+object_id+'&object_type='+object_type+'&action_type='+action_type; 
	$.ajax({
		url: url,
		type: 'post',
		success: function(rs){
			
			if(position == "normal")
			{
				var likeCount = $('#like-count').html();
				
				likeCount = parseInt(likeCount);
				
				if(rs == 1)
				{
					likeCount += 1;
					
					if(object_type == "edm_artist")
					{
						$(obj).html('<i class="glyph-icon flaticon-favorite"></i> Favorited');
						
						if($(obj).hasClass('btn-selected') == false)
						{
							$(obj).addClass('btn-selected');
						}
					}
					else
					{
						$(obj).html('<i class="glyph-icon flaticon-favorite"></i> Liked');
					}
					
					$(obj).attr("data-action","unlike");
				}
				else
				{
					if(rs == 2)
					{	
						likeCount -= 1;
						
						if(object_type == "edm_artist")
						{
							$(obj).html('<i class="glyph-icon flaticon-favorite"></i> Favorite');
							
							if($(obj).hasClass('btn-selected') == true)
							{
								$(obj).removeClass('btn-selected');
							}
						}
						else
						{
							$(obj).html('<i class="glyph-icon flaticon-favorite"></i> Like');
						}
						
						$(obj).attr("data-action","like");
					}
				}
				
				if(likeCount < 0)
				{
					likeCount = 0;
				}
				
				$('#like-count').html(likeCount);
			}
			else
			{
				var likeCountArtist = $('#like-count-artist').html();
				likeCountArtist = parseInt(likeCountArtist);
				
				if(rs == 1)
				{
					likeCountArtist += 1;
					
					$(obj).html('<i class="glyph-icon flaticon-favorite"></i> Favorited');
					
					if($(obj).hasClass('btn-selected') == false)
					{
						$(obj).addClass('btn-selected');
					}
					
					$(obj).attr("data-action","unlike");
				}
				else
				{
					if(rs == 2)
					{	
						likeCountArtist -= 1;
						
						$(obj).html('<i class="glyph-icon flaticon-favorite"></i> Favorite');
						
						if($(obj).hasClass('btn-selected') == true)
						{
							$(obj).removeClass('btn-selected');
						}
						
						$(obj).attr("data-action","like");
					}
				}
				
				if(likeCountArtist < 0)
				{
					likeCountArtist = 0;
				}
				
				$('#like-count-artist').html(likeCountArtist);
			}
		},
		error:function(){
		}
	});

	return false;
}


function editArtist(obj){

    $("#form-artist").validate({
        // Specify the validation rules
        rules: {
            artist_alias: {
                required: true
            },
            biography: {
                required: true
            },
            location_cover: {
                required: true
            },
            location: {
                required: true
            },
            birthday: {
                required: true
            }
        },
        ////SelectName: { valueNotEquals: "" }
        // Specify the validation error messages
        messages: {
            artist_alias: {
                required: "Not null"
            },
            biography: {
                required: "Not null"
            },
            location_cover: {
                required: "Not null"
            },
            location: {
                required: "Not null"
            },
            birthday: {
                required: "Not null"
            }
        },
        submitHandler: function(form) {
                var url = '/profile/edit-artist-ajax';
                var data = $("#form-artist").serialize();

                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    success: function(rs){
                      if(rs == 1) {
                        malert("Your information was saved");
                        var delay=1000; //1 second

                        setTimeout(function() {
                            window.location.href = '/profile/my-artist';
                        }, delay);
                        
                      }
                    },error: function() {
                    malert("");
                    }
        });
    }

    });
}