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
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-blue': '#8ecccc',
                'custom-light': '#7fb7b7',
                'custom-dark': '#50717b',
                'custom-gray': ' #3a4042',
                'custom-black': '#212121',
            }
        },
    },

    plugins: [forms],
};
