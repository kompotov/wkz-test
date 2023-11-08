<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";

export default defineComponent({
    components: {},
    data() {
        return {
            article: []
        }
    },
    mounted() {
        axios.get('/api/news/' + this.$route.params.article)
            .then(response => this.article = response.data.data);
    },
    methods: {
        toggleState() {
            axios.patch('/api/news/' + this.article.id + '/update-state')
                .then(response => this.article.state = response.data['new-state'] ? 'Active' : 'Hidden')
        }
    }
})
</script>

<template>
    <div class="album py-5 bg-light">
        <div class="container">

            <h1>{{ article.title }}</h1>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{ article.text }}</p>

                    <a @click.prevent="toggleState" href="#" class="card-link">Change state</a>
                </div>
                <div class="card-footer text-muted">
                    {{ article.state }}
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="sass">

</style>
