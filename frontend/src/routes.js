import VueRouter from 'vue-router';

import Root from './pages/Root.vue'
import Character from './pages/Character.vue'

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Root },
        { path: "/character", component: Character },
        { path: "/character/:slug", component: Character, props: true }
    ]
});