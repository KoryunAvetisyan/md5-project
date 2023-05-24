import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeComponent from '@/components/HomeComponent'
import RegisterComponent from '@/components/RegisterComponent'
import LoginComponent from '@/components/LoginComponent'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'HomeComponent',
    component: HomeComponent
  },
  {
    path: '/register',
    name: 'RegisterComponent',
    component: RegisterComponent
  },
  {
    path: '/login',
    name: 'LoginComponent',
    component: LoginComponent
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
