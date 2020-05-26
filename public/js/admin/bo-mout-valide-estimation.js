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
        });
    });
});
