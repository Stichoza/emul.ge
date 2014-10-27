var elixir       = require('laravel-elixir')
	gulp         = require('gulp'),
	gutil        = require('gulp-util'),
	coffee       = require('gulp-coffee'),
	uglify       = require('gulp-uglify')
	sass         = require('gulp-ruby-sass'),
	compass      = require('gulp-compass'),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss    = require('gulp-minify-css'),
	rename       = require('gulp-rename')

elixir(function(mix) {
	mix.sass("style.sass")
		.routes()
		.events()
		.phpUnit();
});

gulp.task('styles', function() {
	return gulp.src('resources/assets/sass/*.sass')
		.on('error', gutil.log)
		.pipe(compass({
			config_file: './config.rb',
			sass:        'resources/assets/sass',
			css:         'public/css/dist'
		}))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
		.pipe(gulp.dest('public/css/dist'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest('public/css/dist'))
});

gulp.task('scripts', function() {
	return gulp.src('resources/assets/coffee/*.coffee')
		.pipe(coffee())
		.on('error', gutil.log)
		.pipe(uglify())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('public/js/dist'))
})

gulp.task('watch', function() {
	gulp.watch('resources/assets/sass/*', ['styles'])
	gulp.watch('resources/assets/coffee/*', ['scripts'])
});


gulp.task('build', ['scripts', 'styles'], function() {})
gulp.task('default', ['build', 'watch'], function() {})