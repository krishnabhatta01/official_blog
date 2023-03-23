import "./bootstrap";
import ViewUIPlus from "view-ui-plus";
import { createApp } from "vue";
import App from "./index.vue";
import router from "./router";
import common from "./common";


const app = createApp(App);

app.use(router);
app.use(ViewUIPlus);
app.mixin(common);

app.mount("#app");



/* window.Vue = require("vue");

Vue.component("header", require("./components/header.vue").default)

const app = new Vue({
    el: "#app",
    router
}) */
