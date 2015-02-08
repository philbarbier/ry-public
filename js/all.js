$(document).ready(function() {
    $('.submission_container').click(function(e) {
        var id = $(this).data('id');
        console.log('viewing ' + id);
        console.log(submissions[id]);
        $('.modal_image_container img').attr('src', submissions[id].files[0].fullpath); 
        $('.modal_submission_title').text(submissions[id].title);
        $('.modal_submission_artist').text(submissions[id].firstname + ' ' + submissions[id].lastname + ' - ' + submissions[id].school);
        $('.modal_submission_text').text(submissions[id].biotext);
        $('.modal_container').show();
    });

    $('.modal_close_button_container').click(function(e) {
        $('.modal_container').hide();
        $('.modal_image_container img').attr('src','');
        $('.modal_submission_title').text('');
        $('.modal_submission_artist').text('');
        $('.modal_submission_text').text('');
    });

    $('.login_to_vote').click(function(e) {
        $('.login_modal_container').show();
    });

    $('.login_modal_header').click(function(e) {
        $('.login_modal_container').hide();
    });
});
