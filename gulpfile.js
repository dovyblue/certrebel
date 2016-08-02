// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var cleanCSS = require('gulp-clean-css');
var concatCss = require('gulp-concat-css');
var minifyCSS = require('gulp-minify-css');

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

gulp.task('live-to-admin-scripts', function() {
    return gulp.src('js/src/*.js')
				.pipe(rename(function(path) {
					path.basename += '.admin.min';
				}))
        .pipe(uglify())
        .pipe(gulp.dest('admin/js/dist'));
});

//  Minify Admin JS
gulp.task('admin-scripts', function() {
    return gulp.src('admin/js/src/*.js')
				.pipe(rename(function(path) {
					path.basename += '.min';
				}))
        .pipe(uglify())
        .pipe(gulp.dest('admin/js/dist'));
});

//  Combine CSS
gulp.task('combine-css', function () {
  return gulp.src(['css/src/bootstrap.css','css/src/style.css'])
		.pipe(minifyCSS())
		.pipe(concat('bootstyle.min.css'))
    .pipe(gulp.dest('css/dist/'));
});

gulp.task('live-to-admin-combine-css', function () {
  return gulp.src(['css/src/bootstrap.css','css/src/style.css'])
		.pipe(minifyCSS())
		.pipe(concat('bootstyle.admin.min.css'))
    .pipe(gulp.dest('admin/css/dist/'));
});

//  Combine Admin CSS
gulp.task('combine-admin-css', function () {
  return gulp.src(['admin/css/src/bootstrap.css','admin/css/src/style.css'])
		.pipe(minifyCSS())
		.pipe(concat('bootstyle.min.css'))
    .pipe(gulp.dest('admin/css/dist/'));
});

//  Minify CSS
gulp.task('minify-css', function() {
  return gulp.src('css/src/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(rename(function(path) {
			path.basename += '.min';
		}))
    .pipe(gulp.dest('css/dist'));
});

gulp.task('live-to-admin-minify-css', function() {
  return gulp.src('css/src/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(rename(function(path) {
			path.basename += '.admin.min';
		}))
    .pipe(gulp.dest('admin/css/dist'));
});

//  Minify Admin CSS
gulp.task('minify-admin-css', function() {
  return gulp.src('admin/css/src/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(rename(function(path) {
			path.basename += '.min';
		}))
    .pipe(gulp.dest('admin/css/dist'));
});

gulp.task('minify-image', function() {
	return gulp.src('images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('images/'))
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('js/src/*.js', ['lint', 'scripts']);
    gulp.watch('css/src/*.css', ['minify-css']);
});

// Default Task
gulp.task('default', ['lint', 'scripts', 'watch', 'minify-css', 'minify-image', 'combine-css','combine-admin-css', 'minify-admin-css', 'admin-scripts']);
gulp.task('admin', ['combine-admin-css', 'minify-admin-css', 'admin-scripts']);
gulp.task('live-to-admin', ['live-to-admin-combine-css', 'live-to-admin-minify-css', 'live-to-admin-scripts']);
