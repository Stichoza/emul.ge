autoprefixer = require 'gulp-autoprefixer'
coffee       = require 'gulp-coffee'
gulp         = require 'gulp'
ignore       = require 'gulp-ignore'
gutil        = require 'gulp-util'
jade         = require 'gulp-jade'
notify       = require 'gulp-notify'
minifycss    = require 'gulp-minify-css'
plumber      = require 'gulp-plumber'
rename       = require 'gulp-rename'
stylus       = require 'gulp-stylus'
uglify       = require 'gulp-uglify'

gulp.task 'styles', ->
  gulp.src 'src/client/stylus/**/*.styl'
    .pipe plumber
      errorHandler: notify.onError 'Error: <%= error.message %>'
    .pipe ignore.exclude '**/_*.styl'
    .on 'error', gutil.log
    .pipe stylus()
    .pipe autoprefixer 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'
    .pipe rename
      suffix: '.min'
    .pipe minifycss
      processImport: yes
    .pipe gulp.dest 'client/css'
  gulp.src 'src/client/stylus/**/*.css'
    .pipe plumber
      errorHandler: notify.onError 'Error: <%= error.message %>'
    .pipe autoprefixer 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'
    .pipe rename
      suffix: '.min'
    .pipe minifycss
      processImport: no
    .pipe gulp.dest 'client/css'

gulp.task 'scripts', ->
  gulp.src 'src/client/coffee/**/*.coffee'
    .pipe plumber
      errorHandler: notify.onError 'Error: <%= error.message %>'
    .pipe coffee()
    .on 'error', gutil.log
    .pipe uglify()
    .pipe rename
      suffix: '.min'
    .pipe gulp.dest 'client/js'

gulp.task 'jade', ->
  gulp.src 'src/client/jade/**/*.jade'
    .pipe plumber
      errorHandler: notify.onError 'Error: <%= error.message %>'
    .pipe jade()
    .on 'error', gutil.log
    .pipe gulp.dest 'client'

gulp.task 'watch', ->
  gulp.watch 'src/client/stylus/**/*', ['styles']
  gulp.watch 'src/client/coffee/**/*', ['scripts']
  gulp.watch 'src/client/jade/**/*', ['jade']
  return

gulp.task 'build', [
  'scripts'
  'styles'
  'jade'
], ->

gulp.task 'heroku:production', [
  'build'
], ->

gulp.task 'default', [
  'build'
  'watch'
], ->
