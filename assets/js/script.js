$(document).ready(function () {
    $('.js-example-basic-single').select2();
});

$('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});