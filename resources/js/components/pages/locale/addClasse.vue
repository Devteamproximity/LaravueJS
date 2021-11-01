<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
        
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <!-- /.box -->

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">

                                            Ajouter une classe 
                                                     <router-link to="addetablissement">

                                                        <button
                                                           type="button"  class="waves-effect btn btn-outline btn-info mb-5"
                                                        
                                                        > 

                                                           <Icon type="md-add" />  

                                                            Nouveau 

                                                        </button>
                                                             
                                                     </router-link>
                                                                
                                        </h3>
                                           
                                      
                                        <!-- <h6 class="box-subtitle">
                                            Export data to Copy, CSV, Excel, PDF
                                            & Print
                                        </h6> -->
                                    </div>

                                        <Modal v-model="showDelateModal" width="360">
                                                <p slot="header" style="color:#f60;text-align:center">
                                                    <Icon type="ios-information-circle"></Icon>
                                                    <span> Suppression ! </span>
                                                </p>
                                                <div style="text-align:center">
                                                    <p> Etes vous sure de voulor supprimer ?  </p>
                                                    
                                                </div>
                                                <div slot="footer">
                                                    <Button type="error" size="large" long  @click="delateSchool">Confirmer</Button>
                                                </div>
                                        </Modal>

                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        
                                        <div class="table-responsive">
                                            <table
                                                id="example"
                                                class="table table-bordered table-striped"
                                                style="width:100%"
                                            >
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Logo</th>
                                                         <th>Pays</th>
                                                        <th>Ville</th>
                                                        <th>Adresse</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody name="fruit-table" is="transition-group">
                                                    <tr
                                                        v-for="(data,
                                                        i) in datas"
                                                        :key="i"
                                                    >
                                                
                
                                                       <td>
                                                            {{ data.libelleEtab }}
                                                        </td>
                                                          <td>

                                                              <div class="text-center">

                                                                   <img
                                                                   style="width:50px"  
                                                                   :src=" `/Photos/Logos/${data.logoEtab}` " 
                                                                   />
                                                           

                                                              </div>

                                                            
                                                
                                                         
                                                        </td>

                                                        <td>
                                                            {{ data.paysEtab }}
                                                        </td>
                                                        <td>
                                                            {{ data.villeEtab }}
                                                        </td>

                                                        <td>
                                                            {{
                                                                data.adresseEtab
                                                            }}
                                                        </td>

                                                        <td>
                                                            <button
                                                                type="button"
                                                                @click="
                                                                    updataSchool(
                                                                        data,
                                                                        i
                                                                    )
                                                                "
                                                                class="waves-effect waves-light btn btn-outline btn-info mb-5"
                                                            >
                                                                Modifier
                                                            </button>

                                                            <button
                                                                type="button"
                                                                @click="
                                                                   showDelatingModal(data,i)
                                                                "
                                                                class="waves-effect waves-light btn btn-outline btn-danger mb-5"
                                                            >
                                                                Supprimer
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->
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
                buttonType: "Trimestre"
            },

            users: [],
            sessions:[],
            EtabInfos:[],
            trimestres:[],
            success:'badge badge-success'
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

                // Je rajoute les  information de l'ecole appartenant a l'utulisateur qui s'est logger a ma data qui ira dans l'api de creation de la session

                this.data.EcoleInfos = this.EtabInfos;
                console.log(this.data);
                const response = await this.callApi(
                    "post",
                    "/api/locale/addSession",
                    this.data
                );
                if (response.status == 200) {
                    this.s("Session ajoutée correctement");
                } else {
                    this.e("Une erreure est survenue");
                }
            }
        }
    },

    async mounted() {


    
        // Recuperer toutes les infos de cette ecole 

        const response = await this.callApi("get", "api/locale/getEtabinfos");

        this.EtabInfos = response.data;

        if (localStorage.users) {

            this.users = JSON.parse(localStorage.getItem("users"));
        }

        // Recuperer toutes les sessions de cette ecole 

        const response2 = await this.callApi("post", "api/locale/getSessionEtablissement", this.EtabInfos);

          this.sessions=  response2.data

          console.log(this.sessions);

        // Recuperer toutes les trimestres  de cette ecole 

        const response3 = await this.callApi("post", "api/locale/getTrimestreEtablissement", this.EtabInfos);

        this.trimestres =  response3.data

        console.log(this.trimestres);

        
    },

};
</script>

<style>

.content-wrapper{
    background-color: #FAFBFD
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
