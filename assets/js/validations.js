$('.only_letter').on('input', function() {
    let value = $(this).val();
    let onlyLetters = value.replace(/[^a-z]/gi, ''); 
    $(this).val(onlyLetters);
});