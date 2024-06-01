import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("daisyui")],

    // daisyUI config (optional - here are the default values)
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#3C6D8D",
                    secondary: "#4682A9",
                    accent: "#F6F4EB",
                    neutral: "#f3f4f6",
                    "base-100": "#fdffff",
                    info: "#0ea5e9",
                    success: "#22c55e",
                    warning: "#fbbf24",
                    error: "#ef4444",
                },
            },
        ],
    },
};
