
require('./bootstrap');
window.token = document.getElementsByName("user-token")[0].content;

import { Form, HasError } from "vform";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Notifications from 'vue-notification'
import vueCountryRegionSelect from 'vue-country-region-select'
import RiseLoader from 'vue-spinner/src/RiseLoader.vue'


window.Vue = require('vue');
window.Form = Form;
window.Fire = new Vue();

Vue.component("loader",RiseLoader);
Vue.use(vueCountryRegionSelect)
Vue.use(Notifications)
Vue.use(VueSweetalert2);

Vue.component(HasError.name, HasError)
Vue.component('pagination', require('laravel-vue-pagination'));

require("./components/RegisterComponents");
require("./components/user/RegisterComponents");
require("./components/user-management/RegisterComponents");
require("./components/hex/RegisterComponents");
require("./components/tri/RegistrationComponents");
require("./components/diaries/RegistrationComponent");
require("./components/announcement/RegisterComponents");
require("./components/consultant/RegisterComponents");
require("./components/system/RegistrationComponents");
require("./components/oracle/RegistrationComponent");
const app = new Vue({
    el: '#app',
});

