$('.btn').on('click', function() {  
    $(this).addClass('focus:ring-2');

    setTimeout(() => {
        $(this).removeClass('focus:ring-2');
    }, 100);
});