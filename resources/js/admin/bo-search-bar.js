(function ($) {
    let o = {
        elt: '',
        minLength: '',
        delay: '',
        color: '#333333',
        background: '#ffffff'
    }

    $.fn.search = function (oo) {
        if (oo) {
            $.extend(o, oo);
        }
    }


})(jQuery)
