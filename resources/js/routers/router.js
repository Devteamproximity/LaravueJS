import Vue from "vue";
import Router from "vue-router";
Vue.use(Router);
import Login from '../components/pages/Login';
import Etablissements from '../components/pages/admin/Etablissements';
import AddEtablissement from '../components/pages/admin/AddEtablissement';
import addLocal from '../components/pages/admin/AddLocal'
import EditEtablissement from '../components/pages/admin/EditEtablissement';
import EtablissementDash from '../components/pages/admin/EtablissementDash';
import Dashboard from '../components/pages/Dashboard';


//  Routes pour admin local 

import DashboardLocal from '../components/pages/locale/DashboardLocal';
import Session from '../components/pages/locale/Session';
import Administration from '../components/pages/locale/Administration';
import Matieres from '../components/pages/locale/Matieres';
import Classes from '../components/pages/locale/Classes';
import Users from '../components/pages/locale/Users';
import addClasse from '../components/pages/locale/addClasse';
import Parents from '../components/pages/locale/Parents';
import Addparent from '../components/pages/locale/addparent';
import Enseignants from '../components/pages/locale/Enseignants';
import Addenseignant from '../components/pages/locale/addenseignant';



const routes=[


    {
        name: 'Enseignants',
        path: '/Enseignants',
        component: Enseignants
    },

    {
        name: 'Addenseignant',
        path: '/addenseignant',
        component: Addenseignant
    },


    {
        name: 'Parents',
        path: '/Parents',
        component: Parents
    },

    {
        name: 'Addparent',
        path: '/addparent',
        component: Addparent
    },

    {
        name: 'addClasse',
        path: '/addclasse',
        component: addClasse
    },

    {
        name: 'Matieres',
        path: '/Matieres',
        component: Matieres
    },
    {
        name: 'Classes',
        path: '/classes',
        component: Classes
    },
    {
        name: 'Users',
        path: '/users',
        component: Users
    },

    {
        name: 'Administration',
        path: '/administration',
        component: Administration
    },

    {
        name: 'DashboardLocal',
        path: '/dashboardLocal',
        component: DashboardLocal
    },

    

    {
        name: 'Session',
        path: '/session',
        component: Session
    },


    {
        name: 'addLocal',
        path: '/addLocal',
        component: addLocal
    },

    {   name:'etablissementDash',
        path:'/etablissementDash',
        component: EtablissementDash
    },

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
