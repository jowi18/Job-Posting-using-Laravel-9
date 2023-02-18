/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
  ],
  theme: {
    extend: {
      colors: {
        laravel: "#155e75",
    },
    },
  },
  plugins: [],
}
