$(document).ready(function () {
const options = $('.mout-cliens-more-actions');
const clients = $('.test');

clients.hide();

    options.click(function () {
        let index = $(this).attr('data-target');
        console.log($(this).find('div'));
        console.log($(this));
        $(this).find('div').toggle();
    });
});
