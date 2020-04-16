require('./bootstrap');

window.Vue = require('vue');

Vue.component('admin-admin-search', require('./components/Admin/Admin/Search/Search.vue').default);
Vue.component('admin-admin-search-search-user-list', require('./components/Admin/Admin/Search/SearchUserList').default);

const app = new Vue({
    el: '#app'
});
