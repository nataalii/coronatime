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
        'matterhorn': '#4E4E4E',
        'eclipse': '#3D3B3B',
        'grn': "#0FBA68",
        'dark/60': '#808189',
        'dark/100': '#010414',
        'brand/primary': '#2029F3',
        'system/error': '#CC1E1E'
      },
      
      fontFamily: {
        'sansation': ['sansation', 'sans-serif']
      },
      margin: {
        '20%': '20%',
        '50%': '50%',
        '23%': '23%',
        '31%': '31%'
      },

      borderWidth: {
        '1px': '1px'
      },
      width: {
        '700px': '700px',
        '500px': '500px',
        '1200px': '1200px',
      },
      
    },
  },
  plugins: [
  ],
}
