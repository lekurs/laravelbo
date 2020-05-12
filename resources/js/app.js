require('./bootstrap');
require('./admin/bo-mout-nav-bar')
require('./admin/navigation-manager')
require('./admin/bo-edit-contact');

import(/* webpackChunkName: "bocontact" */'./admin/call-bo-edit-contact');
