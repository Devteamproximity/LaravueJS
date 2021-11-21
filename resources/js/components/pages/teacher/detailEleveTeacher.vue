<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuTeacher />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                         <Alert type="light" closable class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                           INFORMATIONS
                                            <p
                                                class="subtitle font-size-14 mb-0"
                                            >
                                                Informations details sur cet eleve et son parent
                                            </p>
                                        </h4>
                                    </div>
                                </Alert>

                        <div class="row">
                            <div class="col-xl-6 col-12">
                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div
                                        class="widget-user-header bg-black"
                                        style="background: url('/Photos/Logos/10.jpg') center center;"
                                    >
                                        <h3 class="widget-user-username">
                                            {{InfoEleveParent.nom}}  {{InfoEleveParent.prenom}}
                                        </h3>

                                    </div>
                                    <div class="widget-user-image">
                                        <img
                                            class="rounded-circle"
                                            :src="
                                                     `/Photos/Logos/${InfoEleveParent.user.photo}`
                                                "

                                            alt="User Avatar"
                                        />
                                    </div> <br>
                                     <div class="table-responsive">
                                                <table
                                                    class="table simple mb-0"
                                                >
                                                    <tbody> <br><br>

                                                         <tr>
                                                            <td>
                                                               Classe
                                                            </td>
                                                            <td
                                                                class="font-weight-700"
                                                            >
                                                               {{InfoEleveParent.classe.libelleClasse}}
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                            <td>
                                                                Matricule
                                                            </td>
                                                            <td
                                                                class="font-weight-700"
                                                            >
                                                               {{InfoEleveParent.matricule}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Date de
                                                                naissance
                                                            </td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                               {{InfoEleveParent.dateNaiss}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Lieu de
                                                                naissance
                                                            </td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                                 {{InfoEleveParent.lieuNaiss}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Email
                                                            </td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                               {{InfoEleveParent.email}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Statut</td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                                 {{InfoEleveParent.doublant}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bt-1">
                                                                Sexe
                                                            </th>
                                                            <th
                                                                class=" font-weight-700"
                                                            >
                                                                 {{InfoEleveParent.sexe}}
                                                            </th>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                </div>

                            </div>

                            <div class="col-xl-6 col-12">
                                <div class="box box-widget widget-user">
                                    <div class="box">
                                        <div
                                            class="box-header bg-primary "
                                            style="text-align: center;"
                                        >
                                            <h4 class="box-title">
                                                <strong>
                                                    PARENT
                                                </strong>
                                            </h4>
                                        </div>

                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table
                                                    class="table simple mb-0"
                                                >
                                                    <tbody>
                                                        <br> <br><br>
                                                        <tr>
                                                            <td>
                                                                Noms et prénoms
                                                            </td>
                                                            <td
                                                                class="bt-1  font-weight-900"
                                                            >
                                                              {{InfoEleveParent.parent.nomParent}}   {{InfoEleveParent.parent.prenomParent}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nationalité</td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                               {{InfoEleveParent.parent.nationalite}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                CNI
                                                            </td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                                {{InfoEleveParent.parent.cni}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Email
                                                            </td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                                 {{InfoEleveParent.parent.emailParent}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Telephone</td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                                {{InfoEleveParent.parent.telParent}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Profession
                                                            </td>
                                                            <td
                                                                class=" font-weight-700"
                                                            >
                                                               {{InfoEleveParent.parent.professionParent}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bt-1">
                                                                Addresse
                                                            </th>
                                                            <th
                                                                class=" font-weight-700"
                                                            >
                                                               {{InfoEleveParent.parent.addressParent}}
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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

export default {
    components: { Header, MenuTeacher, Chats },
    data() {
        return {

            IdClasseTeacher: [],
            InfosTeacher: [],
            parentEleveInfosTeacher:[],
            InfoEleveParent:[],

        };
    },

    async mounted() {
        // Recuperer les donnes de cet utulisateurs dans la storage local

        if (localStorage.parentEleveInfosTeacher) {

            this.parentEleveInfosTeacher = JSON.parse(localStorage.getItem("parentEleveInfosTeacher"));
            console.log(this.parentEleveInfosTeacher);

             // Recuperer les donnees de l'enfant et de son parent

        const response2 = await this.callApi(
            "post",
            "api/teacher/getEleveAndParentInfosTeacher",
             this.parentEleveInfosTeacher
        );

        this.InfoEleveParent = response2.data

        }






    },

    methods: {

        }


};
</script>
