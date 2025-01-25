import fs from 'fs';
import { fileURLToPath, URL } from 'node:url';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vuePlugin from '@vitejs/plugin-vue';
import * as path from 'path';
import { homedir } from 'os';
import fse from 'fs-extra';


let host = 'course_laravel_10.site'
export default defineConfig({
    resolve: {
        alias: {
            vue: path.resolve(__dirname, 'node_modules/vue/dist/vue.esm-bundler.js'),
        },
    },
    plugins: [
        vuePlugin(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',
                 'resources/js/notes.js'],
            refresh: true,
        }),
    ],
    server: detectServerConfig(host),
});

function detectServerConfig(host) {
    const keyPath = path.resolve(
        homedir(),
        `.config/valet/Certificates/${host}.key`
    );
    const certificatePath = path.resolve(
        homedir(),
        `.config/valet/Certificates/${host}.crt`
    );

    if (!fs.existsSync(keyPath) || !fs.existsSync(certificatePath)) {
        return {};
    }

    return {
        hmr: { host },
        host,
        https: {
            key: fs.readFileSync(keyPath),
            cert: fs.readFileSync(certificatePath),
        },
        
    };
}
