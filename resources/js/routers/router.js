import Vue from "vue";
import Router from "vue-router";
import 'vue-input-multiple/dist/vue-input-multiple.css'
import VueInputMultiple from 'vue-input-multiple/dist/vue-input-multiple.common'
Vue.use(VueInputMultiple)
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
import Enseignements from '../components/pages/locale/Enseignements';
import students from '../components/pages/locale/students';
import inscriptionEleve from '../components/pages/locale/inscriptionEleve';
import enfantsParent from '../components/pages/locale/enfantsParent';
import listeEleve from '../components/pages/locale/listeEleve';
import Sms from '../components/pages/locale/Sms';
import messageDash from '../components/pages/locale/messageDash'
import emploiDuTemps from '../components/pages/locale/emploiDuTemps'
import detailsEleve from '../components/pages/locale/detailsEleve'
import Dashteacher from '../components/pages/teacher/Dashteacher'
import classe from '../components/pages/teacher/classe'
import listeEleveTeacher from '../components/pages/teacher/listeEleveTeacher'
import detailEleveTeacher from '../components/pages/teacher/detailEleveTeacher'
import emploiTempteacher from '../components/pages/teacher/emploiTempteacher'
import EnseignementTeacher from '../components/pages/teacher/EnseignementTeacher'
import absenceDashTeacher from '../components/pages/teacher/absenceDashTeacher'
import emploiTempTeacherForAclass from '../components/pages/teacher/emploiTempTeacherForAclass'
import appelTeacher from '../components/pages/teacher/appelTeacher'
import teacherclasse from '../components/pages/teacher/teacherclasse'
import classeofTeacher from '../components/pages/locale/classeofTeacher'
import Dashparent from '../components/pages/parent/Dashparent'
import messagerie from '../components/pages/locale/messagerie'
import messageDashParent from '../components/pages/parent/messageDashParent'
import detailsMessageParent from '../components/pages/parent/detailsMessageParent'
import messageDashTeacher from '../components/pages/teacher/messageDashTeacher'
import detailsMessageSendByLocal from '../components/pages/locale/detailsMessageSendByLocal'
import detailsMessageTeacher from '../components/pages/teacher/detailsMessageTeacher'
import AbsencesDash from '../components/pages/locale/AbsencesDash'
import RecapAbsence from '../components/pages/locale/RecapAbsence'
import DashParentGeneralites from '../components/pages/parent/DashParentGeneralites'
import DetailsAbsenceByParent from '../components/pages/parent/DetailsAbsenceByParent'
import EmploiTempsByParent from '../components/pages/parent/EmploiTempsByParent'
import detailsMessageReceiveByLocal from '../components/pages/locale/detailsMessageReceiveByLocal'
import detailsMessageSendParent from '../components/pages/parent/detailsMessageSendParent'
import createDevoir from '../components/pages/teacher/createDevoir'
import devoirsDashTeacher from '../components/pages/teacher/devoirsDashTeacher'
import detailsDevoirTeacher from '../components/pages/teacher/detailsDevoirTeacher'
import devoirsDashLocal from '../components/pages/locale/devoirsDashLocal'
import detailsDevoirLocal from '../components/pages/locale/detailsDevoirLocal'
import devoirsDashParent from '../components/pages/parent/devoirsDashParent'
import detailsDevoirParent from '../components/pages/parent/detailsDevoirParent'
import cahierDashTeacher from '../components/pages/teacher/cahierDashTeacher'
import cahierLocal from '../components/pages/locale/cahierLocal'
import cahierParent from '../components/pages/parent/cahierParent'
import  classeFinance from '../components/pages/locale/classeFinance'
import  listeStudenversement from '../components/pages/locale/listeStudenversement'
import  detailsEleveFinance from '../components/pages/locale/detailsEleveFinance'




