<script>
import {mapGetters} from "vuex";

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
        }
    }
}
</script>

<template>
    <div class="header">
        <div class="left">
            <span class="logo"><router-link to="/games/index">STAFgaming</router-link></span>
        </div>

        <div class="center">
            TODO: сделать тут всё
        </div>

        <div v-if="currentUser" class="right header-actions">
            <div class="dropdown" @click="toggleDropdown">
                <button class="toggle-dropdown">
                    Профиль
                </button>


                <ul v-if="dropdownOpen" class="dropdown-menu">
                    <li><router-link :to="`/user/${currentUser.nickname}`">Профиль</router-link></li>
                    <li><router-link to="/logout">Выйти</router-link></li>
                </ul>
            </div>
        </div>

        <div v-else class="header-actions-login right">
            <router-link to="/login">Войти</router-link>
            <router-link to="/register">Зарегистрироваться</router-link>
        </div>
    </div>
</template>

<style scoped>

</style>
