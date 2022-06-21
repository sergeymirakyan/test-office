import Vue from "vue"

Vue.component('App', () => import('./layouts/App.vue'))
Vue.component('Item', () => import("./components/Item.vue"))
