import {createRouter, createWebHistory } from 'vue-router';


function ImportComponent(component){
    return import( '../src/components/' + component)
}

const routers = [
    {
        path: '/login', 
        name: 'page-Auth',
        component: ImportComponent('/auth/index.vue'),
        meta: {'layout': 'layout-defalt'},

        children: [
            {
                path: '/login',
                name: 'page-Login',
                component: ImportComponent('/auth/login/index.vue'),
            },
            {
                path: '/criar-conta',
                name: 'page-criar-conta',
                component: ImportComponent('/auth/criar-conta/index.vue'),
            }
        ]
    },
    {
        path: '/', 
        name: 'page-index',
        component: ImportComponent('/app/index.vue'),
        meta: {'layout': 'layout-auth'},
    },
    {
        path: '/publicar', 
        name: 'page-publicar',
        component: ImportComponent('/app/publicar/index.vue'),
        meta: {'layout': 'layout-auth'},
    }
];



const router = createRouter(
    {
        history: createWebHistory(),
        routes: routers
    }
)



export default router;

