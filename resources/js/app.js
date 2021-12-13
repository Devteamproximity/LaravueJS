require("./bootstrap");

window.Vue = require("vue").default;
import router from "./routers/router";
import ViewUI from "view-design";
import "view-design/dist/styles/iview.css";
import store from "./store";
import common from './common';
import moment from 'moment'


Vue.mixin(common);
Vue.use(ViewUI);
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

  Vue.filter('dateFormat', function (arg) {

    return moment(arg).format(' Do MMM YYYY')
  })
  Vue.filter('dateFormatHeure', function (arg) {

    return moment(arg).format(' Do MMM YYYY, h:mm:ss ')
  })


Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    router,
    store: store
});
