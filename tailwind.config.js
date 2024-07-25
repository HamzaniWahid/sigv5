const defaultTheme = require('tailwindcss/defaultTheme');
import colors from 'tailwindcss/colors';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: { 
                danger: colors.rose,
                primary: colors.green,
                success: colors.blue,
                warning: colors.yellow,
            }, 
        },
    },

    plugins: [require('@tailwindcss/forms'), require('preline/plugin'),typography],
};
