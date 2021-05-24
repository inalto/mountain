const defaultTheme = require('tailwindcss/defaultTheme');
const colors= require('tailwindcss/colors');

module.exports = {
    darkMode: 'class',
    purge: {
        enabled: true,
        content:  [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    options: {
        whitelist: []
      }
    },
    theme: {
        extend: {
            colors: {
                indigo: colors.indigo,
                rose: colors.rose,
                blueGray: colors.blueGray,
                lightBlue: colors.lightBlue
              },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },

    },

    plugins: [require('@tailwindcss/forms'),require('@tailwindcss/typography')],
};
