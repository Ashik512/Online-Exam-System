

require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Swal from 'sweetalert2';

const app = new Vue({
    el: '#app',
});
