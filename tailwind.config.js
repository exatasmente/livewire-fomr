const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    purge: {
        content: [
            './resources/views/**/*.blade.php',
            './resources/css/**/*.css',
            './resources/js/**/*.js',
        ]
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        }
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],

}
