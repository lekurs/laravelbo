$( function() {
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');

        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    $('.dd').nestable({

    }).on('change', updateOutput);

    // updateOutput($('.dd').data('output', $('#nestable-output')));

    $('.mout-add-menus-button').click(function () {

        $.post('/admin/menus/save', $('#form-navigation').serialize(), function (data) {

        });
    });

});
