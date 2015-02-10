var loggedin, fbdata, id = false;

$(document).ready(function() {
    console.log($.cookie('ryvoter'));
    $('.submission_container').click(function(e) {
        id = $(this).data('id');
        console.log('viewing ' + id);
        console.log(submissions[id]);
        $('.modal_image_container img').attr('src', submissions[id].files[0].fullpath); 
        $('.modal_submission_title').text(submissions[id].title);
        $('.modal_submission_artist').text(submissions[id].firstname + ' ' + submissions[id].lastname + ' - ' + submissions[id].school);
        $('.modal_submission_text').text(submissions[id].biotext);
        if ($.cookie('ryvoter')) {
            $('.modal_vote_button').show();
        }
        $('.modal_container').show();
    });

    $('.modal_close_button_container').click(function(e) {
        $('.modal_container').hide();
        $('.modal_image_container img').attr('src','');
        $('.modal_submission_title').text('');
        $('.modal_submission_artist').text('');
        $('.modal_submission_text').text('');
        id = false;
    });

    $('.modal_vote_button').click(function(e) {
         $.ajax({
            type: "POST",
            url: "/vote",
            data: {
                submission_id: id,
                voter_id: $.cookie('ryvoter') 
            }
        }).done(function(data) {
            if (!data.error) {
                $('model_vote_button').hide();
                $.removeCookie('ryvoter');
                alert('Thank you for your vote!');
            }
        });
       
    });

    $('.login_to_vote').click(function(e) {
        if (typeof($.cookie('ryvoter'))!='undefined' && ($.cookie('ryvoter') > 0)) {
            alert('You are already logged in!');
        } else {
            $('.login_modal_container').show();
        }
    });

    $('.login_modal_header').click(function(e) {
        $('.login_modal_container').hide();
    });

    $('.login_modal_button').click(function(e) {
        if ($('#terms:checked').length == 0) {
            alert('You need to agree to the Terms and Conditions of this contest');
            return;
        }

        var filledin = $('#firstname').val() && $('#lastname').val() && $('#email').val();
        var fname, lname, email, smid = false;
        // if they're not using FB, we need to do some basic validation
        if (loggedin) {
            //
            fname = fbdata.first_name;
            lname = fbdata.last_name;
            email = fbdata.email;
            smid  = fbdata.id;
        } else {
            if (filledin) {
                //
                fname = $('#firstname').val();
                lname = $('#lastname').val();
                email = $('#email').val();
                if (!isValidEmailAddress(email)) {
                    alert('You have entered an invalid e-mail address');
                    return;
                }
                smid = 0;    
            } else {
                alert('You must fill out your name and e-mail to be able to vote');
                return;
            }
        }
       
        $.ajax({
            type: "POST",
            url: "/add-voter",
            data: {
                firstname: fname,
                lastname: lname,
                email: email,
                smid: smid,
                marketing: ($('#marketing:checked').length > 0) ? 1 : 0
            }
        }).done(function(data) {
            if (typeof(data.voter_id) != 'undefined') {
                $.cookie('ryvoter', data.voter_id, {expires:2});
                $('.login_modal_container').hide();
            }
        });
        
    });
});

function isValidEmailAddress(email) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(email);
};

function checkLoginState() {
    if (typeof(FB)!='undefined') {
        FB.getLoginStatus(function(response) {
            if (response.status=="connected") {
                $('.fb_login_container').hide();
                $('.login_modal_fields').hide();
                loggedin = true;
                FB.api('/me', function(data) {
                    console.log(data);
                    fbdata = data;
                });
            } else {
                loggedin = false;
                FB.login(function(){}, {scope: 'public_profile,email,publish_actions'}); 
            }
        });
    }
}
