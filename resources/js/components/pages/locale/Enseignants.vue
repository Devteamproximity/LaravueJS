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
					<div class="box-header bg-primary">
						<h4 class="box-title"> Liste des enseignants

                        </h4>

                        <span>
                                <router-link to="addenseignant">

                                    <button
                                                    type="button"
                                                    class="pull-right waves-effect btn  btn-primary mb-5"
                                                    @click="modal6 = true"
                                                >
                                                  <Icon type="md-person-add" />

                                                    Nouveau
                                                </button>

                                </router-link>

                            </span>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example" class="table simple mb-0" style="width:100%">
								<thead >


									<tr>
                                        <th>Nom</th>
										<th>Prenom</th>
										<th>Telephone</th>
										<th>E-mail</th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>

								    <tr  v-for="(data,  i) in Enseignants" :key="i">
										<td> {{data.nom}}</td>
									    <td> {{data.prenom}}</td>
										<td> {{data.tel}}</td>
										<td> {{data.email}}</td>
									   <td >



                                                <span class="btn btn-xs" style="background-color:#2D8CF0;color:white" title="Modifier"> <i class="ti-pencil"></i>   </span>


                                                <span class="btn btn-xs" style="background-color:red;color:white" title="Supprimer"> <i class="ti-trash"></i> </span>

                                                <router-link to="classeofTeacher">

                                                    <span @click="Voir(data,i)" class="btn btn-xs" style="background-color:gray;color:white" title="Voir les classes de cet enseignant"> <i class="ti-eye"></i>  </span>

                                                </router-link>



                                        </td>

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

            EtabInfos:'',

            data: {

            },


            Enseignants:[]

        };
    },



    methods: {


        Voir(data,i) {

             localStorage.setItem('Teacherdata', JSON.stringify(data));


        }

    },


     async mounted() {

        // Recuperer toutes les infos de cette ecole dans le storage

        if (localStorage.EtabInfos)  {

            this.EtabInfos= JSON.parse(localStorage.getItem("EtabInfos"));


        }

         // Recuperer toutes les enseigants de cette  ecole

         // Je rajoute les  information de l'ecole appartenant a l'utulisateur qui s'est logger a ma data qui ira dans l'api de creation de la session

                this.data.EcoleInfos = this.EtabInfos;

                const res = await this.callApi("post", "api/locale/getAllEnseignant", this.data);

                this.Enseignants =  res.data


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
