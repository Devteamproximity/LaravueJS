<template>

<div>
<div class="wrapper">
<Header/>
<Menu/>
<div class="content-wrapper">
<div class="container-full">

<section class="content">

<div class="row align-items-end">
				<div class="col-xl-12 col-12">
					<div class="box bg-primary-light pull-up">
						<div class="box-body p-xl-0">
							<div class="row align-items-center">
								<div class="col-12 col-lg-3"><img src="https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/custom-14.svg" alt=""></div>
								<div class="col-12 col-lg-9">
									<h2>Hello {{$store.state.counter}}, Wdddelcome Back!</h2>
									<p class="text-dark mb-0 font-size-16">
										Your course Overcoming the fear of public speaking was completed by 11 New users this week!
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

</div>

</section>


</div>

</div>
</div>
<Chats/>

</div>
</template>

<script>

import Header from '../../headers/Header.vue';
import Menu from '../../navs/Menu.vue';
import Chats from '../../navs/Chats.vue';
import { mapState } from "vuex";

    export default {


        components:{Header,Menu,Chats},
        data() {
      return {
          UserData : []
      }
    },

            //  Recuperer les donnees envoyees dans la store par computed:
             //computed:mapState(["datasUser"]),

       async  mounted() {

           



        }

    }
</script>
