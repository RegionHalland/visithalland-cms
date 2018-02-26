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
import criticalCss from 'gulp-penthouse';
import cssNano from 'cssnano';

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
                cleanupIDs: false,
                removeStyleElement: true
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
gulp.task('watch', ['js:dist', 'css:dist', 'critical-css', 'browsersync'], () => {
	gulp.watch('./assets/src/scss/**/**/*.scss', ['css:dist', 'bs-reload', 'critical-css']);
	gulp.watch(['./assets/src/js/**/*.js'], ['js:dist', 'bs-reload']);
})

//Critical css
gulp.task('critical-css', function () {
	// PostCSS plugins
	return gulp.src('./assets/dist/css/main.min.css')
		.pipe(criticalCss({
			out: 'critical.php', // output file name
			url: 'http://localhost:3000/', // url from where we want penthouse to extract critical styles
			width: 1400, // max window width for critical media queries
			height: 900, // max window height for critical media queries
			userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' // pretend to be googlebot when grabbing critical page styles.
		}))
		.pipe(gulp.dest('./')); // destination folder for the output file
});

// Default build
gulp.task('default', ['css:dist', 'js:dist'])