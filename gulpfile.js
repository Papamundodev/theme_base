'use strict';
const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass')); // Set Sass compiler
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const webpack = require('webpack-stream');

// Compile SCSS to CSS
gulp.task('styles', async function () {
  const autoprefixer = await import('gulp-autoprefixer'); // Dynamic import for autoprefixer
  const cleanCSS = await import('gulp-clean-css'); // Dynamic import for cleanCSS

  return gulp.src(['./assets/sass/main.scss'])
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: [
        './node_modules',
        './node_modules/bootstrap/scss'  // Ajout explicite du chemin Bootstrap
      ]
    }).on('error', sass.logError))
    .pipe(autoprefixer.default()) // Add vendor prefixes
    .pipe(cleanCSS.default({ compatibility: 'ie11' })) // Minify CSS
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./assets/build/css'))
    .pipe(browserSync.stream());
});

// Compile JS
gulp.task('scripts', function () {
  return gulp.src(['./assets/js/main.js'])
    .pipe(webpack({
      mode: 'development',
      output: {
        filename: 'main.js'
      },
      resolve: {
        modules: ['node_modules']
      },
      module: {
        rules: [
          {
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: ['@babel/preset-env']
              }
            }
          }
        ]
      }
    }))
    .pipe(uglify()) // Minifier le JS
    .pipe(gulp.dest('./assets/build/js'))
    .pipe(browserSync.stream());
});

// Watch for changes and reload the browser
gulp.task('watch', function () {
  browserSync.init({
    proxy: "http://portfolio.local/",
    notify: false
  });

  gulp.watch('./assets/sass/**/*.scss', gulp.series('styles')).on('change', browserSync.reload);
  gulp.watch('./assets/js/main.js', gulp.series('scripts')).on('change', browserSync.reload); // Watch JS files
  gulp.watch('**/*.php').on('change', browserSync.reload);
});

// Default task
gulp.task('default', gulp.series('styles', 'scripts', 'watch'));

