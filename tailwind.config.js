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
            colors: {
                // Warna hijau-alami Anda, pastikan diawali dengan '#'
                'hijau-alami': '#16610E',

                // Anda bisa menambahkan palet hijau kustom lain di sini juga jika diperlukan
                // Contoh:
                // 'hijau-mewah': {
                //   50: '#F0FFF0',
                //   500: '#60CC60',
                //   900: '#053005',
                // },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // --- MULAI DARI SINI: PENAMBAHAN KEYFRAMES DAN ANIMATION UNTUK NOTIFIKASI ---
            keyframes: {
                fadeInDown: {
                    '0%': { opacity: '0', transform: 'translateY(-20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeOutUp: {
                    '0%': { opacity: '1', transform: 'translateY(0)' },
                    '100%': { opacity: '0', transform: 'translateY(-20px)' },
                }
            },
            animation: {
                'fade-in-down': 'fadeInDown 0.5s ease-out forwards',
                'fade-out-up': 'fadeOutUp 0.5s ease-out forwards',
            }
            // --- AKHIR DARI PENAMBAHAN KEYFRAMES DAN ANIMATION ---
        },
    },

    plugins: [forms],
};