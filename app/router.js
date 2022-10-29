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
    ],
});

export default router;