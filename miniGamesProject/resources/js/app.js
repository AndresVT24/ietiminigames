import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import './bootstrap';
import { createApp } from "vue";
import App from "../src/login.vue";

createApp(App).mount(".bodyLogin")
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
