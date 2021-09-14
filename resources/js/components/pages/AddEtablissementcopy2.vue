<template>

<div>
<div class="wrapper">
<Header/>
<Menu/>
<div class="content-wrapper">
<div class="container-full">

<section class="content">

<form-wizard @on-complete="onComplete"
                      shape="tab"
                      color="#9b59b6">
            <tab-content title="Personal details"
                         icon="ti-user">
              <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
									<input type="text" class="form-control required" id="wfirstName2" name="firstName"> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
									<input type="text" class="form-control required" id="wlastName2" name="lastName"> </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="wemailAddress2"> Email Address : <span class="danger">*</span> </label>
									<input type="email" class="form-control required" id="wemailAddress2" name="emailAddress"> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="wphoneNumber2">Phone Number :</label>
									<input type="tel" class="form-control" id="wphoneNumber2"> </div>
							</div>
						</div>
            </tab-content>
            <tab-content title="Additional Info"
                         icon="ti-settings">
              My second tab content
            </tab-content>
            <tab-content title="Last step"
                         icon="ti-check">
              Yuhuuu! This seems pretty damn simple
            </tab-content>
        </form-wizard>

</section>


</div>

</div>
</div>
<Chats/>

</div>
</template>

<script>

import Header from '../headers/Header.vue';
import Menu from '../navs/Menu.vue';
import Chats from '../navs/Chats.vue';
import {FormWizard, TabContent} from 'vue-form-wizard';
import 'vue-form-wizard/dist/vue-form-wizard.min.css';

    export default {


        components:{
Header,
Menu,
Chats,
FormWizard,
TabContent},
        data() {
      return {
          UserData : [],
          props: {
  title: {
    type: String,
    default: 'Awesome Wizard'
  },
  subtitle: {
    type: String,
    default: 'Split a complicated flow in multiple steps'
  },
  nextButtonText: {
    type: String,
    default: 'Next'
  },
  backButtonText: {
    type: String,
    default: 'Back'
  },
  finishButtonText: {
    type: String,
    default: 'Finish'
  },
  stepSize: {
    type: String,
    default: 'md',
    validator: (value) => {
      let acceptedValues = ['xs', 'sm', 'md', 'lg']
      return acceptedValues.indexOf(value) !== -1
    }
  },
  /***
  *  Sets validation (on/off) for back button. By default back button ignores validation
  */
  validateOnBack: Boolean,
  /***
  * Applies to text, border and circle
  */
  color: {
    type: String,
    default: '#e74c3c' //circle, border and text color
  },
  /***
  *  Is set to current step and text when beforeChange function fails
  */
  errorColor: {
    type: String,
    default: '#8b0000'
  },
  /**
  * Can take one of the following values: 'circle|square|tab`
  */
  shape: {
    type: String,
    default: 'circle'
  },
  /**
  * name of the transition when transition between steps
  */
  transition: {
    type: String,
    default: '' //name of the transition when transition between steps
  },
  /***
  * Index of the initial tab to display
  */
  startIndex: {
    type: Number,
    default: 0
  }
}
      }
    },

       async  mounted() {
            console.log('Component mounted.');
            if (localStorage.getItem('UserData'))
            {
                let thedata = JSON.parse(localStorage.getItem('UserData'));
                // console.log(thedata.data.data);
                this.UserData=thedata.data.data;
                // let data=JSON.parse(thedata);
                // console.log(data);
            }

        },methods: {
    onComplete: function() {
      alert('Yay. Done!');
    }
  }
        /*,
    mounted(){
      console.log('App Mounted');
        // if (localStorage.getItem('UserData'))
        //     this.UserData = JSON.parse(localStorage.getItem('UserData'));

        //     console.log(this.UserData);
    }*/

    }
</script>
