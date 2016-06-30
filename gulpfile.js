// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var cleanCSS = require('gulp-clean-css');
var imagemin = require('gulp-imagemin');

// Lint Task
gulp.task('lint', function() {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

//  Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/src/*.js')
				.pipe(rename(function(path) {
					path.basename += '.min';
				}))
        .pipe(uglify())
        .pipe(gulp.dest('js/dist'));
});

//  Minify CSS
gulp.task('minify-css', function() {
  return gulp.src('libraries/rs-plugin/css/settings.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(rename(function(path) {
			path.basename += '.min';
		}))
    .pipe(gulp.dest('libraries/rs-plugin/css'));
});

gulp.task('minify-image', function() {
	return gulp.src('css/upload/*')
		.pipe(imagemin())
		.pipe(gulp.dest('test/images'))
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('js/src/*.js', ['lint', 'scripts']);
    gulp.watch('css/src/*.css', ['minify-css']);
});

// Default Task
gulp.task('default', ['lint', 'scripts', 'watch', 'minify-css', 'minify-image']);
