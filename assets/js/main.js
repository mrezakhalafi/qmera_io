/*!
 * QMERA
 * Copyright © 2021 Purplepatch Services LLC. 
 */
$(window).on('load', function() {
    $("body").removeClass("qmera-init");
});
$('.overlay').on('click', function() {
    $('.chkboxqmera').prop('checked', false);
});

var $carousel = $('#hero');
$carousel.bind('slide.bs.carousel', function(e) {
    if (e.to === 0) {
        $('.bg-hero2').removeClass('active');
        $('.bgitem1').addClass('active');
    } else if (e.to === 1) {
        $('.bg-hero2').removeClass('active');
        $('.bgitem2').addClass('active');
    } else if (e.to === 2) {
        $('.bg-hero2').removeClass('active');
        $('.bgitem3').addClass('active');
    }
});

AOS.init();
$('document').ready(function() {
    if ($(".productbanner-imgwrap")[0]) {
        setTimeout(function() {
            $('.productbanner-imgwrap ul li').addClass('active');
        }, 2000);
    }
});

function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/';
    } else {
        var url = location.origin;
    }
    return url;
}
// $('.starttrial').click(function() {
//     $(this).attr('disabled', 'disabled');
//     var emailtrial = $("input[name='emailtrial']");
//     $('.trial-preload').html('<div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div>');



//     if (emailtrial.val().length === 0) {
//         setTimeout(function() {
//             $('.starttrial').removeAttr('disabled');
//             $('.trial-preload').html('');
//             $('.qmera-trialresponse').html('<div class="qmera-errtrialmsg">One or more fields have an error. Please check and try again.</div>');
//         }, 1000);
//     } else {
//         $.ajax({
//             url: 'sendmail.php',
//             method: 'POST',
//             dataType: 'json',
//             data: {
//                 emailtrial: emailtrial.val()
//             },
//             success: function(output) {
//                 $('.starttrial').removeAttr('disabled');
//                 $('.trial-preload').html('');
//                 if (output.status === '0') {
//                     $('.qmera-trialresponse').html('<div class="qmera-errtrialmsg">' + output.response + '</div>');
//                 } else {
//                     emailtrial.val('');
//                     $('.qmera-trialresponse').html('<div class="qmera-successtrialmsg">' + output.response + '</div>');
//                 }
//             },
//             error: function(xhr, ajaxOptions, thrownError) {
//                 $('.starttrial').removeAttr('disabled');
//                 $('.trial-preload').html('');
//                 $('.qmera-trialresponse').html('<div class="qmera-errtrialmsg">' + thrownError + '</div>');
//             }
//         });
//     }
// });
$('.qmera-submit').click(function() {
    var firstname = $("input[name='firstname']");
    var lastname = $("input[name='lastname']");
    var email = $("input[name='emailadd']");
    var message = $("textarea[name='message']");
    var txtbtn = $(this).html();
    $(this).html('Sending...').attr('disabled', 'disabled');
    $('.send-preload').html('<div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div>');

    if (isNotEmpty(firstname) && isNotEmpty(lastname) && isNotEmpty(email)) {

        $.ajax({
            url: 'sendmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
                firstname: firstname.val(),
                lastname: lastname.val(),
                email: email.val(),
                message: message.val()
            },
            success: function(output) {
                $('.send-preload').html('');
                $('.qmera-submit').html(txtbtn).removeAttr('disabled');

                console.log(output);
                if (output.status === '0') {
                    //$('.msgsent-text').html('<span class="errormsg">'+output.response+'</span>');
                    $('.msgsent-text').html('<div class="alert alert-danger d-flex align-items-center" role="alert"> <div style="padding-right:14px;"><i class="fas fa-exclamation-triangle"></i></div> <div> ' + output.response + ' </div> </div>');
                } else {
                    $('#qmera-contactform')[0].reset();
                    $('.qmera-contactfield').html('<div class="qmsg-resp">' + output.response + '<div class="pt-4"><a href="' + base_url() + '" class="qbtn qbtn-orange">Home</a></div></div>');
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('.msgsent-text').html('<div class="alert alert-danger d-flex align-items-center" role="alert"> <div style="padding-right:14px;"><i class="fas fa-exclamation-triangle"></i></div> <div> ' + thrownError + ' </div> </div>');
                $('.send-preload').html('');
                $('.qmera-submit').html(txtbtn).removeAttr('disabled');
            }
        });
    } else {
        $('.send-preload').html('');
        $('.qmera-submit').html(txtbtn).removeAttr('disabled');

    }

});

function isNotEmpty(caller) {
    if (caller.val().length === 0) {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}