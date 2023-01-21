/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.svelte",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {},
    },

    daisyui: {
        styled: true,
        themes: true,
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "night",
        // themes: [{
        //     mytheme: {
        //         primary: "#570DF8",
        //         secondary: "#F000B8",
        //         accent: "#37CDBE",
        //         neutral: "#3D4451",
        //         "base-100": "#FFFFFF",
        //         info: "#3ABFF8",
        //         success: "#36D399",
        //         warning: "#FBBD23",
        //         error: "#F87272",
        //     },
        // }, ],
    },

    plugins: [
        // require("@tailwindcss/typography"),
        require("daisyui"),
    ],
};
