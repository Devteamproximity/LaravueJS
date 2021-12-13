<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />

            <Modal
                width="860"
                v-model="modalVersement"
                title="Faire un versement  "
            >
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label"> Date </label>
                        <input
                            v-model="data.date"
                            type="datetime-local"
                            name=""
                            id=""
                            class="form-control"
                        />
                    </div>
                    <br />

                    <div class="col-md-6">
                        <label class="form-label"> Déposant </label>
                        <input
                            v-model="data.deposant"
                            type="text"
                            class="form-control"
                        />
                    </div>

                    <br />

                    <div class="col-md-6">
                        <label class="form-label"> Percepteur </label>
                        <input
                            v-model="data.percepteur"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <br />

                    <div class="col-md-6">
                        <label class="form-label">
                            Montant versé
                        </label>
                        <input
                            v-model="data.montantverse"
                            type="number"
                            class="form-control"
                        />
                    </div>

                    <br />

                    <div class="col-md-6">
                        <label for="" class="form-label">
                            Motif du versement
                        </label>
                        <select
                            v-model="data.motif"
                            class=" form-control required"
                        >
                            <option value="tranche1"> TRANCHE 1 </option>
                            <option value="tranche2"> TRANCHE 2 </option>
                            <option value="APE"> APE </option>
                        </select>
                    </div>
                    <br />

                    <div class="col-md-6">
                        <label for="" class="form-label">
                            Mode de versement
                        </label>
                        <select
                            v-model="data.mode"
                            class=" form-control required"
                        >
                            <option value="Mobile">Mobile</option>
                            <option value="Espace"> Espece </option>
                        </select>
                    </div>
                </div>

                <div slot="footer">
                    <Button type="primary" long @click="Submit()"
                        >Enregistrer</Button
                    >
                </div>
            </Modal>
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">FINANCES</h4>
                                        <span>
                                            <Button
                                                @click="showmodalVersement"
                                                class="pull-right"
                                                type="primary"
                                            >
                                                <Icon type="md-add" /> Versement
                                            </Button>
                                        </span>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- Nav tabs -->
                                        <div class="vtabs customvtab">
                                            <ul
                                                class="nav nav-tabs tabs-vertical"
                                                role="tablist"
                                            >
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link active"
                                                        data-toggle="tab"
                                                        href="#home3"
                                                        role="tab"
                                                        aria-expanded="true"
                                                        aria-selected="true"
                                                        ><span
                                                            class="hidden-sm-up"
                                                            ><i
                                                                class="ion-home"
                                                            ></i
                                                        ></span>
                                                        <span
                                                            class="hidden-xs-down"
                                                        >
                                                            Récapitulatifs
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link"
                                                        data-toggle="tab"
                                                        href="#profile3"
                                                        role="tab"
                                                        aria-expanded="false"
                                                        aria-selected="false"
                                                        ><span
                                                            class="hidden-sm-up"
                                                            ><i
                                                                class="ion-person"
                                                            ></i
                                                        ></span>
                                                        <span
                                                            class="hidden-xs-down"
                                                            >Versements</span
                                                        ></a
                                                    >
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link"
                                                        data-toggle="tab"
                                                        href="#messages3"
                                                        role="tab"
                                                        aria-expanded="false"
                                                        aria-selected="false"
                                                        ><span
                                                            class="hidden-sm-up"
                                                            ><i
                                                                class="ion-email"
                                                            ></i
                                                        ></span>
                                                        <span
                                                            class="hidden-xs-down"
                                                            >Détails</span
                                                        ></a
                                                    >
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div
                                                    class="tab-pane active"
                                                    id="home3"
                                                    role="tabpanel"
                                                    aria-expanded="true"
                                                >
                                                    <div class="p-65">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-4"
                                                            >
                                                                <div
                                                                    class="box"
                                                                >
                                                                    <div
                                                                        class="box-header bg-success"
                                                                        style="text-align: center;"
                                                                    >
                                                                        <p>
                                                                            <strong>
                                                                                TRANCHE 1
                                                                            </strong>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="box-body"
                                                                    >
                                                                        <div
                                                                            class="table-responsive"
                                                                        >
                                                                            <table
                                                                                class="table simple mb-0"
                                                                            >
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>

                                                                                            Totale
                                                                                            à
                                                                                            payer

                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700 font-Size-10"
                                                                                        >
                                                                                        {{InfoEleveParent.classe.scolarite_Classe}}

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                             Déja
                                                                                            payé
                                                                                        </td>
                                                                                        <td
                                                                                            class="font-weight-700 font-Size-10"
                                                                                        >

                                                                                        {{DaitlsFinancesEleve.tranche1}}

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="color: red;"
                                                                                        >

                                                                                            Restant
                                                                                        </td>
                                                                                        <td
                                                                                            style="color: red;"
                                                                                            class="font-weight-700 font-Size-10"
                                                                                        >

                                                                                         {{InfoEleveParent.classe.scolarite_Classe-DaitlsFinancesEleve.tranche1}}

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="col-md-4"
                                                            >
                                                                <div
                                                                    class="box"
                                                                >
                                                                    <div
                                                                        class="box-header bg-primary "
                                                                        style="text-align: center;"
                                                                    >
                                                                        <p>
                                                                            <strong>
                                                                               TRANCHE 2
                                                                            </strong>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="box-body"
                                                                    >
                                                                        <div
                                                                            class="table-responsive"
                                                                        >
                                                                            <table
                                                                                class="table simple mb-0"
                                                                            >
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Totale
                                                                                            à
                                                                                            payer
                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700 font-Size-10"
                                                                                        >
                                                                                            {{InfoEleveParent.classe.inscription_Classe}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Déja
                                                                                            payé
                                                                                        </td>
                                                                                        <td
                                                                                            class="font-weight-700 font-Size-10"
                                                                                        >

                                                                                            {{DaitlsFinancesEleve.tranche2}}

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="color: red;"
                                                                                        >
                                                                                            Restant
                                                                                        </td>
                                                                                        <td
                                                                                            style="color: red;"
                                                                                            class="font-weight-700 font-Size-10"
                                                                                        >
                                                                                         {{InfoEleveParent.classe.inscription_Classe-DaitlsFinancesEleve.tranche2}}

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div
                                                                class="col-md-4"
                                                            >
                                                                <div
                                                                    class="box"
                                                                >
                                                                    <div
                                                                        class="box-header "
                                                                        style="text-align: center;color:white;background-color:rgb(87, 59, 80)"
                                                                    >
                                                                        <p>
                                                                            <strong>
                                                                                APE
                                                                            </strong>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="box-body"
                                                                    >
                                                                        <div
                                                                            class="table-responsive"
                                                                        >
                                                                            <table
                                                                                class="table simple mb-0"
                                                                            >
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>

                                                                                            Totale
                                                                                            à
                                                                                            payer
                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700 font-Size-10"
                                                                                        >
                                                                                            {{InfoEleveParent.classe.reinscription_Classe}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>

                                                                                            Déja
                                                                                            payé
                                                                                        </td>
                                                                                        <td
                                                                                            class="font-weight-700 font-Size-10"
                                                                                        >
                                                                                            {{DaitlsFinancesEleve.ape}}

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="color: red;"
                                                                                        >
                                                                                           Restant
                                                                                        </td>
                                                                                        <td
                                                                                            style="color: red;"
                                                                                            class="font-weight-700 font-Size-10"
                                                                                        >

                                                                                         {{InfoEleveParent.classe.reinscription_Classe-DaitlsFinancesEleve.ape}}

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="tab-pane"
                                                    id="profile3"
                                                    role="tabpanel"
                                                    aria-expanded="false"
                                                >
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div
                                                                    class="box"
                                                                >
                                                                    <div
                                                                        class="box-header bg-primary"
                                                                    >
                                                                        <h4
                                                                            style="margin: auto;"
                                                                        >
                                                                            Historique
                                                                            des
                                                                            versements
                                                                        </h4>
                                                                    </div>
                                                                    <div
                                                                        class="box-body"
                                                                    >
                                                                        <div
                                                                            class="table-responsive"
                                                                        >
                                                                            <table
                                                                                id="example"
                                                                                class="table simple mb-0"

                                                                            >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            Jour
                                                                                        </th>
                                                                                        <th>
                                                                                            Motif

                                                                                        </th>
                                                                                        <th>
                                                                                            Déposant(e)
                                                                                        </th>
                                                                                        <th>
                                                                                            Recep..
                                                                                        </th>
                                                                                        <th>
                                                                                            Code

                                                                                        </th>
                                                                                        <th>
                                                                                            Type

                                                                                        </th>
                                                                                        <th>
                                                                                            Somme
                                                                                            versée
                                                                                        </th>
                                                                                        <th>

                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody  v-for="(data,  i) in VersementEleve" :key="i">
                                                                                    <tr>
                                                                                        <td>
                                                                                           {{data.date|dateFormatHeure}}                                                                                        </td>
                                                                                        <td>
                                                                                            {{data.motif}}
                                                                                        </td>
                                                                                        <td>
                                                                                           {{data.deposant}}
                                                                                        </td>
                                                                                         <td>
                                                                                           {{data.receptionneur}}
                                                                                        </td>
                                                                                        <td>
                                                                                           {{data.code}}
                                                                                        </td>
                                                                                        <td>
                                                                                           {{data.mode}}
                                                                                        </td>
                                                                                        <td>
                                                                                           {{data.montantverser}}

                                                                                        </td>
                                                                                        <td> <button @click="ParentEleve(data,i)" class="btn btn-circle btn-warning btn-xs" title="Imprimer le recu de ce versement ">
                                                                                            <Icon type="ios-print" /></button>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="tab-pane"
                                                    id="messages3"
                                                    role="tabpanel"
                                                    aria-expanded="false"
                                                >
                                                    <div class="p-35">

                                                    <div class="row">
                                                        <div
                                                            class="col-12"
                                                        >
                                                            <div
                                                                class="box box-widget widget-user"
                                                            >
                                                                <div
                                                                    class="box"
                                                                >
                                                                    <div
                                                                        class="box-header bg-primary "
                                                                        style="text-align: center;"
                                                                    >
                                                                        <h6
                                                                            class="box-title" style="color: white;"
                                                                        >
                                                                            <strong>
                                                                                INFORMATIONS UTILES
                                                                            </strong>
                                                                        </h6>
                                                                    </div>
                                                                    <div
                                                                        class="box-body"
                                                                    >
                                                                        <div
                                                                            class="table-responsive"
                                                                        >
                                                                            <table
                                                                                class="table simple mb-0"  style="width:650px;"
                                                                            >
                                                                                <tbody>

                                                                                    <tr>
                                                                                        <td>
                                                                                            Noms
                                                                                            et
                                                                                            prénoms
                                                                                        </td>
                                                                                        <td
                                                                                            class="bt-1  font-weight-900"
                                                                                        >
                                                                                            {{
                                                                                                InfoEleveParent.nom
                                                                                            }}
                                                                                            {{
                                                                                                InfoEleveParent.prenom
                                                                                            }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Classe
                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700"
                                                                                        >  {{InfoEleveParent.classe.libelleClasse}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date de naissance
                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700"
                                                                                        > {{InfoEleveParent.dateNaiss}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                              Matricule
                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700"
                                                                                        >
                                                                                           {{InfoEleveParent.matricule}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Noms et prénoms du parent
                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700"
                                                                                        >
                                                                                             {{InfoEleveParent.parent.nomParent}}  {{InfoEleveParent.parent.prenomParent}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                           Téléphone du parent
                                                                                        </td>
                                                                                        <td
                                                                                            class=" font-weight-700"
                                                                                        >
                                                                                            {{InfoEleveParent.parent.telParent}}
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
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

            IdClasseTeacher: [],
            InfosTeacher: [],
            parentEleveInfos: [],
            InfoEleveParent: [],
            modalVersement: false,
            VersementEleve:[],
            DaitlsFinancesEleve:[],

            data: {
                date: "",
                deposant: "",
                percepteur: "",
                montantverse: "",
                motif: "",
                mode: "",
                EleveInfos: ""
            }
        };
    },

    async mounted() {
        // Recuperer les donnes de cet utulisateurs dans la storage local

        if (localStorage.parentEleveInfos) {
            this.parentEleveInfos = JSON.parse(
                localStorage.getItem("parentEleveInfos")
            );
            console.log(this.parentEleveInfos);

            // Recuperer les donnees de l'enfant et de son parent

            const response2 = await this.callApi(
                "post",
                "api/locale/getEleveAndParentInfos",
                this.parentEleveInfos
            );

            this.InfoEleveParent = response2.data;

             // Recuperer les donnees de la finance pour cet enfant

            const response3 = await this.callApi(
                "post",
                "api/locale/getAstudentFinancesInfos",
                this.parentEleveInfos
            );

            this.VersementEleve = response3.data;

             // Recuperer les donnees des tranches 1 et 2 et APE   pour cet enfant

            const response4 = await this.callApi(
                "post",
                "api/locale/getAstudentDatailsFinancesInfos",
                this.parentEleveInfos
            );

            this.DaitlsFinancesEleve = response4.data;


        }
    },

    methods: {
        showmodalVersement() {
            this.modalVersement = true;
        },

        async Submit() {
            if (this.data.date.trim() == "") {
                return this.e("Saisir la date du versement ");
            }

            if (this.data.deposant.trim() == "") {
                return this.e(
                    "Mensionner le nom de la personne ayant fait le versement  "
                );
            }

            if (this.data.percepteur.trim() == "") {
                return this.e(
                    "Mensionner le nom de la personne ayant percu le versement  "
                );
            }

            if (this.data.montantverse.trim() == "") {
                return this.e("Mensionner le montant du  versement  ");
            }

            if (this.data.motif.trim() == "") {
                return this.e("Mensionner le motif du  versement  ");
            }

            if (this.data.mode.trim() == "") {
                return this.e("Mensionner le mode du  versement  ");
            }

            this.data.EleveInfos = this.parentEleveInfos;

            const res = await this.callApi(
                "post",
                "api/locale/addVersement",
                this.data
            );

            if (res.status == 200) {
                this.s("versement effectué correctement");
            } else {
                this.e("Une erreure est survenue");
            }
        }
    }
};
</script>
