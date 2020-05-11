require('./bootstrap');
require('./admin/bo-mout-nav-bar')
require('./admin/navigation-manager')
require('./admin/bo-edit-filters');


$('.mout-contact-informations').updateJob({
    script: '/admin/clients/contact/edit'
})
