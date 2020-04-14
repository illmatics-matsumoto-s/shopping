require('./bootstrap');

window.Vue = require('vue');

Vue.component('admin-user-list', require('./components/Admin/AdminUserList.vue').default);
Vue.component('admin-search-select-box', require('./components/Admin/AdminSearchSelectBox.vue').default);

const app = new Vue({
    el: '#app'
});
