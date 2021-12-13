<template>

  <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <!-- START Card With Image -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> LISTING DES ABSENCES

                                </h4>

                            </div>
                        </div>



                            <div class="row">

                                         <div class="col-md-6">


                                           <div class="form-group">

                                            <label for=""> Classe </label>

                                            <select name="LeaveType" @change="onChange($event)" class="form-control" v-model="keyword">

                                                <option

                                                     v-for="(data, i) in ClasseListes "
                                                    :key="i"
                                                    :value="data.id"

                                                >  {{ data.libelleClasse }}</option>

                                            </select>

                                           </div>


                                       </div>


                                       <div class="col-md-6">


                                           <div class="form-group">

                                            <label for=""> Elève </label>

                                            <select @change="onChange2($event)" v-model="keyword2"

                                                class="custom-select form-control required"
                                            >
                                            <option value=""> Selectionner un élève </option>
                                                <option
                                                    v-for="(data, i) in EleveListes"
                                                    :key="i"
                                                    :value="data.id"
                                                >
                                                    {{ data.nom }}   {{ data.prenom }}

                                            </option>

                                            </select>
                                           </div>


                                       </div>

                         </div>

                         <div class="row">
                             <div class="col-md-6">

                                  <div class="form-group">

                                 <button @click="Afficher" class="btn btn-primary"> Récapitulatif  </button>


                                  </div>

                             </div>

                         </div>
                         <br>
                         <br>
                         <br>

                         <div class="row"  v-if="showRecap==true">

                            <div class="col-12">
                                <!-- /.box -->

                                <div class="box">
                                    <div class="box-header bg-primary">
                                        <h4
                                            class="box-title"
                                            style="margin:auto"
                                        >
                                           Total :

                                                <span style="font-size: 20px;"> {{TotalHeure}}</span> heure(s) d'absence


                                        </h4>
                                    </div>


                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table
                                                id="example"
                                                class="table simple mb-0"
                                                style="width:100%"
                                            >
                                                <thead>
                                                    <tr>
                                                        <th> Jours </th>
                                                        <th> Heures</th>
                                                        <th> Matieres</th>
                                                        <th> Durée du cour </th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    name="fruit-table"
                                                    is="transition-group"
                                                >
                                                    <tr
                                                        v-for="(data,
                                                        i) in ElevesAbsences"
                                                        :key="i"
                                                    >
                                                        <td>
                                                            {{
                                                                data.date|dateFormat
                                                            }}
                                                        </td>

                                                        <td>
                                                            {{
                                                                data.heure
                                                            }}
                                                        </td>

                                                         <td>
                                                            {{
                                                                data.matiere
                                                            }}
                                                        </td>

                                                        <td>
                                                            {{
                                                               data.duree
                                                            }} heure(s)
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

            data:{


          idClasse:"",
          idEleve:"",


            },

          keyword: "",
          keyword2:"",
          ClasseListes:"",
          EleveListes:"",
          ElevesAbsences:"",
          TotalHeure:0,
          showRecap:false

        };
    },


 async mounted() {


        if (localStorage.EtabInfos) {
            this.EtabInfos = JSON.parse(localStorage.getItem("EtabInfos"));
        }

        // Allons chercher la session et le code etablissement ce cet enseigant

        const response2 = await this.callApi(
            "post",
            "api/locale/getClasseEtablissement",
            this.EtabInfos
        );

        this.ClasseListes = response2.data;


    },

    methods: {

        async onChange(event) {

            this.data.idClasse = event.target.value;

              // Recuperer tous les eleves de cette classe

            const response3 = await this.callApi(
            "post",
            "api/locale/getEleveclasseById",this.data
         );

         this.EleveListes = response3.data

        },


        async onChange2(event) {

            this.data.idEleve = event.target.value;

        },

       async  Afficher() {

           this.showRecap=true

            this.TotalHeure=0;

             const response4= await this.callApi(
            "post",
            "api/locale/getAbensesOfEleveclasseById",this.data
         );

         this.ElevesAbsences = response4.data


         for(let i=0;i<this.ElevesAbsences.length;i++){


                this.TotalHeure = this.TotalHeure + parseInt(this.ElevesAbsences[i].duree)

         }


        }


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
