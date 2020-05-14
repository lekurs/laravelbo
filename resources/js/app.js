require('./bootstrap');
require('./admin/bo-mout-nav-bar')
require('./admin/navigation-manager')
require('./admin/bo-edit-contact');

import(/* webpackChunkName: "bocontact" */'./admin/call-bo-edit-contact');
import(/* webpackChunkName: "navigation" */'./admin/nav');
import(/* webpackChunkName: "wysiwyg" */'./vendors/wysiwyg/content-tools.js');

window.addEventListener('load', function() {
    var editor;

    ContentTools.StylePalette.add([
        new ContentTools.Style('Author', 'author', ['p'])
    ]);

    editor = ContentTools.EditorApp.get();
    editor.init('*[data-editable]', 'data-name');
});

// var toolbarOptions = [
//     ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
//     ['blockquote', 'code-block'],
//
//     [{ 'header': 1 }, { 'header': 2 }],               // custom button values
//     [{ 'list': 'ordered'}, { 'list': 'bullet' }],
//     [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
//     [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
//     [{ 'direction': 'rtl' }],                         // text direction
//
//     [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
//     [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
//
//     [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
//     [{ 'font': [] }],
//     [{ 'align': [] }],
//
//     ['clean']                                         // remove formatting button
// ];


// var quill = new Quill('#test', {
//     theme: 'snow',
//     modules: {
//         toolbar: toolbarOptions
//     }
//     });

