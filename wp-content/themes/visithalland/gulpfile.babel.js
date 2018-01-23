'use strict';

import gulp from 'gulp'
import shell from 'gulp-shell'
import plumber from 'gulp-plumber'
import gutil from 'gulp-util'
import browsersync from 'browser-sync'
import rename from 'gulp-rename'
import sass from 'gulp-sass'
import postcss from 'gulp-postcss'
import autoprefixer from 'autoprefixer'
import cssnano from 'cssnano'
import concat from 'gulp-concat'
import uglify from 'gulp-uglify'
import svgmin from 'gulp-svgmin'
import svgstore from 'gulp-svgstore'

// Build CSS
gulp.task('css:dist', () => {
	// PostCSS plugins
	const plugins = [
		autoprefixer({browsers: ['last 1 version']}),
		cssnano({ mergeLonghand: false, zindex: false })
	];
	return gulp.src('./assets/src/scss/*.scss')
		.pipe(plumber({
			errorHandler: error => {
				gutil.beep()
				console.log(error)
			}
		}))
		.pipe(sass())
		.pipe(postcss(plugins))
		.pipe(rename({suffix: '.min'}))
		.pipe(plumber.stop())
		.pipe(gulp.dest('./assets/dist/css/'))
		.pipe(browsersync.stream())
})

// Build JS
gulp.task('js:dist', () => {
	// App
	gulp.src('./assets/src/js/*.js')
		.pipe(plumber({
			errorHandler: error => {
				gutil.beep()
				console.log(error)
			}
		}))
		.pipe(concat('app.js'))
		.pipe(gulp.dest('./assets/dist/js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(gulp.dest('./assets/dist/js/'))
})

// Minify SVGs
gulp.task('svgmin', () => {
    return gulp.src('./assets/src/icons/**/*.svg')
        .pipe(svgmin({
              plugins: [{
                cleanupIDs: false
            }, {
                collapseGroups: false
            }]
        }))
        .pipe(svgstore())
        .pipe(rename('sprite.svg'))
        .pipe(gulp.dest('./assets/dist/icons'));
})

// Browsersync
gulp.task('browsersync', () => {
	browsersync.init({
		proxy: 'cms.visithalland.test'
	});
})

// Browsersync reload
gulp.task('bs-reload', () => {
	browsersync.reload();
})

// Watch
gulp.task('watch', ['js:dist', 'css:dist', 'browsersync'], () => {
	gulp.watch('./assets/src/scss/**/**/*.scss', ['css:dist', 'bs-reload']);
	gulp.watch(['./assets/src/js/**/*.js'], ['js:dist', 'bs-reload']);
})

// Default build
gulp.task('default', ['css:dist', 'js:dist'])