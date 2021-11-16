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
						<h4 class="box-title"> Liste des parents
                            <span>
                                <router-link to="addParent">

                                    <button style="margin-left: 650px;"
                                                    type="button"
                                                    class="btn btn-outline btn-info mb-5"
                                                    @click="modal6 = true"
                                                >
                                                    <Icon type="md-person-add" />

                                                    Nouveau
                                                </button>

                                </router-link>

                            </span>
                        </h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table   id="example"
                                     class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable"
                                    style="width:100%">

								<thead >

									<tr>
										<th>Nom</th>
										<th>Prenom</th>
										<th>Telephone</th>
										<th>Email</th>
                                        <th>Profession </th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>

									<tr v-for="(data,i) in datas" :key="i">
										<td>{{data.nomParent}}</td>
										<td>{{data.prenomParent}}</td>
										<td>{{data.telParent}}</td>
										<td>{{data.emailParent}}</td>
                                        <td>{{data.professionParent}}</td>
                                        <td style="text-align:center" class="center">
                                                <span class="btn btn-xs" style="background-color:green;color:white" title="">
                                                    <i class="ti-pencil"></i>
                                                </span>
                                                <span class="btn btn-xs" style="background-color:red;color:white" title="">
                                                    <i class="ti-trash"></i>
                                                </span>

                                                <router-link to="enfantsParent">
                                                    <span class="btn btn-xs" style="background-color:gray;color:white" title="Voir ses enfants">
                                                    <i class="ti-eye"></i>
                                                </span>

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
            UserData: [],
            EtabInfos:'',

            data: {
                sigleClasse:'',
                MontantScol:'',
                FraisInscrip:'',
                MontantScolAffect:'',
                imageEmploiTmp:''
            },

            datas:[]

        };
    },



    methods: {

    },

     async mounted() {

        // Recuperer toutes les infos de cette ecole dans le storage

        if (localStorage.EtabInfos)  {

            this.EtabInfos= JSON.parse(localStorage.getItem("EtabInfos"));
        }

        // Recuperer tous les parents de cette ecole

       const response2 = await this.callApi(
            "post",
            "api/locale/getParent",
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
