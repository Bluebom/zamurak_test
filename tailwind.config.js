import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            'xs': '485px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px'
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
            },
            colors: {
                'p-black': {
                    100: '#7C838A',
                    300: '#4A525A',
                    400: '#3F3939',
                    600: '#1B2128'
                },
                'p-gray': {
                    300: '#959595',
                },
                'p-purple': {
                    50: '#EBEFFF',
                    200: '#CED7F8',
                    300: '#F4EEFB',
                    400: '#AFB3FF',
                    500: '#656ED3',
                    600: '#7839CD',
                },
                'active': {
                    300: '#E9FFEF',
                    600: '#409261',
                },
                'disabled': {
                    300: '#E4E4E4',
                    600: '#3F3748',
                },
                'pending': {
                    300: '#FFF2DD',
                    600: '#D98634',
                }
            }
        },
    },

    plugins: [forms],
};
