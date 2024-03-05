import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'main-bg': "url({{ asset('build/assets/main-bg.png') }})",
                'footer-texture': "url('/img/footer-texture.png')",
            },
            borderWidth: {
                DEFAULT: '1px',
                '1.5': '1.5px',
            },
            fontFamily: {
                'cabin': ['"Cabin"'],
            },
            fontSize: {
                vmax: ['30px', '20px'],
            }
        },
    },

    plugins: [forms],
};
