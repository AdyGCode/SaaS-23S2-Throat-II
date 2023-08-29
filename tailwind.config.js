import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        listStyleType: {
            none: 'none',
            disc: 'disc',
            circle: 'circle',
            decimal: 'decimal',
            square: 'square',
            roman: 'upper-roman',
        }
    },

    plugins: [forms],
};

