import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/branches.css',
                'resources/css/companies.css',
                'resources/css/home.css',
                'resources/css/profile.css',
                'resources/css/style.css',
                'resources/css/vacancies.css',
                'resources/js/vacancyTimeSlotManager.js',
                'resources/css/admin.css',
                'resources/css/auth.css'
            ],
            refresh: true,
        }),
    ],
});
