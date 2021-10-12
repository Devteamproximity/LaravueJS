<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <br /><br /><br />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h4 class="box-title text-info">
                                    <i class="ti-home mr-15"></i>
                                    Formulaire de création de la session
                                </h4>
                            </div>

                            <div class="box-body wizard-content">
                                <form
                                    action="#"
                                    class=""
                                    @submit.prevent="onSubmit"
                                >
                                    <!-- Step 1 -->

                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle3">
                                                        Année scolaire
                                                    </label>
                                                    <span class="danger"
                                                        >*</span
                                                    >
                                                    <input
                                                        placeholder="Exemple : 2019-2020"
                                                        type="text"
                                                        class="form-control required"
                                                        v-model="
                                                            data.AnneeScolaire
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data
                                                                .AnneeScolaire
                                                                .required &&
                                                                $v.data
                                                                    .AnneeScolaire
                                                                    .$dirty
                                                        "
                                                    >
                                                        Annee scolaire requise
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle3">
                                                        Date de début
                                                    </label>
                                                    <span class="danger"
                                                        >*</span
                                                    >
                                                    <input
                                                        type="date"
                                                        class="form-control required"
                                                        v-model="data.dateDebut"
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.dateDebut
                                                                .required &&
                                                                $v.data
                                                                    .dateDebut
                                                                    .$dirty
                                                        "
                                                    >
                                                        La date de debut est
                                                        requise
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle3">
                                                        Date de la fin
                                                    </label>
                                                    <span class="danger"
                                                        >*</span
                                                    >
                                                    <input
                                                        type="date"
                                                        class="form-control required"
                                                        v-model="data.dateFin"
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.dateFin
                                                                .required &&
                                                                $v.data.dateFin
                                                                    .$dirty
                                                        "
                                                    >
                                                        La date de la fin est
                                                        requise
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle3">
                                                        Type de session
                                                    </label>

                                                    <div>
                                                        <RadioGroup
                                                            v-model="
                                                                data.buttonType
                                                            "
                                                            type="button"
                                                            button-style="solid"
                                                        >
                                                            <Radio
                                                                label="Trimestre"
                                                            ></Radio>
                                                            <Radio
                                                                label="Semestre"
                                                            ></Radio>
                                                        </RadioGroup>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input
                                                    type="submit"
                                                    class="btn btn-facebook"
                                                    value="Enregistrer"
                                                />
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                            <!-- /.box-body -->
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
    components: { Header, MenuLocal, Chats },
    data() {
        return {
            data: {
                AnneeScolaire: "",
                dateDebut: "",
                dateFin: "",
                buttonType: "Trimestre",
            },

            users:[],
        };
    },

    computed: mapState(["datasUser"]),

    validations: {
        data: {
            AnneeScolaire: {
                required
            },
            dateDebut: {
                required
            },
            dateFin: {
                required
            }
        }
    },

    methods: {
        async onSubmit() {
            this.$v.$touch();

            if (this.$v.$invalid) {
                // Cas du  Formulaire non valide

                console.log("Errorrrrr sur le formulaire ");
            } else {


                // Cas du Formulaire  valide

                // Je recupere les information de l'ecole appartenant a l'utulisateur qui s'est logger 

                this.data.EcoleInfos = this.EtabInfos
                console.log(this.data);
                const response = await this.callApi(
                    "post",
                    "/api/locale/addSession",
                    this.data
                );
            }
        }
    },

    async mounted() {

        const response = await this.callApi("get", "api/locale/getEtabinfos");

        this.EtabInfos = response.data;

        if (localStorage.users) {
            this.users = JSON.parse(localStorage.getItem("users"));
        }
    }
};
</script>

<style>
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
