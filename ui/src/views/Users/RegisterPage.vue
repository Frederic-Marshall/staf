<script>
import LogRegForm from "@/components/Users/LogRegForm.vue";
import api from "@/api/api";

export default {
    name: "RegisterPage",
    components: { LogRegForm },
    data() {
        return {
            action: 'registration'
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
        <LogRegForm :action="action" @send="send"/>
</template>

<style scoped>

</style>
