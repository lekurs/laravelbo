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
    sort: function sort(event, ui) {
      currentLeft = parseInt(ui.item.css('left'));
      ui.item.addClass("selected-item-sortable");
    },
    stop: function stop(event, ui) {
      var elt = $(".selected-item-sortable");
      var parent = elt.prev();
      var parentPosition = parseInt(parent.css("margin-left"));
      var decallage = parentPosition + 30;

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

      $(elt).removeClass("selected-item-sortable");
    }
  });
});

/***/ })

}]);