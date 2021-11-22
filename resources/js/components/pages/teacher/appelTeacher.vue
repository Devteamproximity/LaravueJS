<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuTeacher />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">

                        <!-- START Card With Image -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Présences
                                    <p class="subtitle font-size-14 mb-0">
                                        Selectionner une classe et faites
                                        l'appel
                                    </p>
                                </h4>
                            </div>
                        </div>

                        <input type="checkbox" id="jack" value="Jack" v-model="datas.checkedNames">

<br>

                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Date du jour </label>
                                            <input
                                                v-model="datas.dateJour"
                                                class="form-control"
                                                type="date"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Classe </label>
                                            <select
                                                v-model="datas.classeName"
                                                class="custom-select form-control required"
                                            >
                                                <option
                                                    v-for="(data, i) in ClassListes"
                                                    :key="i"
                                                    :value="data.id"
                                                >
                                                    {{ data.libelleClasse }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                Heure de début
                                            </label>
                                            <input
                                                v-model="datas.heureDeb"
                                                class="form-control"
                                                type="time"
                                                name=""
                                                id=""
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> heure de fin </label>
                                            <input
                                                v-model="datas.heureFin"
                                                class="form-control"
                                                type="time"
                                                name=""
                                                id=""
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button
                                                @click="afficher"
                                                class="waves-effect waves-light btn mb-5  btn btn-primary"
                                            >
                                                Suivant
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br /><br />

                        <div class="card" v-if="rempli==true">
                            <div class="row" >
                                <div   class="col-lg-12 col-md-12" >

                                    <Alert type="info" show-icon closable>

                                           <p style="text-align:center">Cocher les eleves absents et cliquer sur terminer</p>

                                     </Alert>
                                    <div v-for="(data, i) in Classes" :key="i">
                                        <div>
                                            <div
                                                class="media-list media-list-divided media-list-hover"
                                            >
                                                <div
                                                    class="media align-items-center"
                                                >
                                                    <div
                                                        class="custom-control custom-checkbox"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            :id="data.id"
                                                            :value="data.id"
                                                             class="chk-col-danger"
                                                            v-model="checkedNames"
                                                        />

                                                         <label :for="data.id"></label>

                                                    </div>

                                                    <a
                                                        class="flexbox flex-grow gap-items text-truncate"
                                                        href="#qv-user-details"
                                                        data-toggle="quickview"
                                                    >
                                                        <img
                                                            class="avatar"
                                                            :src="
                                                                `/Photos/Logos/${data.user.photo}`
                                                             "
                                                            alt=""
                                                        />

                                                        <div
                                                            class="media-body text-truncate"
                                                        >
                                                            <h6>{{data.nom}}</h6>
                                                            <small>
                                                                <span>{{data.prenom}}</span >

                                                            </small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row" v-if="rempli==true">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button
                                        type="button"
                                        class="waves-effect waves-light btn mb-5 btn btn-primary"
                                        @click="Presence"
                                    >
                                        Terminer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <Chats />
    </div>
</template>

<script>
import Header from "../../headers/Header.vue";
import MenuTeacher from "../../navs/MenuTeacher.vue";
import Chats from "../../navs/Chats.vue";
import { mapState } from "vuex";
import {
    required,
    minLength,
    alpha,
    email,
    maxLength,
    sameAs
} from "vuelidate/lib/validators";
import { log } from "util";

export default {
    components: { Header, MenuTeacher, Chats },
    data() {
        return {
            datas: {
                classeName: "",
                heureDeb: "",
                heureFin: "",
                dateJour: "",


            },

            checkedNames:[],
            checkBoxs:[],
            rempli:false,
            users: [],
            ClassListes: [],
            Classes: [],

        };
    },

    async mounted() {
        if (localStorage.users) {
            this.users = JSON.parse(localStorage.getItem("users"));
        }

        // Allons chercher la session et le code etablissement ce cet enseigant

        const response = await this.callApi(
            "post",
            "api/teacher/getAcllasseTeacher",
            this.users
        );

        this.ClassListes = response.data;

    },

    methods: {

        async afficher() {

            if (this.datas.dateJour.trim() == "") {
                return this.e("Choissir la date du jour  ");
            }

            if (this.datas.classeName == "") {
                return this.e("Selectionner une classe ");
            }

            if (this.datas.heureDeb.trim() == "") {
                return this.e("Saisir l'heure de debut du cour ");
            }

            if (this.datas.heureFin.trim() == "") {
                return this.e("Saisir l'heure de la fin ");
            }


                const response2 = await this.callApi(
                    "post",
                    "api/teacher/getStudentByTeacherForAppel",
                   this.datas
                );

            this.Classes = response2.data

            if(this.Classes=="") {
                  this.rempli = false

            }

            else {
                this.rempli = true
            }


        },

        async Presence(){

            this.datas.checkBoxs = this.checkedNames

             // Allons chercher la session et le code etablissement ce cet enseigant

            const response = await this.callApi(
                "post",
                "api/teacher/DoAppelByTeacher",
                this.datas
            );



        }
    }
};
</script>

<style>
.content-wrapper {
    background-color: #fafbfd;
}
.demo-upload-list {
    display: inline-block;
    width: 60px;
    height: 60px;
    text-align: center;
    line-height: 60px;
    border: 1px solid transparent;
    border-radius: 4px;
    overflow: hidden;
    background: #fff;
    position: relative;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    margin-right: 4px;
}
.demo-upload-list img {
    width: 100%;
    height: 100%;
}
.demo-upload-list-cover {
    display: none;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);
}
.demo-upload-list:hover .demo-upload-list-cover {
    display: block;
}
.demo-upload-list-cover i {
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    margin: 0 2px;
}
</style>
