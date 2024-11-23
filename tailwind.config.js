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
            height: {
                '90-screen': '90vh', 
                '80-screen': '80vh',
                '70-screen': '70vh',
                '60-screen': '60vh',
                '50-screen': '50vh',
                '40-screen': '40vh',
                '30-screen': '30vh',
                '20-screen': '20vh', 
                '10-screen': '10vh', 
              },
        },
    },

    plugins: [forms],
};
