import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/views/images',
                'resources/views/js',
                'resources/views/fonts',
                'resources/views/css',
                'resources/views/images',
                'resources/views/scss',
            ],
            refresh: true,
        }),
    ],
});
