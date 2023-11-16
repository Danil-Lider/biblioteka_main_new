import './bootstrap';

// import { createApp } from 'vue';
import { createApp } from 'vue/dist/vue.esm-bundler';   
import * as VueRouter from 'vue-router'

import IndexComponent from './components/IndexComponent.vue'
import CatalogIndex from './components/catalog/Index.vue'

const routes = [
    {path: '/', component: IndexComponent},
    {path: '/items', component: CatalogIndex},
   
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/'),
    routes,
})

const app = createApp({})

app.use(router)

app.component('IndexComponent', IndexComponent)

app.mount('#app')

