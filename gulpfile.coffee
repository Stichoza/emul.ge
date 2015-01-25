gulp         = require 'gulp'
gutil        = require 'gulp-util'
coffee       = require 'gulp-coffee'
uglify       = require 'gulp-uglify'
stylus       = require 'gulp-stylus'
autoprefixer = require 'gulp-autoprefixer'
minifycss    = require 'gulp-minify-css'
rename       = require 'gulp-rename'

gulp.task 'styles', ->
    gulp.src 'client/src/stylus/**/*.styl'
        .on 'error', gutil.log
        .pipe stylus()
        .pipe autoprefixer 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'
        .pipe gulp.dest 'client/css'
        .pipe rename
            suffix: '.min'
        .pipe minifycss()
        .pipe gulp.dest 'client/css'

gulp.task 'scripts', ->
    gulp.src 'client/src/coffee/**/*.coffee'
        .pipe coffee()
        .on 'error', gutil.log
        .pipe uglify()
        .pipe rename
            suffix: '.min'
        .pipe gulp.dest 'client/js'

gulp.task 'watch', ->
    gulp.watch 'client/src/stylus/**/*', ['styles']
    gulp.watch 'client/src/coffee/**/*', ['scripts']
    return

gulp.task 'build', [
    'scripts'
    'styles'
], ->

gulp.task 'heroku:production', [
    'build'
], ->

gulp.task 'default', [
    'build'
    'watch'
], ->
