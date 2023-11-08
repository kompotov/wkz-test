<script lang="ts">
import {defineComponent} from "vue";
export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    props: [
        'newsItem'
    ],
})
</script>

<template>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ newsItem.title }}</h5>
                <p class="card-text">{{ newsItem.description.substring(0, 150) + '...' }}</p>
                <router-link :to="{name: 'article', params: { article: newsItem.id }}" class="card-link">
                    Read Article
                </router-link>
            </div>
            <div class="card-footer">
                <small class="text-muted">Added {{ newsItem.createdAt }}</small>
            </div>
        </div>
    </div>
</template>

<style scoped lang="sass">

</style>
