<script>
import LogRegForm from "@/components/Users/LogRegForm.vue";
import api from "@/api/api";

export default {
    name: "LoginPage",
    components: { LogRegForm },
    data() {
        return {
            action: "login",
        }
    },
    methods: {
        send(send) {
            api.post("/users/" + this.action, send)
                .then((response) => {
                    if (response.data.success) {
                    this.$store.dispatch('auth/login', {
                        user: response.data.user,
                        token: response.data.token,
                    });

                    this.$router.push("/games/index");
                    } else {
                        console.error(response.data.errors)
                    }
            })
        }
    }
}
</script>

<template>
    <div class="form-container">
        <LogRegForm :action="action" @send="send" />
    </div>
</template>

<style scoped>

</style>
