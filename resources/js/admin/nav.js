$( function() {
    $("ul.drag-nav").sortable({
        placeholder: 'placeholder-list',

        start: function(event, ui) {
            let indexCurrent = ui.item.index();
            let levelCurrent = ui.item.attr("data-level");
            let transporteur = "";

            if(ui.item.find("ul.transport-item").length !== 0){
                transporteur = ui.item.find("ul.transport-item");
            }

            let go = 0;
            let z = 0;
            $(this).find("li:not(.ui-sortable-placeholder)").each(function(i){
                if(i === indexCurrent){
                    go=1;
                }
                else{
                    if(go === 1){
                        lvl = $(this).attr("data-level");
                        if(lvl > levelCurrent){
                            if(transporteur !== ""){
                                z++;
                                transporteur.append($(this));
                            }
                        }else{
                            go= 0;
                        }
                    }
                }
            });
        $('.placeholder-list').css('height', 55*(z+1) + 'px');

        },
        sort: function (event, ui) {
            currentLeft = parseInt(ui.item.css('left'));
            ui.item.addClass("selected-item-sortable");
        },
        stop: function (event, ui) {

            let elt = $(".selected-item-sortable");
            let parent = elt.prev();
            let parentPosition = parseInt(parent.css("margin-left"));
            let decallage = parentPosition + 30;
            let selectedElt = $(this);


            if(currentLeft <= parentPosition){
                if((parentPosition - 30) <= 0){

                    marginLeft = parentPosition;
                }else{

                    marginLeft = (parentPosition - 30);
                }
                elt.css("margin-left", marginLeft + "px");
            }
            else if(currentLeft >= decallage){

                elt.css("margin-left", parentPosition + 30 + "px");
            } else{

                elt.css("margin-left", parentPosition + "px");
            }

            if(elt.find("ul.transport-item").length !== 0){
                chidren = elt.find("ul.transport-item").children().get().reverse();
                for (var item in chidren) {
                    elt.after($(chidren[item]));
                };
            }

            selectedElt.find("li").each(function(){
                if($(this).prev().attr("data-level") === undefined){
                    $(this).attr("data-level", 0);
                }
                else{

                    let MarginLeftCurrent = parseInt($(this).css("margin-left"));
                    let MarginLeftParent = parseInt($(this).prev().css("margin-left"));

                    let levelParent = parseInt($(this).prev().attr("data-level"));
                    let  newlevel = 0;

                    if(MarginLeftCurrent === 0){
                        newlevel = 0;
                    }
                    else{
                        if(MarginLeftCurrent === MarginLeftParent){
                            newlevel = levelParent;
                        }
                        else if(MarginLeftCurrent > MarginLeftParent){
                            newlevel = levelParent+1;
                            if($(this).prev().find("ul.transport-item").length === 0){
                                $(this).prev().append("<ul class='transport-item'>");
                            }
                        }
                        else{
                            newlevel = levelParent-1;
                        }
                    }

                    $(this).attr("data-level", newlevel);
                }
            });

            elt.removeClass("selected-item-sortable");

        }
    });

    $('button.mout-add-menus-button').click(function () {
        result = [];

        $('ul.drag-nav').find("li:not(.ui-sortable-placeholder)").each(function(i){
            if($(this).attr('data-level') === '0') {
                result[i] = $(this).attr('id');
            } else {
                result[i] = $(this).attr('id') + '-' + $(this).attr('data-level');
            }
        });

        console.log(JSON.stringify(result));

        // $.post('/admin/menus/save', data, function (data) {
        //
        // })
    });
});
