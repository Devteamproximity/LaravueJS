<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />

            <div class="content-wrapper" style="min-height: 653px; background-color:#FAFBFD">
                <div class="container-full">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <!-- /.box -->

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">
                                            <span> Liste des classes 
                                                <button style="margin-left: 650px;"
                                                    type="button"
                                                    class="waves-effect btn btn-outline btn-info mb-5"
                                                    @click="modal6 = true"
                                                >
                                                    <Icon type="md-add" />

                                                    Nouveau
                                                </button>
                                            </span>
                                        </h3>

                                        <!-- <h6 class="box-subtitle">
                                            Export data to Copy, CSV, Excel, PDF
                                            & Print
                                        </h6> -->
                                    </div>

                                    <!-- Modal pour ajouter une classe -->

                                    <Modal
                                        v-model="modal6"
                                        title="Ajouter une classe "
                                      
                                    >
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label"
                                                    >Nom de la classe
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    v-model.trim="
                                                            data.sigleClasse
                                                        "
                                                />
                                            </div>
                                        </div>

                    
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label">
                                                        Montant de la scolarité
                                                    </label>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        v-model.trim="
                                                            data.MontantScol
                                                        "
                                                    />
                                                </div>
                                        </div>


                                        <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label">
                                                        Montant de l'APE
                                                    </label>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        v-model.trim="
                                                            data.MontantScolAffect
                                                        "
                                                    />
                                                </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label"
                                                        >Frais
                                                        d'insription</label
                                                    >
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        v-model.trim="
                                                            data.FraisInscrip
                                                        "
                                                    />

                                                </div>
                                        </div>

                                            <br />
                                            <Upload
                                                multiple
                                                type="drag"
                                                action="api/admin/upload"
                                                :on-success="handleSuccess"
                                                :on-error="handleError"
                                                :format="['jpg', 'jpeg', 'png']"
                                                :max-size="2048"
                                                :on-format-error="
                                                    handleFormatError
                                                "
                                                :on-exceeded-size="
                                                    handleMaxSize
                                                "
                                                :headers="{
                                                    'X-Requested-With':
                                                        'XMLHttpRequest'
                                                }"
                                            >
                                                <div style="padding: 20px 0">
                                                    <Icon
                                                        type="ios-cloud-upload"
                                                        size="52"
                                                        style="color: #3399ff"
                                                    ></Icon>
                                                    <p class="text-center">
                                                        Cliquer ou glisser
                                                        deposer pour inserer
                                                        l'emploi du temps de la
                                                        classe
                                                    </p>
                                                </div>
                                            </Upload>

                                           
                                         <div slot="footer">
                                                <Button
                                                    type="primary"
                                                    size="large"
                                                    long
                                                    @click="Submit()"
                                                    >Enregistrer</Button
                                                >
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
                                                        
                                                        <th>Classes</th>
                                                        <th>Effectifs</th>
                                                        
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    name="fruit-table"
                                                    is="transition-group"
                                                >
                                                    <tr
                                                        v-for="(data,
                                                        i) in datas"
                                                        :key="i"
                                                    >


                                                        <td>
                                                           {{data.libelleClasse}}
                                                        </td>

                                                         <td>
                                                          56
                                                        </td>

                                                        <td >

                                                            <router-link to="matieres">

                                                                <span class="btn btn-xs" style="background-color:green;color:white" title="Ajouter une matiere ">
                                                                  <i class="ti-plus" @click="cloturer(data,i)"></i> 
                                                                </span>
                                                                
                                                            </router-link>
                                                            
                                                             <span class="btn btn-xs" style="background-color:blue;color:white" title="Modifier la classe">
                                                                <i class="ti-pencil"></i> 
                                                             </span>
                                                             <span class="btn btn-xs" style="background-color:red;color:white" title="Supprimer">
                                                                 <i class="ti-loop"></i> 
                                                            </span>

                                                            <span class="btn btn-xs" style="background-color:gray;color:white" title="Voir">
                                                                 <i class="ti-eye"></i> 
                                                            </span>

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
            UserData: [],
            BtnDisabled: "",
            EtabInfos:'',
            Modal: false,
            modal6: false,
            data: {
                sigleClasse:'',
                MontantScol:'',
                FraisInscrip:'',
                MontantScolAffect:'',
                imageEmploiTmp:''
            },

            datas:[],
            classeItem:"",
            visible: false,
            uploadList: []
        };
    },
    //  Recuperer les donnees envoyees dans la store par computed:
    computed: mapState(["datasUser"]),


    methods: {
        async handleRemove(file) {
            const image = this.data;

            this.data.imageLogo = "";

            this.$refs.uploads.clearFiles();

            try {
                await axios.post("api/admin/delateImage", image);
            } catch (e) {
                this.generalError = e.response.data.errors;
            }
        },

        handleView(name) {
            this.data.imageLogo = name;
            this.visible = true;
        },

        handleSuccess(res, file) {
            this.data.imageEmploiTmp = res;
            console.log(res);
        },

        handleError(res, file) {
            this.w("Selectionner un jpg, png ou jpeg.");
        },
        handleFormatError(file) {
            this.w("Selectionner un jpg, png ou jpeg");
        },
        handleMaxSize(file) {
            this.w("Selctionner un fichier de moins de 2M.");
        },

        handleBeforeUpload() {
            const check = this.uploadList.length < 1;
            if (!check) {
                this.w("Le logo est requi...");
            }
            return check;
        },
        async Submit() {
            
            if (this.data.sigleClasse.trim()=="") {

                 return this.e("Saisir un nom de la classe ");  
            } 

            if (this.data.FraisInscrip.trim()=="") {

                 return this.e("Saisir un chiffre pour  les frais d'incription ");  
            } 

            if (this.data.MontantScolAffect.trim()=="") {

                 return this.e("Saisir un chiffre le montant de la scolarite affecte");  
            } 

            if (this.data.MontantScol.trim()=="") {

                 return this.e("Saisir un chiffre le montant de la scolarite ");  
            } 

            if(this.data.imageEmploiTmp.trim()==''){

                 return this.e("Inserer l'emploi du temps");  
            }

             this.data.EcoleInfos = this.EtabInfos;

            const res = await this.callApi("post", "api/locale/Addclasse", this.data);

           if (res.status == 200) {

                    this.s("Classe ajoutée correctement");

                    this.modal6=false;

                    this.datas.unshift(res.data)

                  
                } else {
                    this.e("Une erreure est survenue");
                }
            
        },

       cloturer(data,i) {

           
            this.classeItem = data

            // Enregistrer les donnees du user dans le local storage 

              localStorage.setItem('classeItem', JSON.stringify(data));

            
        }
    },

     async mounted() {
        
        // Recuperer toutes les infos de cette ecole dans le storage

        if (localStorage.EtabInfos)  { 

            this.EtabInfos= JSON.parse(localStorage.getItem("EtabInfos"));

           
 
        }

         // Recuperer toutes les sessions de cette ecole

        const response2 = await this.callApi(
            "post",
            "api/locale/getClasseEtablissement",
             this.EtabInfos
        );

        this.datas = response2.data

        console.log(this.datas);
   
       
    }
    
}
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
