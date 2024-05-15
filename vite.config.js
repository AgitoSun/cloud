import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/assets/img/favicon/favicon.png',
                'resources/assets/css/dashlite.css',
                'resources/assets/css/theme.css',
                'resources/assets/js/bundle.js',
                'resources/assets/js/scripts.js',
                'resources/assets/js/demo-settings.js',
                'resources/assets/js/apps/file-manager.js',
                'resources/assets/js/apps/file-modal.js',
            ],
            refresh: true,
        }),
    ],
});
