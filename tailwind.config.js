/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            minWidth: {
                'table': "650px",
            },
            minHeight:{
                '1/2' : '75%',
            }
        },
    },
    plugins:[require("tw-elements/dist/plugin.cjs")],
};

