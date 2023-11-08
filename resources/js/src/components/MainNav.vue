<script lang="ts">
import {defineComponent} from "vue";
export default defineComponent({
    components: {},
    setup() {
        return {};
    }
})
</script>

<template>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><router-link to="/news" class="nav-link " aria-current="page">News</router-link></li>
            </ul>
        </header>
    </div>
</template>

<style scoped lang="sass">

</style>
