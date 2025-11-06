<script>
export default {
    name: "LogReg",
    props: {
        action: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            form: {
                name: '',
                nickname: '',
                email: '',
                password: '',
            }
        }
    },
    computed: {
        transAction() {
            const trans = { login: ['Вход', 'Войти'], registration: ['Регистрация', 'Зарегистрироваться'] };
            return trans[this.action];
        },
    },
    methods: {
        send() {
            const send = this.action === 'registration'
                ? this.form
                : { email: this.form.email, password: this.form.password };

            this.$emit("send", send);
        }
    }
}
</script>

<template>
    <section class="max-w-sm mx-auto">
        <div class="min-w-100 bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-5 text-white">{{ transAction[0] }}</h2>

            <transition name="fade">
                <div  v-if="action === 'registration'" class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-white">Имя</label>
                    <input id="name"
                           type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Введите имя"
                           v-model="form.name"
                           required
                    />
                </div>
            </transition>

            <transition name="fade">
                <div v-if="action === 'registration'" class="mb-5">
                    <label for="nickname" class="block mb-2 text-sm font-medium text-white">Никнейм</label>
                    <input id="nickname"
                           type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Введите никнейм"
                           v-model="form.nickname"
                           required
                    />
                </div>
            </transition>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-white">Почта</label>
                <input id="email"
                       type="text"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Введите почту"
                       v-model="form.email"
                       required
                />
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
                <input type="password"
                       id="password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Введите пароль"
                       v-model="form.password"
                       required
                />
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Минимальная длина пароля: <i>6 символов</i></p>
            </div>

            <div class="submit-group">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        style="cursor: pointer"
                        @click="send()">
                    {{ transAction[1] }}
                </button>
            </div>

            <div class="mt-5 text-sm font-medium text-white">
                <p v-if="action === 'registration'">
                    Есть аккаунт? <router-link class="font-medium text-blue-600 dark:text-blue-500 hover:underline" to="/login">Войти</router-link>
                </p>
                <p v-else>Нет аккаунта? <router-link class="font-medium text-blue-600 dark:text-blue-500 hover:underline" to="/register">Зарегистрироваться</router-link></p>
            </div>

        </div>
    </section>
</template>

<style scoped>

</style>
