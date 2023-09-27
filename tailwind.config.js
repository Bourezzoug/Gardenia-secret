import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
          fontFamily: {
            'cormorant' : 'Cormorant, serif',
            'Lato' : 'Lato, sans-serif',
            'tuesday':  'TuesdayNight , sans-serif',
            'openSans':  'Open Sans , sans-serif',
          },
          colors:{
            'main-color' : '#af8d6a',
            'background-color' : '#fff9f7',
            'second-color' : '#f1bab3',
            'third-color' : '#ffe8ea',
            'maron' : 'rgb(65,58,58)',
            'pink-color' : 'rgb(207,151,151)',
          },
          width:{
            '100' : '450px',
            '101' : '47rem'
          },
          
          height:{
            '100' : '480px'
          },
          fontSize:{
            'header' : '40px',
            'large' : '150px'
          }
        },
      },

    plugins: [forms, typography],
};
