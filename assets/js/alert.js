function dialog(bg, msg) { 
    $('#div-alert').show().removeClass('animate__fadeOutUp') .addClass(bg + ' animate__fadeInDown');
    $('#alert-msg').text(msg);

    setTimeout(() => {
        $('#div-alert').removeClass('animate__fadeInDown').addClass('animate__fadeOutUp');
    }, 3000); 

    $.ajax({
        url: '?rq=unset_alert_session'
    }); 
}
