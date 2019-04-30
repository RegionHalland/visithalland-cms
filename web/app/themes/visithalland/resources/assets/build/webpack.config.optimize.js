'use strict'; // eslint-disable-line

const { default: ImageminPlugin } = require('imagemin-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const PurgecssPlugin = require('purgecss-webpack-plugin');
const glob = require('glob-all');
const config = require('./config');

class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
  }
}

module.exports = {
  plugins: [
    new ImageminPlugin({
      optipng: { optimizationLevel: 7 },
      gifsicle: { optimizationLevel: 3 },
      pngquant: { quality: '65-90', speed: 4 },
      svgo: {
        plugins: [
          { removeUnknownsAndDefaults: false },
          { cleanupIDs: false },
          { removeViewBox: false },
        ],
      },
      plugins: [imageminMozjpeg({ quality: 75 })],
      disable: (config.enabled.watcher),
    }),
    new PurgecssPlugin({
      paths: glob.sync([
        'app/**/*.php',
        'resources/views/**/*.php',
        'resources/assets/scripts/**/*.js',
      ]),
      whitelist: ['visithalland','hiking-biking', 'spa-wellness', 'winter', 'golf', 'shopping', 'beach-coast', 'food-culture', 'camping-friends'],
      extractors: [
        {
          extractor: TailwindExtractor,
          // Specify the file extensions to include when scanning for
          // class names.
          extensions: ["html", "js", "php", "vue"]
        }
      ]
    }),
    new UglifyJsPlugin({
      uglifyOptions: {
        ecma: 5,
        compress: {
          warnings: true,
          drop_console: true,
        },
      },
    }),
  ],
};
