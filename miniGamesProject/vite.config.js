import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
const VuePlugin = require('@vitejs/plugin-vue');
export default defineConfig({
    plugins: [
        VuePlugin(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
