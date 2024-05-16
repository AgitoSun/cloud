import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import jQuery from 'jquery';
window.$ = jQuery;
window.jQuery = jQuery;

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/assets/img/favicon/favicon.png',
                'resources/assets/css/dashlite.css',
                // 'resources/js/bundle.js',
                // 'resources/js/scripts.js',
                // 'resources/assets/js/demo-settings.js',
                // 'resources/assets/js/apps/file-manager.js',
                // 'resources/assets/js/apps/file-modal.js',
            ],
            refresh: true,
        }),
    ],
    build: { chunkSizeWarningLimit: 1600, }
});
