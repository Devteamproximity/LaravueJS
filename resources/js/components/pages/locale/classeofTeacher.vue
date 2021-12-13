<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <div type="light" closable class="card" >
                            <div class="card-header">
                                <h4 class="card-title">
                                    CLASSES
                                    <p class="subtitle font-size-14 mb-0">
                                        Liste de toutes ses classes et matieres
                                    </p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-12" v-for="(data,  i) in ClassesTeacher" :key="i">
                                <div class="box">
                                    <div
                                        class="box-header bg-primary "
                                        style="text-align: center;"
                                    >
                                        <h4 class="box-title">
                                            <strong>
                                               {{data.classe.libelleClasse}}
                                            </strong>
                                        </h4>
                                    </div>

                                    <div class="box-footer">
                                        <p class="text-center"> {{data.libelle}} </p>
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
    components: { Header, MenuLocal, Chats },
    data() {
        return {
            Teacherdata: "",
            ClassesTeacher: []
        };
    },

    async mounted() {
        // Recuperer les donnes de cet utulisateurs dans la storage local

        if (localStorage.Teacherdata) {
            this.Teacherdata = JSON.parse(localStorage.getItem("Teacherdata"));


        }

        // Allons chercher la session et le code etablissement ce cet enseigant

        const response = await this.callApi(
            "post",
            "api/locale/getAllasseTeacherBylocale",
            this.Teacherdata
        );

        this.ClassesTeacher = response.data;


    }
};
</script>
