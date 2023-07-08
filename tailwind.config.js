/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/**/*.{php,html,js}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}