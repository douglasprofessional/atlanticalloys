const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CopyPlugin = require('copy-webpack-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const TerserPlugin = require('terser-webpack-plugin')

const isProduction = process.env.NODE_ENV === 'production'

// Set the build prefix.
const prefix = isProduction ? '.min' : ''

const config = {
  entry: './assets/js/main.js',
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        parallel: true
      })
    ]
  },
  output: {
    filename: `[name]${prefix}.js`,
    path: path.resolve(__dirname, 'dist')
  },
  mode: process.env.NODE_ENV,
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        options: {
          presets: [['@babel/preset-env']]
        }
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          {
            // Adds CSS to the DOM by injecting a `<style>` tag
            loader: 'style-loader'
          },
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              esModule: false
            }
          },
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
              sourceMap: !isProduction
            }
          },
          'postcss-loader',
          'sass-loader'
        ]
      }
    ]
  },
  resolve: {
    alias: {
      '@': path.resolve('assets'),
      '@images': path.resolve('../images')
    },
    modules: ['node_modules'],
    extensions: ['.css', '.scss', '.js']
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: `[name]${prefix}.css`
    }),
    new CopyPlugin({
      patterns: [
        {
          from: './assets/images/',
          to: 'images',
          globOptions: {
            ignore: ['.DS_Store']
          }
        }
      ]
    })
  ]
}

// Fire up a local server if requested
if (process.env.SERVER) {
  config.plugins.push(
    new BrowserSyncPlugin({
      proxy: 'http://localhost:10008/',
      files: ['**/*.php', '**/*.css', '**/*.scss'],
      notify: false
    })
  )
}

module.exports = config
