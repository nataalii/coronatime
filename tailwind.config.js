/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],  
  theme: {
    extend: {
      colors: {
        'grn': "#0FBA68",
        'dark-20': "#E6E6E7",
        'dark-60': '#808189',
        'dark-100': '#010414',
        'brand-primary': '#2029F3',
        'system-error': '#CC1E1E',
        'system-success': '#249E2C'
      },
      boxShadow: {
        'input': '3px 3px 5px 5px #DBE8FB',
      },
      
      fontFamily: {
        'sansation': ['sansation', 'sans-serif']
      },
      margin: {
        '20%': '20%',
        '50%': '50%',
        '23%': '23%',
        '31%': '31%',
        '500px': '500px',

      },

      borderWidth: {
        '1px': '1px'
      },
      width: {
        '700px': '700px',
        '500px': '500px',
        '450px': '450px',
        '1200px': '1200px',
      },
      
    },
  },
  plugins: [
    require('tailwindcss-font-inter'),
    require('flowbite/plugin')
  ]
}
