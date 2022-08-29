import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/signup',
    name: 'signup',
    component: () => import('../views/SignUpView.vue')
  },
  {
    path: '/signin',
    name: 'signin',
    component: () => import('../views/SignInView.vue')
  },
  {
    path: '/signin/activate',
    name: 'activate',
    component: () => import('../views/SignInView.vue')
  },
  {
    path: '/password-reset',
    name: 'password_reset',
    component: () => import('../views/PasswordResetView.vue')
  },
  {
    path: '/journal-settings',
    name: 'journal_settings',
    component: () => import('../views/JournalSettingsView.vue'),
    props: true
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
