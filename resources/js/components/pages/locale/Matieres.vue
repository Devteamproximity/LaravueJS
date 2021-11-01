<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <div class="content-wrapper" style="background-color:'#CCC'">
                <div class="container-full">
                    <!-- Main content -->
                    <section class="content">
                        <!-- tabs -->

                        <div class="row">
                            <div class="col-12">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h4 class="box-title"> LISTE DES MATIERES DE LA  CLASSE  : {{ClasseInfos.libelleClasse}}</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">

                                        <Modal v-model="showDelateModal" width="360">
                                                <p slot="header" style="color:#f60;text-align:center">
                                                    <Icon type="ios-information-circle"></Icon>
                                                    <span> ATTENTION ! </span>
                                                </p>
                                                <div style="text-align:center">
                                                    <p> Etes vous sure de vouloir cloturer ce trimestre et activer le prochain  ?  </p> 
                                                    
                                                    
                                                </div>
                                                <div slot="footer">
                                                    <Button type="error" size="large" long  > Cloturer </Button>
                                                </div>
                                        </Modal>

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link active"
                                                    data-toggle="tab"
                                                    href="#home"
                                                    role="tab"
                                                >
                                                    <span class="hidden-sm-up">
                                                        <i class="ion-home"></i>
                                                    </span>
                                                    <span class="hidden-xs-down"
                                                        >Liste des matiéres 
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    data-toggle="tab"
                                                    href="#profile"
                                                    role="tab"
                                                >
                                                    <span class="hidden-sm-up">
                                                        <i
                                                            class="ion-person"
                                                        ></i>
                                                    </span>
                                                    <span class="hidden-xs-down"
                                                        >Ajouter une matière 
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    data-toggle="tab"
                                                    href="#messages"
                                                    role="tab"
                                                >
                                                    <span class="hidden-sm-up">
                                                        <i
                                                            class="ion-email"
                                                        ></i>
                                                    </span>
                                                    <span class="hidden-xs-down"
                                                        > Ajouter libellé</span
                                                    >
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div
                                            class="tab-content tabcontent-border"
                                        >
                                            <div
                                                class="tab-pane active"
                                                id="home"
                                                role="tabpanel"
                                            >

                                                     <section class="content">
                                                    <div
                                                        class="box box-default"
                                                    >
                                                        <div
                                                            class="box-header with-border"
                                                        >
                                                            
                                                        </div>

                                                        <div
                                                            class="box-body wizard-content"
                                                        >
                                                            <section>
                                                                <div
                                                                    class="row"
                                                                >
                                                                    <div
                                                                        class="table-responsive"
                                                                    >
                                                                        <table
                                                                            class="table table-striped table-bordered display"
                                                                        >
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        Périodes
                                                                                    </th>
                                                                                    <th>
                                                                                        Statut
                                                                                    </th>
                                                                                    <th>
                                                                                        Cloturer
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>

                                                                             <tbody>
                                                                                 
                                                                            </tbody>
                                                                           
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                </section>
                                               
                                            </div>
                                            
                                            <div class="tab-pane"  id="profile" role="tabpanel" >
                                            
                                                <section class="content">
                                                    <div
                                                        class="box box-default"
                                                    >
                                                        <div
                                                            class="box-header with-border"
                                                        >
                                                           
                                                        </div>

                                                        <div class="box-body wizard-content"  >
                                                            
                                                            <section>

                                                                


                                                                <div class="row" >

                                                                    <div class="col-md-6 col-sm-12"  >  
                                                                       
                                                                       <div
                                                                    class="row"
                                                                    style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;"
                                                                >
                                                                    <div
                                                                        class="col-md-12 col-sm-12"
                                                                    >

                                                                    <label >   Selectioner le libellé  cette matière  </label>

                                                                        <select 
                                                                            class="custom-select form-control required"
                                                                            v-model="
                                                                                data.matiere
                                                                            "
                                                                        >
                                                                             
                                                                            <option 

                                                                                v-for="(data,i) in Libelles" :key="i"
                                                                               
                                                                                > {{data.libelle}}</option
                                                                            >
                                                                            
                                                                        </select>
                                                                        
                                                                    </div>
                                                                </div>
                                                                            
                                                                    </div>         
                                                           
                                                                </div> <br>


                                                                <!-- <div class="row" >

                                                                    <div class="col-md-6 col-sm-12"  >  
                                                                       
                                                                       <div
                                                                    class="row"
                                                                    style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;"
                                                                >
                                                                    <div
                                                                        class="col-md-12 col-sm-12"
                                                                    >

                                                                    <label for=" ">   Selectionner la classe </label>
                                                                        <select
                                                                            class="custom-select form-control required"
                                                                            v-model="
                                                                                data.classe
                                                                            "
                                                                        >
                                                                            
                                                                           <option 

                                                                                v-for="(data,i) in Classes" :key="i"
                                                                               
                                                                                > {{data.libelleClasse}}</option
                                                                            >
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                            
                                                                    </div>         
                                                           
                                                                </div> <br> -->


                                                                <div class="row" >

                                                                    <div class="col-md-6 col-sm-12"  >  
                                                                       
                                                                       <div
                                                                    class="row"
                                                                    style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;"
                                                                >
                                                                    <div
                                                                        class="col-md-12 col-sm-12"
                                                                    >

                                                                    <label for=" ">  Mentionner le coéfficient de cette matière  </label>
                                                                        <input 
                                                                            type="number"
                                                                            class=" form-control required"
                                                                            v-model="
                                                                                data.coef
                                                                            "
                                                                        
                                                                            />
                                                                           
                                                                       
                                                                    </div>
                                                                </div>
                                                                            
                                                                    </div>         
                                                           
                                                                </div> <br>

                                                                 <div
                                                                        class="row"
                                                                    >
                                                                        <div
                                                                            class="col-md-6"
                                                                        >
                                                                            <input
                                                                                type="submit"
                                                                                class="btn btn-facebook"
                                                                                value="Enregistrer"
                                                                                @click="SaveMatiere"
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                

                                                            </section>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                </section>
                                            </div>

                                            <div class="tab-pane" id="messages" role="tabpanel" >

                                                 <section  class="content"  >
                                                   
                                                    <div
                                                        class="box box-default"
                                                    >
                                                        <div
                                                            class="box-header with-border"
                                                        >
                                                          
                                                        </div>

                                                        <div
                                                            class="box-body wizard-content"
                                                        >
                                                            
                                                                <!-- Step 1 -->

                                                                <section >
                                                                    <div
                                                                        class="row" style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;"
                                                                    >
                                                                        <div class="col-md-6 col-sm-12"
                                                                            
                                                                        >
                                                                            <div
                                                                                class="form-group"
                                                                            >
                                                                                <label for=""> Libellé </label>
                                                                                
                                                                                <input
                                                                                    
                                                                                    type="text"
                                                                                    class="form-control required"
                                                                                    v-model="
                                                                                        data.libelle
                                                                                    "
                                                                                />
                                                                                
                                                                            </div>
                                                                        </div>

                                                                    </div> <br>

                                                                    <div
                                                                        class="row"
                                                                    >
                                                                        <div
                                                                            class="col-md-6"
                                                                        >
                                                                            <input
                                                                                type="submit"
                                                                                class="btn btn-facebook"
                                                                                value="Enregistrer"
                                                                                @click="send"
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                           
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                </section>
                                                
                                               
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
               
                libelle:"",
                matiere:"",
                classe:"",
                coef:""
            },
            Libelles:[],
            Classes :[],
            showDelateModal:false,
            classeItem:'',
            users: [],
            sessions: [],
            ClasseInfos: [],
            success: "badge badge-success",
            EtabInfos:[]
        };
    },
    
    methods: {


      async send() {


            if (this.data.libelle.trim()=="") {

                 return this.e("Saisir un libelle ");  
            } 

            else {

                // Cas  valide

                // Je rajoute les  information de l'ecole appartenant a l'utulisateur qui s'est logger a ma data qui ira dans l'api de creation du libelle                                   

                this.data.ClasseInfos = this.ClasseInfos;
               
                const response = await this.callApi(
                    "post",
                    "/api/locale/addLibelle",
                    this.data
                );
                if (response.status == 200) {
                    this.s("Libelle ajouté correctement");
                    this.$router.go();
                } else {
                    this.e("Une erreure est survenue");
                }

        }
     },


      async SaveMatiere() {



             if (this.data.matiere.trim()=="") {

                 return this.e("Selectionner un enseignant  ");  
            } 

            if (this.data.coef.trim()=="") {

                 return this.e("Saisir le coefficient cette  matiere");  
            } 

            else {

                // Cas  valide ou tous les champs sont remplis 

                // Je rajoute les  information de la classe de l'ecole  appartenant a l'utulisateur qui s'est logger a ma data qui ira dans l'api de creation de la matiere                                  

                this.data.ClasseInfos = this.ClasseInfos;
               
                const response = await this.callApi(
                    "post",
                    "/api/locale/addMatiere",
                    this.data
                );
                if (response.status == 200) {
                    this.s("Matiere  ajoutée correctement");
                     // this.$router.go();
                } else {
                    this.e("Une erreure est survenue");
                }

        }
     },

       
   },

    async mounted() {
        
        // Recuperer toutes les infos de cette ecole dans le storage

        if (localStorage.EtabInfos)  { 

            this.EtabInfos= JSON.parse(localStorage.getItem("EtabInfos"));

           
 
        }

         // Recuperer toutes les infos de cette ecole  dans le storage

        if (localStorage.classeItem)  { 

            this.ClasseInfos= JSON.parse(localStorage.getItem("classeItem"));
 
        }


        // Recuperer les libelles de toutes les matieres au chargement de la page 


        // Je rajoute les  information de la classe de l'ecole  appartenant a l'utulisateur qui s'est logger a ma data qui ira dans l'api de creation de la matiere                                  

            this.data.ClasseInfos = this.ClasseInfos;


        const response2 = await this.callApi(

                    "post",
                    "/api/locale/getLibelles", 
                    this.data
                   
                )
            this.Libelles = response2.data


        //   // Recuperer les libelles de toutes les classe de cette ecole  au chargement de la page 


        // const response3 = await this.callApi(

        //             "post",
        //             "/api/locale/getClasses", 
        //             this.data
                   
        //         )
        //     this.Classes = response3.data

       
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
