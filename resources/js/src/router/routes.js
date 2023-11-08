import News from '@/pages/News.vue';
import Article from '@/pages/Article.vue';
import NotFound from "@/pages/NotFound.vue";

const routes = [
    {
        path: '/news',
        name: 'news',
        component: News
    },
    {
        path: '/news/:article',
        name: 'article',
        component: Article
    },
    {
        path: '/:pathMatch(.*)*',
        name: '404',
        component: NotFound
    }
];

export default routes;
