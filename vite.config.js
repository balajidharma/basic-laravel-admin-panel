import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                "resources/js/laravel-admin/app.js",
                "resources/js/laravel-admin/form-builder/field.js",
                "resources/css/laravel-admin/app.scss"
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
