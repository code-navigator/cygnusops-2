import Vue from 'vue'
import Router from 'vue-router'
import Home from '@Pages/Home.vue'
import About from '@Pages/About.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: 'dev.local',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: About
    }
  ]
})
