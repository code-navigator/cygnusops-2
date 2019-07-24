import Home from '@Pages/Home.vue'
import About from '@Pages/About.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    icon: 'folder'
  },
  {
    path: '/about',
    name: 'about',
    component: About,
    icon: 'folder'
  }
]

export {
  routes
}
