$( function() {
    $("ul.drag-nav").sortable({
        sort: function (event, ui) {
            currentLeft = parseInt(ui.item.css('left'));
            ui.item.addClass("selected-item-sortable");
        },
        stop: function (event, ui) {
            let elt = $(".selected-item-sortable");
            let parent = elt.prev();
            let parentPosition = parseInt(parent.css("margin-left"));
            let decallage = parentPosition + 30;
            if (currentLeft <= parentPosition) {
                if ((parentPosition - 30) <= 0) {
                    marginLeft = parentPosition;
                } else {
                    marginLeft = (parentPosition - 30);
                }
                elt.css("margin-left", marginLeft + "px");
            } else if (currentLeft >= decallage) {
                elt.css("margin-left", parentPosition + 30 + "px");
            } else {
                elt.css("margin-left", parentPosition + "px");
            }

            $(elt).removeClass("selected-item-sortable");
        }
    });
});
