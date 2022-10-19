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
    ],
});

export default router;