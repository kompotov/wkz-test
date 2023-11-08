<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
import NewsListItem from "@/components/NewsListItem.vue";

export default defineComponent({
    components: {
        NewsListItem
    },
    data() {
        return {
            news: []
        }
    },
    setup() {
        return {};
    },
    mounted() {
        axios.get('http://127.0.0.1/api/news').then(response => this.news = response.data.data);
    },
})
</script>

<template>
    <div class="album py-5 bg-light">
        <div class="container">

            <h1>News</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <news-list-item v-for="newsItem in news" :key="newsItem.id" :newsItem="newsItem"></news-list-item>
            </div>

        </div>
    </div>
</template>

<style scoped lang="sass">

</style>
