const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkmode: 'class',
    content: ["./resources/views/**/*.blade.php"],
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        width: {
            '1/8': '12.5%'
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        extend: {
            backgroundColor: ['active'],
            outline: ['hover', 'active'],
        }
    },

    plugins: [
        require('@tailwindcss/typography')
    ],
};
