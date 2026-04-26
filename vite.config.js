import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/file_download.js',
                'resources/js/file_upload.js',
                'resources/js/privacy_notice.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
