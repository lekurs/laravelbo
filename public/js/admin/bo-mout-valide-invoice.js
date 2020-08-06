$(document).ready(function () {

    $('td.mout-invoice-validation').click(function () {
        let id = $(this).attr('data-invoice');
        let elt = $(this);

        $.ajax({
            url: '/admin/facture/'+id+'/validation',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function (data) {
            elt.closest('tr').remove();
            $('span#total-encours').html(data);
        }).fail(function (data) {

        });
    });
});
