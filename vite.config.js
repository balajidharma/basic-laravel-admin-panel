import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                "resources/js/vendor/laravel-admin/admin/app.js",
                "resources/js/vendor/laravel-admin/form-builder/field.js",
                "resources/css/vendor/laravel-admin/admin/app.scss"
            ],
            refresh: true,
        }),
    ],
});
