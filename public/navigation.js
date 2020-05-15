(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["navigation"],{

/***/ "./resources/js/admin/nav.js":
/*!***********************************!*\
  !*** ./resources/js/admin/nav.js ***!
  \***********************************/
/*! unknown exports (runtime-defined) */
/*! exports [maybe provided (runtime-defined)] [maybe used (runtime-defined)] */
/*! runtime requirements:  */
/***/ (() => {

$(function () {
  $("ul.drag-nav").sortable({
    placeholder: 'placeholder-list',
    start: function start(event, ui) {
      var indexCurrent = ui.item.index();
      var levelCurrent = ui.item.attr("data-level");
      var transporteur = "";

      if (ui.item.find("ul.transport-item").length !== 0) {
        transporteur = ui.item.find("ul.transport-item");
      }

      var go = 0;
      var z = 0;
      $(this).find("li:not(.ui-sortable-placeholder)").each(function (i) {
        if (i === indexCurrent) {
          go = 1;
        } else {
          if (go === 1) {
            lvl = $(this).attr("data-level");

            if (lvl > levelCurrent) {
              if (transporteur !== "") {
                z++;
                transporteur.append($(this));
              }
            } else {
              go = 0;
            }
          }
        }
      });
      $('.placeholder-list').css('height', 55 * (z + 1) + 'px');
    },
    sort: function sort(event, ui) {
      currentLeft = parseInt(ui.item.css('left'));
      ui.item.addClass("selected-item-sortable");
    },
    stop: function stop(event, ui) {
      var elt = $(".selected-item-sortable");
      var parent = elt.prev();
      var parentPosition = parseInt(parent.css("margin-left"));
      var decallage = parentPosition + 30;
      var selectedElt = $(this);

      if (currentLeft <= parentPosition) {
        if (parentPosition - 30 <= 0) {
          marginLeft = parentPosition;
        } else {
          marginLeft = parentPosition - 30;
        }

        elt.css("margin-left", marginLeft + "px");
      } else if (currentLeft >= decallage) {
        elt.css("margin-left", parentPosition + 30 + "px");
      } else {
        elt.css("margin-left", parentPosition + "px");
      }

      if (elt.find("ul.transport-item").length !== 0) {
        chidren = elt.find("ul.transport-item").children().get().reverse();

        for (var item in chidren) {
          elt.after($(chidren[item]));
        }

        ;
      }

      selectedElt.find("li").each(function () {
        if ($(this).prev().attr("data-level") === undefined) {
          $(this).attr("data-level", 0);
        } else {
          var MarginLeftCurrent = parseInt($(this).css("margin-left"));
          var MarginLeftParent = parseInt($(this).prev().css("margin-left"));
          var levelParent = parseInt($(this).prev().attr("data-level"));
          var newlevel = 0;

          if (MarginLeftCurrent === 0) {
            newlevel = 0;
          } else {
            if (MarginLeftCurrent === MarginLeftParent) {
              newlevel = levelParent;
            } else if (MarginLeftCurrent > MarginLeftParent) {
              newlevel = levelParent + 1;

              if ($(this).prev().find("ul.transport-item").length === 0) {
                $(this).prev().append("<ul class='transport-item'>");
              }
            } else {
              newlevel = levelParent - 1;
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
    $('ul.drag-nav').find("li:not(.ui-sortable-placeholder)").each(function (i) {
      if ($(this).attr('data-level') === '0') {
        result[i] = $(this).attr('id');
      } else {
        result[i] = $(this).attr('id') + '-' + $(this).attr('data-level');
      }
    });
    console.log(JSON.stringify(result)); // $.post('/admin/menus/save', data, function (data) {
    //
    // })
  });
});

/***/ })

}]);