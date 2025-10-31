<template>
    <div id="app">
        <component :is="layout">
            <router-view/>
        </component>
    </div>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
<script>
    import LoginLayout from "@/components/Layouts/LoginLayout.vue";
    import AppLayout from "@/components/Layouts/AppLayout.vue";

    export default {
        name: "App",
        computed: {
            layout() {
                return this.$route.meta.layout === 'login' ? LoginLayout : AppLayout;
            }
        }
    }
</script>
