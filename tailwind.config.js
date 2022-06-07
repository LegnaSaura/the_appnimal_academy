const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                amarillo_corp: '#FFCC00', 
                azul_corp: '#0768A9',
                azul_corpOsc: '#0e3854',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
