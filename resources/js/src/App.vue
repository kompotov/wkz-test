<template>
    <MainNav/>
    <main class="main">
        <router-view/>
    </main>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import MainNav from "./components/MainNav.vue";

export default defineComponent({
    components: {
        MainNav
    },
    setup() {
        return {};
    },
})
</script>

<style lang="sass" scoped>
</style>
