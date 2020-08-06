(function ($) {
    const edit = $('.mout-bo-edit-icon');

    let o = {
        auto: true,
        script: '',
    }

    $.fn.updateService = function (oo) {
        if (oo) {
            $.extend(o, oo); //merge les options
        }
    }

    $(edit).click(function () {
        let service = $(this).attr('data-service');

        console.log($(this));

        $.post( o.script, {id: service}, function(data){
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
