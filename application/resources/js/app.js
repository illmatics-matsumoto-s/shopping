require('./bootstrap');

window.Vue = require('vue');

Vue.component('admin-user-list', require('./components/Admin/AdminUserList.vue').default);

const app = new Vue({
    el: '#app'
});
