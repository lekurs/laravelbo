(function ($) {
    const edit = $('.mout-contact-informations');

    let o = {
        auto: true,
        script: '',
    }

    $.fn.updateJob = function (oo) {
        if (oo) {
            $.extend(o, oo); //merge les options
        }
    }

    $(edit).click(function () {
        let job = $(this).attr('data-slug');
        console.log($(this))

        $.post( o.script, {slug: job}, function(data){
            let elt = $('.mout-edit-navigation-content');
            const cancel = ('.btn-cancel')

            elt.html(data);
            elt.addClass('showNav');

            $(cancel).click(function () {
                elt.removeClass('showNav');
            })

        });
    });
})(jQuery);
