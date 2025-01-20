$(document).ready(function () {
    $("#tab nav span").click(function () {
        const id = $(this).data('id');
        if (!$(this).hasClass('active')) {
            $("#tab nav span").removeClass('active');
            $(this).addClass('active');

            $('.tab-content').hide();
            $(`[data-content=${id}]`).fadeIn();
        }
    });
});