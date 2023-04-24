import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        { src: '~/plugins/ymapPlugin.js',  mode: 'client' },

        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/appAdmin.js'],
            refresh: true,
        }),
    ],
});
