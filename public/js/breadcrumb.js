$(document).ready(function () {


    $('.first ol li a').click(function () {
        $('.first ol li a.active-1').removeClass('active-1');
        $(this).closest('a').addClass('active-1');
    });



});