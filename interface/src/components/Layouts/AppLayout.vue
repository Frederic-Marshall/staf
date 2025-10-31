<script>
import Header from "@/components/Common/Header.vue";
import Footer from "@/components/Common/Footer.vue";

export default {
    name: "AppLayout",
    components: {Footer, Header}
}
</script>

<template>
    <div class="layout">
        <Header />

        <main class="main">
            <slot />
        </main>

        <Footer />
    </div>
</template>

<style scoped>

</style>
