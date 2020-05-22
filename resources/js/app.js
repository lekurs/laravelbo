require('./bootstrap');
require('./admin/bo-mout-nav-bar');
require('./admin/navigation-manager');
require('./admin/bo-edit-contact');
require('./admin/table-options');
require('./admin/autocomplete');

import(/* webpackChunkName: "bocontact" */'./admin/call-bo-edit-contact');
import(/* webpackChunkName: "navigation" */'./admin/nav');
import(/* webpackChunkName: "wysiwyg" */'./vendors/wysiwyg/content-tools.js');
import(/* webpackChunkName: "wysiwyg-upload-img" */'./vendors/wysiwyg/sandbox.js');
import(/* webpackChunkName: "navigation-manager-nestable" */'./vendors/nestable/nestable');
import(/* webpackChunkName: "more-options" */'./admin/table-options');
import(/* webpackChunkName: "autocomplete" */'./admin/autocomplete-loading');



window.addEventListener('load', function() {
    var editor;

    ContentTools.StylePalette.add([
        new ContentTools.Style('Author', 'author', ['p'])
    ]);

    editor = ContentTools.EditorApp.get();
    editor.init('*[data-editable]', 'data-name');
});

$('.collapse').collapse();
