import News from '@/pages/News.vue';
import Article from '@/pages/Article.vue';

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
];

export default routes;
