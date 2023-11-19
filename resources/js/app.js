import './bootstrap';

// import { createApp } from 'vue';
import { createApp } from 'vue/dist/vue.esm-bundler';   
import * as VueRouter from 'vue-router';    

import IndexComponent from './components/IndexComponent.vue'
import CatalogIndex from './components/catalog/Index.vue'
import OrderIndex from './components/orders/OrderIndex.vue'
import Registration from './components/auth/Registration.vue'
import Auth from './components/auth/Auth.vue'
const routes = [
    {path: '/', component: IndexComponent},
    {path: '/items', component: CatalogIndex},
    {path: '/orders', component: OrderIndex},
    {path: '/register', component: Registration},
    {path: '/auth', component: Auth},
   
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/'),
    routes,
})

const app = createApp({})

app.use(router)

app.component('IndexComponent', IndexComponent)
// app.component('Registration', Registration)

app.mount('#app')

