$(document).ready(function () {
    const cta = $('div.services-icon-container a');

    cta.click(function (e) {
        e.preventDefault();

        $(this).parent().next().find('div.services-description-content').removeClass('active');

        $(this).parent().next().find('#'+ $(this).attr('data-service')).toggleClass('active');
    });
});
