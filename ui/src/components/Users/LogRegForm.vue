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
    <section class="user-form">
        <h2>{{ transAction[0] }}</h2>
        <transition name="fade">
            <div v-if="action === 'registration'" class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" class="user-input" v-model="form.name" required>
            </div>
        </transition>

        <transition name="fade">
            <div v-if="action === 'registration'" class="form-group">
                <label for="nickname">Никнейм</label>
                <input type="text" id="nickname" class="user-input" v-model="form.nickname" required>
            </div>
        </transition>

        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" id="email" class="user-input" v-model="form.email" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" class="user-input" v-model="form.password" required>
        </div>

        <div class="submit-group">
            <button class="submit" @click="send()">{{ transAction[1] }}</button>
        </div>
    </section>
</template>

<style scoped>

</style>
