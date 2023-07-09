function dialog(bg, msg, dur = 3000) { 
    $('#div-alert').show().removeClass('animate__fadeOutUp').addClass(bg + ' animate__fadeInDown');
    $('#alert-msg').text(msg);

    setTimeout(() => {
        $('#div-alert').removeClass('animate__fadeInDown').addClass('animate__fadeOutUp');
    }, dur); 

    $.ajax({
        url: '?rq=unset_alert_session'
    }); 
}
