require('./bootstrap');

import Vue from 'vue';

window.Vue = Vue;

require('./components');

/**
 * Sweet Alert
 * @type {module:sweetalert2}
 */
window.Swal = require('sweetalert2')
window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

require('@ckeditor/ckeditor5-build-decoupled-document')

new Vue({
   el: '#my_navbar'
});
