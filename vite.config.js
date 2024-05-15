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
            ],
            refresh: true,
        }),
    ],
});
