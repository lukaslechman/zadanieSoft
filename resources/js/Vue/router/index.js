import {createRouter,createWebHistory} from 'vue-router'

import landingpage from '../pages/landingpage.vue'
import createcarpage from '../pages/createCarPage.vue'

const carlistpage = () => import('../pages/carListPage.vue')
const editCar = () =>import('../pages/editCar.vue')
const createPart = () => import('../pages/createPart.vue')
const partListPage = () => import('../pages/partListPage.vue')
const editPart = () => import('../pages/editPart.vue')

const routes = [
    {
        path:'/',
        name:'Home',
        component : landingpage
    },
    {
        path:'/createCar',
        name: 'createCar',
        component : createcarpage
    },
    {
        path:'/carList',
        name:'carList',
        component : carlistpage,
    },
    {
        path:'/carEdit/:id',
        name:'carEdit',
        component : editCar,
        
    },
    {
        path:'/createPart',
        name:'createPart',
        component : createPart,
        
    },
    {
        path:'/partList',
        name: 'partList',
        component: partListPage
    },
    {
        path:'/partEdit/:id',
        name:'partEdit',
        component : editPart,
        
    },
]

const router = createRouter({
    history:createWebHistory(),
    routes:routes
})

export default router;