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
        'brand-tertiary': '#EAD621',
        'system-success': '#249E2C',
        'primary-card': 'rgba(32, 43, 243, 0.11)',
        'secondary-card': 'rgba(15, 186, 104, 0.1)',
        'tertiary-card': 'rgba(234, 214, 33, 0.11)',
        'background': '#E5E5E5',
        'border': '#F6F6F7',
        'gradient-first': '#FCFF81',
        'gradient-second': '#C2FF9D',
        'gradient-third': '#75A4FF',

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
        '1600px': '1600px'
      },
      
    },
  },
  plugins: [
    require('tailwindcss-font-inter'),
    require('flowbite/plugin')
  ]
}
