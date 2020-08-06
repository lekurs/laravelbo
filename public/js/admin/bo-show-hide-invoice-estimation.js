$(document).ready(function () {
    const estimation = $('.mout-client-card-right-informations-container#estimations');
    const invoice = $('.mout-client-card-right-informations-container#invoices');
    const estimationTable = $('#estimation-table-container');
    const invoiceTable = $('#invoice-table-container');

    $(estimation).click(function () {
        if ($(invoiceTable).hasClass('active')) {
            $(invoiceTable).removeClass('active');
        }

        $(estimationTable).toggleClass('active');
    })

    $(invoice).click(function () {
        if($(estimationTable).hasClass('active')) {
            $(estimationTable).removeClass('active');
        }
        $(invoiceTable).toggleClass('active');
    });
});
