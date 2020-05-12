(function ($) {
    const edit = $('.mout-contact-informations');

    let o = {
        auto: true,
        script: '',
    }

    $.fn.updateContact = function (oo) {
        if (oo) {
            $.extend(o, oo); //merge les options
        }
    }

    $(edit).click(function () {
        let job = $(this).attr('data-slug');

        $.post( o.script, {slug: job}, function(data){
            let elt = $('.mout-content-panel');

            elt.append(data);

            let cancel = $('.btn-cancel-edit');

            $('body').on('click', cancel, function () {
                elt.find('.mout-create-navigation-content').removeClass('showNav');
            })

        });
    });
})(jQuery);
