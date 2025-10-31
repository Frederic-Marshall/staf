import {createRouter, createWebHistory} from 'vue-router'

import Dashboard from "@/views/Dashboard.vue";
import LoginPage from "@/views/Users/LoginPage.vue";
import RegisterPage from "@/views/Users/RegisterPage.vue";
import GamesIndex from "@/views/Games/GamesIndex.vue";

const routes = [
    {
        path: "/",
        redirect: "/dashboard",
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
        meta: { layout: 'login' },
    },

    {
        path: "/login",
        name: "Login",
        component: LoginPage,
        meta: { guest: true, layout: 'login' },
    },
    {
        path: "/register",
        name: "Register",
        component: RegisterPage,
        meta: { guest: true, layout: 'login' },
    },
    {
        path: "/logout",
        name: "Logout",
        beforeEnter: async (to, from, next) => {
            const store = (await import('@/store')).default;
            const token = store.state.token;

            if (!token) {
                return next('/register');
            }

            try {
                await fetch('/api/users/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                    },
                });
            } catch (e) {
                console.error('Ошибка при выходе из аккаунта:', e);
            }

            store.commit('LOGOUT');
            next('/register');
        },
    },

    {
        path: "/games/index",
        name: "GamesIndex",
        component: GamesIndex,
        meta: { layout: 'app' }
    }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