const routes= [

    {
        name: 'detailsEleveFinance',
        path: '/detailsEleveFinance',
        component: detailsEleveFinance
    },

    {
        name: 'listeStudenversement',
        path: '/listeStudenversement',
        component: listeStudenversement
    },

    {
        name: 'classeFinance',
        path: '/classeFinance',
        component: classeFinance
    },

    {
        name: 'cahierParent',
        path: '/cahierParent',
        component: cahierParent
    },

    {
        name: 'cahierLocal',
        path: '/cahierLocal',
        component: cahierLocal
    },

    {
        name: 'cahierDashTeacher',
        path: '/cahierDashTeacher',
        component: cahierDashTeacher
    },

    {
        name: 'detailsDevoirParent',
        path: '/detailsDevoirParent',
        component: detailsDevoirParent
    },

    {
        name: 'devoirsDashParent',
        path: '/devoirsDashParent',
        component: devoirsDashParent
    },


    {
        name: 'detailsDevoirLocal',
        path: '/detailsDevoirLocal',
        component: detailsDevoirLocal
    },

    {
        name: 'devoirsDashLocal',
        path: '/devoirsDashLocal',
        component: devoirsDashLocal
    },


    {
        name: 'detailsDevoirTeacher',
        path: '/detailsDevoirTeacher',
        component: detailsDevoirTeacher
    },

    {
        name: 'devoirsDashTeacher',
        path: '/devoirsDashTeacher',
        component: devoirsDashTeacher
    },

    {
        name: 'createDevoir',
        path: '/createDevoir',
        component: createDevoir
    },

    {
        name: 'detailsMessageSendParent',
        path: '/detailsMessageSendParent',
        component: detailsMessageSendParent
    },

    {
        name: 'detailsMessageReceiveByLocal',
        path: '/detailsMessageReceiveByLocal',
        component: detailsMessageReceiveByLocal
    },

    {
        name: 'EmploiTempsByParent',
        path: '/EmploiTempsByParent',
        component: EmploiTempsByParent
    },

    {
        name: 'DetailsAbsenceByParent',
        path: '/DetailsAbsenceByParent',
        component: DetailsAbsenceByParent
    },
    {
        name: 'DashParentGeneralites',
        path: '/DashParentGeneralites',
        component: DashParentGeneralites
    },

    {
        name: 'RecapAbsence',
        path: '/RecapAbsence',
        component: RecapAbsence
    },

    {
        name: 'AbsencesDash',
        path: '/AbsencesDash',
        component: AbsencesDash
    },
    {
        name: 'detailsMessageTeacher',
        path: '/detailsMessageTeacher',
        component: detailsMessageTeacher
    },

    {
        name: 'detailsMessageSendByLocal',
        path: '/detailsMessageSendByLocal',
        component: detailsMessageSendByLocal
    },

    {
        name: 'detailsMessageParent',
        path: '/detailsMessageParent',
        component: detailsMessageParent
    },


    {
        name: 'messageDashTeacher',
        path: '/messageDashTeacher',
        component: messageDashTeacher
    },

    {
        name: 'emploiTempTeacherForAclass',
        path: '/emploiTempTeacherForAclass',
        component: emploiTempTeacherForAclass
    },

    {
        name: 'messageDashParent',
        path: '/messageDashParent',
        component:messageDashParent
    },


    {
        name: 'messagerie',
        path: '/messagerie',
        component: messagerie
    },

    {
        name: 'Dashparent',
        path: '/Dashparent',
        component: Dashparent
    },


    {
        name: 'classeofTeacher',
        path: '/classeofTeacher',
        component: classeofTeacher
    },


    {
        name: 'appelTeacher',
        path: '/appelTeacher',
        component: appelTeacher
    },

    {
        name: 'absenceDashTeacher',
        path: '/absenceDashTeacher',
        component: absenceDashTeacher
    },

    {
        name: 'EnseignementTeacher',
        path: '/EnseignementTeacher',
        component: EnseignementTeacher
    },

    {
        name: 'emploiTempteacher',
        path: '/emploiTempteacher',
        component: emploiTempteacher
    },

    {
        name: 'detailEleveTeacher',
        path: '/detailEleveTeacher',
        component: detailEleveTeacher
    },

    {
        name: 'emploiDuTemps',
        path: '/emploiDuTemps',
        component: emploiDuTemps
    },

    {
        name: 'listeEleveTeacher',
        path: '/listeEleveTeacher',
        component: listeEleveTeacher
    },
    {
        name: 'teacherclasse',
        path: '/teacherclasse',
        component:teacherclasse
    },

    {
        name: 'Dashteacher',
        path: '/Dashteacher',
        component: Dashteacher
    },

    {
        name: 'detailsEleve',
        path: '/detailsEleve',
        component: detailsEleve
    },

    {
        name: 'messageDash',
        path: '/messageDash',
        component: messageDash
    },

    {
        name: 'Sms',
        path: '/Sms',
        component: Sms
    },

    {
        name: 'listeEleve',
        path: '/listeEleve',
        component: listeEleve
    },

    {
        name: 'enfantsParent',
        path: '/enfantsParent',
        component: enfantsParent
    },


    {
        name: 'inscriptionEleve',
        path: '/inscriptionEleve',
        component: inscriptionEleve
    },


    {
        name: 'students',
        path: '/students',
        component: students
    },

    {
        name: 'Enseignants',
        path: '/Enseignants',
        component: Enseignants
    },


    {
        name: 'Enseignements',
        path: '/Enseignements',
        component: Enseignements
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
        component: Session,
        beforeEnter:(to,form,next)=>{

            if(!localStorage.users) {
                next('/')
            }

            else {
                next()
            }

        }


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
