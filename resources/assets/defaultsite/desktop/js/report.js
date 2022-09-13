//datatoggle
$('[data-toggle-open]').on('click', function(e) {
    var targeted = $(this).attr('data-toggle-open');
    $(this).toggleClass('collapsed');
    $('.grecaptcha-badge').css("visibility", "visible");
    if ($(this).hasClass('collapsed')) {
        $('body').addClass('overflow-hidden')
        $('[data-toggle="' + targeted + '"]').addClass('open');
    } else {
        $('body').removeClass('overflow-hidden')
        $('[data-toggle="' + targeted + '"]').removeClass('open');
    };
    e.preventDefault();
});
$('[data-toggle-close]').on('click', function(e) {
    var targeted = $(this).attr('data-toggle-close');
    $('[data-toggle-open="' + targeted + '"]').trigger('click');
    $('.grecaptcha-badge').css("visibility", "hidden");

    e.preventDefault();
});

$('#form-report').submit(function(e) {
    e.preventDefault();
    $('.modal-form .btn--submit').attr('disabled',true).addClass('btn-disable')
    $('.label-error').html('');
    $('.google-captcha-error').css('display','none');

    $th=this;
    data=$($th).serialize();
    

    // $.getJSON(window.location.origin + "/report?method=token", function (dt) {
        $.ajax({
            url: window.location.origin + "/report?method=report",
            method: "POST",
            // data: data+ "&visitor_id=" + window.ahoy.visitorId +"&_token=" + dt.token,
            data: data+ "&visitor_id=" + window.ahoy.visitorId ,
            success: function (res) {
                if (res.status=='success') {
                    $($th).closest('.modal-form').addClass('hidden')
                    $('.modal-alert').removeClass('hidden')
                    $('.grecaptcha-badge').css("visibility", "hidden");
                } else{
                    return res;
                }
                $('.modal-form .btn--submit').attr('disabled',false).removeClass('btn-disable')
                return null;
            },
            error: function (err) {
                $.each(err.responseJSON.errors, function (key, value) {
                    if(key=="g-recaptcha-response"){
                        $("#" + key+'-error').html('Laporan gagal terkirim');
                        $('.google-captcha-error').css('display','block');
                    }else{
                        $("#" + key+'-error').html(value[0]);
                    }
                });
                $('.modal-form .btn--submit').attr('disabled',false).removeClass('btn-disable')
            },
        });
    // })
    
});

$('#form-contact-us').submit(function(e) {
    e.preventDefault();
    $('.modal-form .btn--submit').attr('disabled',true).addClass('btn-disable')
    $('.label-error').html('');
    $('.google-captcha-error').css('display','none');

    $th=this;
    data=$($th).serialize();
    
    $.ajax({
        url: window.location.origin + "/report?method=report",
        method: "POST",
        data: data+ "&visitor_id=" + window.ahoy.visitorId ,
        success: function (res) {
            if (res.status=='success') {
                $($th).closest('.modal-form').addClass('hidden')
                $('.modal-alert').slideDown()

                setTimeout(function () {
                    location.reload()
                }, 1000)
            } else{
                return res;
            }

            $('.modal-form .btn--submit').attr('disabled',false).removeClass('btn-disable')
            return null;
        },
        error: function (err) {
            $.each(err.responseJSON.errors, function (key, value) {
                if(key=="g-recaptcha-response"){
                    $("#" + key+'-error').html('Pesan gagal terkirim');
                    $('.google-captcha-error').css('display','block');
                }else{
                    $("#" + key+'-error').html(value[0]);
                }
            });
            $('.modal-form .btn--submit').attr('disabled',false).removeClass('btn-disable')
        },
    });
});