import { createApp } from "vue";
import "./style.css";
import App from "./App.vue";
import $ from "jquery";
import { Button, Input, Menu, List, Select } from "ant-design-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";
import router from "./routes/index.js";

import axios from "axios";

window.axios = axios;
import { createPinia } from "pinia";
const pinia = createPinia();
const app = createApp(App);

app.use(List);
app.use(Button);
app.use(Select);
app.use($);
app.use(pinia);
app.use(router);
app.mount("#app");
