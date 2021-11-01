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
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title"> Liste des enseignants
                            <span>  
                                <router-link to="addenseignant">

                                    <button style="margin-left: 650px;"
                                                    type="button"
                                                    class="waves-effect btn btn-outline btn-info mb-5"
                                                    @click="modal6 = true"
                                                >
                                                    <Icon type="md-add" />

                                                    Nouveau
                                                </button>

                                </router-link>
                                                
                            </span>
                        </h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									
									<tr>
										<th>Nom</th>
										<th>Prenom</th>
										<th>Telephone</th>
										<th>E-mail</th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td>Gavin Cortez</td>
										<td>Team Leader</td>
										<td>San Francisco</td>
										<td>22</td>
										<td>2008/10/26</td>
										
									</tr>
						
									
				
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
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
