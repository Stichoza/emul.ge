var elixir = require('laravel-elixir')
	gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
	compass = require('gulp-compass'),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	rename = require('gulp-rename');

elixir(function(mix) {
	mix.sass("style.sass")
		.routes()
		.events()
		.phpUnit();
});

gulp.task('styles', function() {
	return gulp.src('resources/assets/sass/*.sass')
		.on('error', function(e){})
		.pipe(sass({style: 'expanded'}))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
		.pipe(gulp.dest('public/css/dist'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest('public/css/dist'))
});

gulp.task('watch', function() {
	gulp.watch('resources/assets/sass/*', ['styles']);
});

gulp.task('default', ['watch'], function() {

});