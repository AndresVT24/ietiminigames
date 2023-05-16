import './bootstrap';
import { createApp } from "vue";
import header from "../src/HeaderComponent.vue";
import footer from "../src/FooterComponent.vue";
import memory from "../src/MemoryComponent.vue";
import mind from "../src/MindBreakerComponent.vue";

createApp(header).component('header-component', header).mount('#header');
createApp(footer).component('footer-component', footer).mount('#footer');
createApp(memory).component('memory-component', memory).mount('#game');
createApp(mind).component('mind-breaker-component', mind).mount('#game2');
