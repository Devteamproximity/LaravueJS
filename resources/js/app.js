require("./bootstrap");

window.Vue = require("vue").default;
import router from "./routers/router";
import ViewUI from "view-design";
import "view-design/dist/styles/iview.css";
import store from "./store";
import common from './common';
Vue.mixin(common);
Vue.use(ViewUI);
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    router,
    store: store
});
