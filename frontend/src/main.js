import Vue from 'vue'
import App from './App.vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Root from './pages/Root.vue'
import Character from './pages/Character.vue'

const router = new VueRouter({
  mode: "history",
  routes: [
    { path: "/", component: Root },
    { path: "/character", component: Character },
    { path: "/character/:slug", component: Character, props: true }
  ]
});

new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
})
