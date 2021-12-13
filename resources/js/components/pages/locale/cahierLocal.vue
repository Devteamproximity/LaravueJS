<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <!-- <div type="light" closable class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    CAHIER DE TEXTE
                                    <p class="subtitle font-size-14 mb-0">
                                        Mentionner les titres des cours chaque
                                        semaine
                                    </p>
                                </h4>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">

                                  <select   @change="onChange($event)"

                                                v-model="data.classeName"
                                                class=" form-control required"
                                            >

                                                <option
                                                    v-for="(data, i) in classes"
                                                    :key="i"
                                                    :value="data.id"
                                                >
                                                    {{ data.libelleClasse}}
                                                </option>
                                 </select>
                                </div>
                            </div> <br><br><br>

                            <!-- <div class="col-md-6">

                                <div class="form-group"> <br>
                                  <Button
                                        type="primary"
                                         size="medium"
                                        @click="Tous"

                                        > <Icon type="ios-expand" /></Button
                                    >
                                </div>
                            </div> -->

                        </div>

                        <br><br>

                        <div class="row">
                            <div class="col-xl-4 col-12"  v-for="(data, i) in CahiersListes"
                                :key="i">
                                <div class="box">
                                    <div
                                        class="box-header bg-primary "
                                        style="text-align: center;"
                                    >
                                        <p class="box-title">
                                            <strong>
                                                Semaine ({{data.dateDeb | dateFormat}} - {{data.dateFin | dateFormat}}) <br>
                                                <span style="font-size:20px;" v-if="data.statut==0" @click="
                                                                        showPublierModal(data,i)
                                                                    "
                                                    >

                                                    <Icon

                                                        type="md-eye-off"
                                                        title="Cliquer ici pour publier "
                                                /></span>
                                                 <span style="font-size:20px;" v-if="data.statut==1"
                                                    >

                                                    <Icon
                                                        type="md-eye"

                                                /></span>
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table simple mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Classe</td>
                                                        <td
                                                            class=" font-weight-700 font-Size-10"
                                                        >
                                                            {{data.classe.libelleClasse}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Matiere
                                                        </td>
                                                        <td
                                                            class="font-weight-700 font-Size-10"
                                                        >

                                                           {{data.matiere.libelle}}

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <a  :href="
                                                    `/Photos/Logos/${data.document}`

                                                "
                                                :download="
                                                    data.classe.libelleClasse
                                                "
                                            ><button
                                                class="btn btn-primary btn-sm"
                                            >
                                                <Icon
                                                    type="md-download"
                                                />Télécharger  le cahier de texte hebdo..
                                            </button></a
                                        >



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
import MenuLocal from "../../navs/MenuLocal.vue";
import Chats from "../../navs/Chats.vue";
import { mapState } from "vuex";


export default {
    components: { Header,  Chats, MenuLocal },
    data() {
        return {

            ClassListes:[],
            CahiersListes:[],
            ClassesTeacher: [],
            LIbelleMatiereclasse:[],
            PosterModal: false,
            classes:[],
            data: {
                idCahier: "",
                imageEmploiTmp: "",
                dateDebut: "",
                dateFin: "",
                idMatiere: ""
            },

            PublierModal:false,
            delateModal:false,
            Item:'',
            i:-1

        };
    },

    async mounted() {

          if (localStorage.EtabInfos) {

            this.EtabInfos = JSON.parse(localStorage.getItem("EtabInfos"));
        }

         const response2 = await this.callApi(
            "post",
            "api/locale/getAllCahiersLocal",
            this.EtabInfos
        );

        this.CahiersListes = response2.data;


        const response3 = await this.callApi(
            "post",
            "api/locale/getClasseEtablissement",
            this.EtabInfos
        );

        this.classes = response3.data;
    },

    methods: {

        showPublierModal(data,i) {
            this.Item = data.id
            this.i = i
            console.log( this.Item);
            this.PublierModal = true;

        },

         ShowdelateModal(data,i) {
            this.Item = data.id
            this.i = i
            console.log( this.Item);
            this.delateModal = true;
        },

        // ModLe pour creer un nouveu cahier de texte

        showPostterModale() {

            this.PosterModal = true;
        },


        async onChange(event) {

             this.data.idCahier = event.target.value;

             console.log(  this.data.idCahier);

    if (localStorage.EtabInfos) {

            this.EtabInfos = JSON.parse(localStorage.getItem("EtabInfos"));
        }

        this.data.EtabInfos = this.EtabInfos

        const response = await this.callApi(
            "post",
            "api/locale/getAllCahiersLocalParClasse",
            this.data
        );

        this.CahiersListes = response.data;

        },

    }
};
</script>
