import {createRouter, createWebHistory} from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/signup',
            name: 'signup',
            component: () => import('./src/views/SignUpView.vue')
        },
        {
            path: '/signin',
            name: 'signin',
            component: () => import('./src/views/SignInView.vue')
        },
        {
            path: '/signin',
            name: 'signin',
            component: () => import('./src/views/SignInView.vue')
        },
        {
            path: '/password-reset',
            name: 'password-reset',
            component: () => import('./src/views/PasswordResetView.vue')
        },
        {
            path: '/settings_working-space',
            name: 'settings_working-space',
            component: () => import('./src/views/SettingsWorkingSpaceView.vue')
        },
        {
            path: '/profile',
            name: 'profile',
            component: () => import('./src/views/ProfileView.vue')
        },
        {
            path: '/filial',
            name: 'filial',
            component: () => import('./src/views/FilialView.vue')
        },
        {
            path: '/filial/specific',
            name: 'filial/specific',
            component: () => import('./src/views/FilialSpecificView.vue')
        },
        {
            path: '/filial/specific/group-create',
            name: 'filial/specific/group-create',
            component: () => import('./src/views/FilialSpecificGroupCreateView.vue')
        },
        {
            path: '/timetable/group',
            name: 'timetable/group',
            component: () => import('./src/views/TimetableGroupView.vue')
        },
    ],
});

export default router;