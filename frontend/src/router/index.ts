import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import RegistrationView from '@/views/registration/RegistrationView.vue'
import RegistrationComplete from '@/views/registration/RegistrationComplete.vue'

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
      component: RegistrationComplete
    },
  ]
})

export default router
