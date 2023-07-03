const colors = require("tailwindcss/colors");
const {
    toRGB,
    withOpacityValue,
} = require("@left4code/tw-starter/dist/js/tailwind-config-helper");

module.exports = {
    mode: "jit",
    content: [
        "./src/**/*.{php,html,js,jsx,ts,tsx,vue}",
        "./resources/**/*.{php,html,js,jsx,ts,tsx,vue}",
        "./node_modules/@left4code/tw-starter/**/*.js",
        // ".//*.html",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                rgb: toRGB(colors),
                primary: withOpacityValue("--color-primary"),
                secondary: withOpacityValue("--color-secondary"),
                success: withOpacityValue("--color-success"),
                info: withOpacityValue("--color-info"),
                warning: withOpacityValue("--color-warning"),
                pending: withOpacityValue("--color-pending"),
                danger: withOpacityValue("--color-danger"),
                light: withOpacityValue("--color-light"),
                dark: withOpacityValue("--color-dark"),
              
                slate: {
                    50: withOpacityValue("--color-slate-50"),
                    100: withOpacityValue("--color-slate-100"),
                    200: withOpacityValue("--color-slate-200"),
                    300: withOpacityValue("--color-slate-300"),
                    400: withOpacityValue("--color-slate-400"),
                    500: withOpacityValue("--color-slate-500"),
                    600: withOpacityValue("--color-slate-600"),
                    700: withOpacityValue("--color-slate-700"),
                    800: withOpacityValue("--color-slate-800"),
                    900: withOpacityValue("--color-slate-900"),
                },
                darkmode: {
                    50: withOpacityValue("--color-darkmode-50"),
                    100: withOpacityValue("--color-darkmode-100"),
                    200: withOpacityValue("--color-darkmode-200"),
                    300: withOpacityValue("--color-darkmode-300"),
                    400: withOpacityValue("--color-darkmode-400"),
                    500: withOpacityValue("--color-darkmode-500"),
                    600: withOpacityValue("--color-darkmode-600"),
                    700: withOpacityValue("--color-darkmode-700"),
                    800: withOpacityValue("--color-darkmode-800"),
                    900: withOpacityValue("--color-darkmode-900"),
                },
               gray:{
                    850: '#141D2F'
               }
               ,
                'inalto': {
                    50:  '#E9EEFB',
                    100: '#D2DCF7',
                    200: '#AEC0F0',
                    300: '#8CA4E7',
                    400: '#7E91DB',
                    500: '#707FCF',
                    600: '#6570C5',
                    700: '#5A64B1',
                    800: '#4D559A',
                    900: '#424985',
                }

            },
            fontFamily: {
                roboto: ["Roboto"],
            },
            container: {
                center: true,
            },
            maxWidth: {
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
            },
            strokeWidth: {
                0.5: 0.5,
                1.5: 1.5,
                2.5: 2.5,
            },

            boxShadow: {
                "soft-xxs": "0 1px 5px 1px #ddd",
                "soft-xs": "0 3px 5px -1px rgba(0,0,0,.09),0 2px 3px -1px rgba(0,0,0,.07)",
                "soft-sm": "0 .25rem .375rem -.0625rem hsla(0,0%,8%,.12),0 .125rem .25rem -.0625rem hsla(0,0%,8%,.07)",
                "soft-md": "0 4px 7px -1px rgba(0,0,0,.11),0 2px 4px -1px rgba(0,0,0,.07)",
                "soft-lg": "0 2px 12px 0 rgba(0,0,0,.16)",
                "soft-xl": "0 20px 27px 0 rgba(0,0,0,0.05)",
                "soft-2xl": "0 .3125rem .625rem 0 rgba(0,0,0,.12)",
                "soft-3xl": "0 8px 26px -4px hsla(0,0%,8%,.15),0 8px 9px -5px hsla(0,0%,8%,.06)",
                "soft-primary-outline": "0 0 0 2px #e9aede",
                blur: "inset 0 0 1px 1px hsla(0,0%,100%,.9),0 20px 27px 0 rgba(0,0,0,.05)",
                DEFAULT: "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)",
                inner: "inset 0 2px 4px 0 rgb(0 0 0 / 0.05)",
                sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)",
                md: "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)",
                lg: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)",
                xl: "0 23px 45px -11px hsla(0,0%,8%,.25)",
                "2xl": "0 25px 50px -12px rgb(0 0 0 / 0.25)",
                none: "none",
              },

        },
    },
    plugins: [require("@tailwindcss/forms"),require("@tailwindcss/typography")],
    variants: {
        extend: {
            boxShadow: ["dark"],
        },
    },
};
