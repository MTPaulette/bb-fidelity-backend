/** @type {import('tailwindcss').Config} */
// eslint-disable-next-line no-undef
module.exports = {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './node_modules/flowbite/**/*.js',
  ],
  theme: {
    extend: {},
    colors: {
      'sheet': {
        50: '#61a60e',
        100: '#047634',
        200: '#036b2f',
        300: '#01170a',
      },
      'mango': '#f7941d',
      // 'mango': '#fd5906',
      'info': 'green',
      'success': '#219653',
      'onion': {
        100: '#890352',
        200: '#580389',
      },
      'pineapple': '#fcea4b',
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}