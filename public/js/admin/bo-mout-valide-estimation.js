$(document).ready(function () {

    const elt = $('span.slider.round');

    elt.click(function () {
        let id = $(this).attr('data-id');

        $.ajax({
            url: '/admin/devis/'+id+'/validation',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function (data) {
                if (data) {
                    $('div#estimation-action-3').addClass('estimation-action-active');
                } else {
                    $('div#estimation-action-3').removeClass('estimation-action-active');
                }
        }).fail(function (data) {
            console.log(data + 'test ?');
        });
    });
});
