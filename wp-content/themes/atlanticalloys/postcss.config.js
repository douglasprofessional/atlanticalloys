const PurgeCSS = require('@fullhuman/postcss-purgecss')
const purgecssWordpress = require('purgecss-with-wordpress')
const purgecssGutenberg = require('purgecss-with-gutenberg')

const isProduction = process.env.NODE_ENV === 'production'

// Set the PostCSS Plugins.
const postCssPlugins = [
  require('postcss-preset-env'),
  require('postcss-import'),
  require('tailwindcss')('./tailwind.config.js'),
  require('postcss-nested'),
  require('postcss-custom-properties'),
  require('autoprefixer')
]

// Minify CSS for production builds.
if (isProduction) {
  postCssPlugins.push(require('cssnano'))
  postCssPlugins.push(
    PurgeCSS({
      content: [
        './*.php',
        './src/**/*.php',
        './template-parts/**/*.php',
        './assets/images/**/*.svg',
        './assets/css/whitelist/*.css',
        './../../mu-plugins/app/src/components/**/*.php'
      ],
      css: ['./node_modules/tailwindcss/dist/base.css'],
      whitelistPatterns: [
        ...purgecssWordpress.whitelistPatterns,
        ...purgecssGutenberg.whitelistPatterns
      ],
      whitelist: [
        ...purgecssWordpress.whitelist,
        ...purgecssGutenberg.whitelist
      ],
      safelist: {
        deep: [
          /^archive/,
          /^button/,
          /^header/,
          /^footer/,
          /^section/,
          /^video/,
          /^form/,
          /^input/,
          /^nav/,
          /^navigation/,
          /^menu/,
          /^mainmenu/,
          /^hidden-important/,
          /^is-theme/,
          /^active/,
          /^activated/,
          /^invalid/,
          /^feedback/,
          /^error/,
          /^alert/,
          /^message/,
          /^admin/,
          /^wp/,
          /^post/,
          /^cat/,
          /^tag/,
          /^wp-block/,
          /^screen/,
          /^category/,
          /^tags/,
          /^date/,
          /^padding/,
          /^cookies/,
          /^wpcf7/,
          /^page/,
          /^modal/,
          /^open/,
          /^close/,
          /^start/,
          /^loading/,
          /^view/,
          /^id/,
          /^link/,
          /^container/,
          /^owl/,
          /^item/,
          /^cloned/,
          /^openMenu/,
          /^site/,
          /^scroll/,
          /^siteHeader/,
          /^siteFooter/,
          /^formCustomSubmit/,
          /^carousel/,
          /^atlantic/,
          /^grid/,
          /^parallax/,
          /^texts/,
          /^misaligned/,
          /^transition/,
          /^border/,
          /^core/,
          /^full/,
          /^arrow/,
          /^illustration/,
          /^home/,
          /^single/,
          /^content/,
          /^search/,
          /^searchform/,
          /^searchsubmit/,
          /^submit/,
          /^field/,
          /^searchOverlayClose/,
          /^siteHeaderSearch/
        ]
      },
    })
  )
}

module.exports = {
  plugins: postCssPlugins,
  sourceMap: isProduction
}
