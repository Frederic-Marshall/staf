<script>
import {mapGetters} from "vuex";
import api from "@/api/api.js";

export default {
    name: "Header",
    data() {
        return {
            dropdownOpen: false
        }
    },
    computed: {
        ...mapGetters('auth', ['currentUser']),
    },
    methods: {
        toggleDropdown() {
            this.dropdownOpen = !this.dropdownOpen;
        },
        async logout() {
            const store = (await import('@/store')).default

            try {
                await api.post('/users/logout') // ✅ axios вместо fetch
            } catch (e) {
                console.error('Ошибка при выходе из аккаунта:', e)
            }

            store.commit('auth/LOGOUT', null, { root: true })
            this.$router.push('/register')
        }
    }
}
</script>

<template>
    <header class="bg-gray-800 text-gray-100 p-4">
        <div class="container mx-4 flex justify-between items-center">
            <div class="logo">
                <router-link to="/dashboard">
                    <img src="@/assets/images/logo.svg" alt="logo" class="w-45">
                </router-link>
            </div>

            <nav>
                <router-link class="font-medium text-gray-100 hover:text-gray-400" to="/games/index">
                    Главная
                </router-link>
                <router-link class="font-medium text-gray-100 hover:text-gray-400" to="/games/index">
                    О нас
                </router-link>
            </nav>

            <div v-if="currentUser" class="right header-actions">
                <div class="relative inline-block text-left">
                    <button
                        @click="toggleDropdown"
                        id="dropdownInformationButton"
                        type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"
                            />
                        </svg>
                    </button>

                    <div v-show="dropdownOpen" class="absolute right-0 mt-2 w-44 z-50 bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700 dark:divide-gray-600 transition-all duration-200">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ currentUser?.name }}</div>
                            <div class="font-medium truncate">{{ currentUser?.email }}</div>
                        </div>

                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                            <li>
                                <router-link :to="`/user/${currentUser.nickname}`" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Профиль
                                </router-link>
                            </li>
                        </ul>

                        <div class="py-2">
                            <router-link
                                to="#"
                                @click.prevent="logout"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                            >
                                Выйти
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <div v-else class="header-actions-login right">
                <router-link class="font-medium text-gray-100 hover:text-gray-400" to="/login">Войти</router-link>
            </div>
        </div>
    </header>
</template>

<style scoped>

</style>
