/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: [
    './src/**/*.{html,js}', 
    '../../themes/atlanticalloys/**/*.php'
  ],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {
      scale: {
        '03': '0.3',
      },
      spacing: {
        initial: 'initial',
        '1px': '1px',
        '2px': '2px',
        '3px': '3px',
        '4px': '4px',
        '5px': '5px',
        '10px': '10px',
        '18px': '18px',
        '35px': '35px',
        '40px': '40px',
        '52px': '52px',
        '60px': '60px',
        '67px': '67px',
        '71px': '71px',
        '72px': '72px',
        '75px': '75px',
        '90px': '90px',
        '120px': '120px',
        '126px': '126px',
        '140px': '140px',
        '150px': '150px',
        '160px': '160px',
        '180px': '180px',
        '240px': '240px',
        '415px': '415px'
      },
      letterSpacing: {
        '1px': '1px'
      },
      colors: {
        transparent: 'transparent',
        black: {
          100: '#000000',
          200: '#010D17'
        },
        white: '#FFFFFF',
        gray: {
          100: '#F5F8FA',
          200: '#CECECE',
          300: '#464646',
          400: '#252525'
        },
        blue: {
          50:  '#A1C9E6',
          100: '#377DAF',
          200: '#0970BA', //#1C75BC
          300: '#2B3990',
          400: '#012036',
          500: '#01121F'
        }
      },
      lineHeight: {
        '50px': '50px !important',
        '60px': '60px !important',
        '70px': '70px !important',
        'normal-important': 'normal !important'
      },
      height: {
        inherit: 'inherit'
      },
      minHeight: {
        '300px': '300px'
      },
      maxHeight: {},
      width: {
        inherit: 'inherit'
      },
      minWidth: {},
      maxWidth: {
        initial: 'initial',
        'screen-50': '50%',
        'screen-75': '75%',
        'screen-80': '80%',
        'screen-1750': '1750px'
      },
      fontSize: {
        none: '0',
        '10px': '10px',
        '40px': '40px',
        '55px': '55px',
        '72px': '72px'
      },
      borderWidth: {
        0: '0px',
        1: '1px',
        2: '2px'
      },
      borderRadius: {
        '10px': '10px',
        '20px': '20px'
      }
    }
  },
  variants: {},
  plugins: [],
}

