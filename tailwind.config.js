const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            // fontFamily: {
            //     sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            // },
            fontFamily: {
                Mulish: ["Mulish, sans-serif"],
            },
            container: {
                center: true,
                padding: '2rem',
              },
              screens: {
                'print': { 'raw': 'print' },
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
