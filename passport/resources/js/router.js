import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes:[
        {
            path: '/',
            name:'home',
            component: () => import('./Pages/Main.vue'),
            meta: {
                title: 'Home'
            }
        },
        {
            path: '/registration',
            name:'registration',
            component: () => import('./Pages/Auth/Registration.vue'),
            meta: {
                title: 'Registration'
            }
        },
        {
            path: '/login',
            name:'login',
            component: () => import('./Pages/Auth/Login.vue'),
            meta: {
                title: 'Login'
            }
        },
    ]
})
export default router
