import Vue from "vue";
import Router from "vue-router";
Vue.use(Router);
import Login from '../components/pages/Login';
import Etablissements from '../components/pages/admin/Etablissements';
import AddEtablissement from '../components/pages/admin/AddEtablissement';
import EditEtablissement from '../components/pages/admin/EditEtablissement';
import Dashboard from '../components/pages/admin/Dashboard';

const routes=[
    
    {   name:'login',
        path:'/login',
        component: Login
    },

    {
        name: 'home',
        path: '/',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'etablissements',
        path: '/etablissements',
        component: Etablissements
    },
    {
        name: 'addetab',
        path: '/addetablissement',
        component: AddEtablissement
    },

    {
        name: 'editetab',
        path: '/editEtablissment',
        component: EditEtablissement
    }
]


export default new Router({
base: process.env.BASE_URL,
mode:'history',
routes
});
