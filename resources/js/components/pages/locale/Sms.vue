<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
		  <div class="row">
			<div class="col-12">

			  <!-- /.box -->

			  <div class="box">
				<div class="box-header">
				  <h4 class="box-title"> Message <br>

				  </h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <form>

                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for=""> Object du message </label>

                                           <input
                                                type="text"
                                                class="form-control required"
                                                 v-model="data.siteInternetEtablissement"


                                            />
                                </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for=""> Destinataires </label>

                                           <input
                                                type="text"
                                                readonly
                                                class="form-control required"
                                                value="PARENTS"


                                            />
                                </div>
                          </div>
                      </div>
					<textarea class="textarea" placeholder="Ecrire votre message  ici "
							  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

					</textarea> <br> <p></p>

                    <Button type="primary" size="large" icon="ios-paper-plane" >Envoyer</Button>

				  </form>
				</div>
			  </div>
			  <!-- /.box -->

			</div>
			<!-- /.col-->
		  </div>
		  <!-- ./row -->
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
            UserData: [],

            data: {



            },

            EtabInfos:"",

        };
    },


     async mounted() {

        // Recuperer toutes les infos de cette ecole dans le storage

        if (localStorage.EtabInfos)  {

            this.EtabInfos= JSON.parse(localStorage.getItem("EtabInfos"));
        }


    },

    methods: {



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
