const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
                serif: ["Merriweather", ...defaultTheme.fontFamily.serif],
            },
        },
    },
    plugins: [],
};
