<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuParent />
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
                            <div class="col-xl-4 col-12"  v-for="(data, i) in DevoirsListes"
                                :key="i">
                                <div class="box">
                                    <div
                                        class="box-header bg-primary "
                                        style="text-align: center;"
                                    >
                                        <p class="box-title">
                                            <strong>
                                                Semaine ({{data.dateDeb | dateFormat}} - {{data.dateFin | dateFormat}}) <br>
                                                <!-- <span style="font-size:20px;" v-if="data.statut==0" @click="
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

                                                /></span> -->
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
                                                />Télécharger  le cahier de texte hebdomadaire
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
import MenuParent from "../../navs/MenuParent.vue";
import Chats from "../../navs/Chats.vue";
import { mapState } from "vuex";


export default {

    components: { Header,  Chats, MenuParent },

   data() {
        return {
            data: {},
            datasEnfants: "",
            DevoirsListes: "",

        };
    },

    async mounted() {

        if (localStorage.datasEnfant) {

            this.datasEnfants = JSON.parse(localStorage.getItem("datasEnfant"));

        }

            const response = await this.callApi(
            "post",
            "api/parent/getAllCahierParentParClasse",
            this.datasEnfants
        );

        this.DevoirsListes = response.data;

        console.log(this.DevoirsListes);
    },

    methods: {


    }
};
</script>
