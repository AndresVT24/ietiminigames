import './bootstrap';
import { createApp } from "vue";
import App from "../src/login.vue";
import header from "../src/HeaderComponent.vue";
import footer from "../src/FooterComponent.vue";
import memory from "../src/MemoryComponent.vue";

createApp(App).mount(".bodyLogin")
createApp(header).component('header-component', header).mount('#header');
createApp(footer).component('footer-component', footer).mount('#footer');
createApp(memory).component('memory-component', memory).mount('#game');
