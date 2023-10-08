const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
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
            keyframes: {
                flashFade: {
                    '0%': { opacity: 0 },
                    '20%': { opacity: 1 },
                    '80%': { opacity: 1 },
                    '100%': { opacity: 0 },
                },
            },
            animation: {
                'flash-message': 'flashFade 5.0s forwards',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
