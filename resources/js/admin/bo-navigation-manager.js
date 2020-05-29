(function ($) {
    let o = {
        class: 'nav-manager',
        idSortable : ''
    };

    let elt;

    let navManager = {
        init: function () {
        }
    }

    $.fn.navManager = function (oo) {
        if (oo) {
            $.extend(o, oo);
        }
        // elt = this;

        $('#' + o.idSortable).sortable({
            placeholder: "ui-test",
            change: function (e, ui) {
                //gestion des sous-menus
                ui.item.removeClass('nav-depth')

                if (ui.item.css('left') > 30 + 'px') {
                    console.log('ok')
                    ui.item.addClass('nav-depth');
                }
            },

            update: function (e, ui) {
                let list = $(this);
                let position = 0;


                list.find('li').each(function () {
                    position++;
                    $(this).find('input').val(position);
                });
            }
        });
        $( o.idSortable ).disableSelection();
    };

})(jQuery);
