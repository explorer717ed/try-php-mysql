import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import RegistrationView from '@/views/registration/RegistrationView.vue'
import RegistrationComplese from '@/views/registration/RegistrationComplese.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/registration',
      name: 'registration',
      component: RegistrationView
    },
    {
      path: '/registration/complete',
      name: 'registration-complete',
      component: RegistrationComplese
    },
  ]
})

export default router
