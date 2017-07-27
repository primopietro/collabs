import Vue from 'vue'
import App from './App.vue'
import Vuetify from 'vuetify'
import Axios from 'axios'
import VueAxios from 'vue-axios'

window.Vue = Vue;
window.Axios = Axios;
Vue.use(Vuetify);
Vue.use(VueAxios,Axios);

window.Axios.defaults.headers.common= {
  'X-Requested-With': 'XMLHttpRequest'
};

new Vue({
  el: '#app',
  render: h => h(App)
})
