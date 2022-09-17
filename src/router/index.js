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
  },
  {
    path: '/group-all',
    name: 'group_all',
    component: () => import('../views/GroupAllView.vue'),
    props: true
  },
  {
    path: '/group-show',
    name: 'group_show',
    component: () => import('../views/GroupShowView.vue'),
    props: true
  },
  {
    path: '/timetable-create',
    name: 'timetable_create',
    component: () => import('../views/TimetableView.vue'),
    props: true
  },
  {
    path: '/timetable-show',
    name: 'timetable_showe',
    component: () => import('../views/TimetableShowView.vue'),
    props: true
  },
  {
    path: '/timetable-teacher',
    name: 'timetable_teacher',
    component: () => import('../views/TimetableTicherView.vue'),
    props: true
  },
  {
    path: '/timetable-teacher-show',
    name: 'timetable_teacher_show',
    component: () => import('../views/TimetableTeacherShowView.vue'),
    props: true
  },
  {
    // Админ или директор ?user_id=4
    path: '/journal-group',
    name: 'journal_group',
    component: () => import('../views/JournalGroupView.vue'),
    props: true
  },
  {
    // Админ ?user_id=4&&group_id=1
    // Студент просто переход без параметров
    // Родитель просто переход по ссылке + подгрузка данных
    path: '/journal-show',
    name: 'journal_show',
    component: () => import('../views/JournaShowlView.vue'),
    props: true
  },
  {
    // Для админа и директора
    path: '/students-all',
    name: 'students_all',
    component: () => import('../views/StudentsAlllView.vue'),
    props: true
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
