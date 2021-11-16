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
                                    <div class="box-header with-border" style="margin:auto;">
                                        <h2 class="box-title center" >

                                                 {{data.classeId.libelleClasse}}

                                                 <router-link to="inscriptionEleve">

                                                    <button style="margin-left: 450px;"
                                                            type="button"
                                                            class="waves-effect btn btn-outline btn-info mb-5"

                                                            >
                                                            <Icon type="md-add" />

                                                            Nouveau
                                                    </button>

                                                 </router-link>

                                                 <router-link to="inscriptionEleve">

                                                    <button style="margin-left:0px;"
                                                            type="button"
                                                            class="waves-effect btn btn-outline btn-warning mb-5"

                                                            >
                                                            <Icon type="ios-print-outline" />

                                                            Liste en pdf
                                                    </button>

                                                 </router-link>

                                        </h2>


                                    </div>

                                    <!-- Modal pour ajouter une classe -->


                                    <!-- /.box-header -->
                                    <div class="box-body">


                                        <div class="table-responsive">
                                            <table
                                                id="example"
                                                class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable"
                                                style="width:100%"
                                            >
                                                <thead >
                                                    <tr >

                                                        <th> Photo </th>
                                                        <th> Noms </th>
                                                        <th>Prénoms</th>
                                                        <th> Matricule </th>
                                                        <th> Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    name="fruit-table"
                                                    is="transition-group"
                                                >
                                                   <tr  v-for="(data,
                                                        i) in classeListe"
                                                        :key="i">
                                                       <td>
                                                           <img :src="`/Photos/Logos/${data.user.photo}` "

                                                             style="width:50px;height:50px"
                                                             />

                                                        </td>
                                                       <td> {{data.nom}}</td>
                                                       <td>{{data.prenom }}</td>
                                                       <td>{{data.matricule }}</td>
                                                       <td>{{data.email }}</td>
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

            data : {
                classeId:'',
            },
            classeListe:[],
            EtabInfos:[]
        };
    },


    methods: {




    },

     async mounted() {

        // Recuperer les infos de cette classe  dans le storage. classdId  contient toutes les classes et leur eleves respectivement


        if (localStorage.classeId)  {

            this.data.classeId = JSON.parse(localStorage.getItem("classeId"));

        }

        // Recuperer tous les eleves de cette classe

        const response2 = await this.callApi(
            "post",
            "api/locale/getEleveclasse",
             this.data
        );

        this.classeListe = response2.data

        console.log( this.classeListe);




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
