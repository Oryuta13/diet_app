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
                bangers: ["Bangers", "cursive"],
                rampart: ["Rampart One", "cursive"],
            },
        },
        backgroundImage: {
            "img-bg": "url('/imgs/diet_img2.jpg')",
            "img-bg2": "url('/imgs/diet_bg1.jpg')",
        },
    },

    plugins: [forms],
};
