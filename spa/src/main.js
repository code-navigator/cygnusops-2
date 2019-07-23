import Vue from 'vue'
import '@Plugins/vuetify'
import '@Plugins/axios'
import App from '@Layouts/App.vue'
import router from '@Router/router.js'
import store from '@Store/store'

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
