(function ($) {
    const edit = $('.mout-bo-edit-icon');

    let o = {
        auto: true,
        script: '',
    }

    $.fn.updateClient = function (oo) {
        if (oo) {
            $.extend(o, oo); //merge les options
        }
    }

    $(edit).click(function () {
        let client = $(this).parent().attr('data-slug');

        $.post( o.script, {slug: client}, function(data){
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
