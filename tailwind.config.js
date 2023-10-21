import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {},
    colors: {
      ...colors,
      'primary-1': '#FB2525',
      'primary-2': '#EF3333',
      'primary-3': '#E04343',
      'primary-4': '#D65252',

      'secondary-1': '#F9EE02',
      'secondary-2': '#D3CC30',
      'secondary-3': '#A9A43F',
      'secondary-4': '#838041',

      'basi-0': '#292121',
      'basi-1': '#3E3434',
      'basi-2': '#483F3F',
      'basi-3': '#574D4D',
      'basi-4': '#786D6D',
      'basi-5': '#978C8C',
      'basi-6': '#C1B8B8',
      'basi-7': '#D1C3C3',
      'basi-8': '#DFCECE',
      'basi-9': '#F1E5E5',
      'basi-10': '#F6ECEC',
      'basi-11': '#FFF4F4',
    }
  },
  plugins: [],
}