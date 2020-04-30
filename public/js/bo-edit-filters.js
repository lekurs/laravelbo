(function ($) {
    const edit = $('.mout-bo-edit-icon');

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
        let job = $(this).parent().attr('data-slug');

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
