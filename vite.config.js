import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/iconfont.css',
                'resources/css/style.css',
                'resources/js/core.js',
                'resources/js/feather.min.js',
                'resources/js/template.js',
            ],
            refresh: ['resources/views/**']
        }),
    ],
});
