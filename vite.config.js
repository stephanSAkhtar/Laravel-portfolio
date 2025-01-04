import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { fileURLToPath } from 'node:url'

import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./resources/js', import.meta.url)),
            '@components': fileURLToPath(
                new URL('./resources/js/Components', import.meta.url),
            ),
            '@icons': fileURLToPath(
                new URL('./resources/assets', import.meta.url),
            ),

            '@images': fileURLToPath(
                new URL('./public/images', import.meta.url),
            ),
        },
    },
});
