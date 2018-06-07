var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    sourcemaps   = require('gulp-sourcemaps')
    autoprefixer = require('gulp-autoprefixer'),
    notify       = require("gulp-notify"),
    jshint       = require("gulp-jshint"),
    notify       = require("gulp-notify"),
    concat       = require('gulp-concat'),
    uglify       = require('gulp-uglify'),
    browserSync  = require('browser-sync').create();


var paths = {
    scss: "assets/scss",
    css:  "assets/css",
    img:  "assets/img",
    js:   "assets/js"
}

// Sass
gulp.task('sass', function(){
    return gulp.src(paths.scss + '/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed',
            errLogToConsole: false,
        }))
        .on('error', function(err) {
            notify().write(err);
            this.emit('end');
        })
        .pipe(autoprefixer({
            browsers: ['> 5%', 'last 2 versions'],
            cascade: false
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.css))
        .pipe(browserSync.stream({match: '**/*.css'}))
});

// Run JSHint
gulp.task('jshint', function () { 
    return gulp.src(paths.js + '/_main.js')
        .pipe(jshint())
        // Use gulp-notify as jshint reporter
        .pipe(notify(function (file) {
            if (file.jshint.success) {
                // Don't show something if success
                return false;
            }
            var errors = file.jshint.results.map(function (data) {
                if (data.error) {
                    return "(" + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
                }
            }).join("\n");
            return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
        }))
        .pipe(jshint.reporter('jshint-stylish'))
        .pipe(jshint.reporter('fail'));
});


// Javascript Concat & Minify
gulp.task('js', ['jshint'], function(){
    return gulp.src([
        paths.js + '/plugins/*.js',
        paths.js + '/_main.js'
    ])
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.js));
});

// create a task that ensures the `js` task is complete before
// reloading browsers
gulp.task('js-watch', ['js'], function (done) {
    browserSync.reload();
    done();
});

// Browsersync
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost",
        notify: {
            styles: {
                top: 'auto',
                bottom: '0'
            }
        }
    });
});

// Watch task
gulp.task('watch', ['browser-sync'], function(){
    gulp.watch(paths.scss + '/**/*.scss',['sass']);
    gulp.watch(paths.js + '/plugins/*.js',['js-watch']);
    gulp.watch(paths.js + '/_main.js',['js-watch']);
    gulp.watch("**/*.html").on('change', browserSync.reload);
    gulp.watch("**/*.php").on('change', browserSync.reload);
});


// Default task
gulp.task('default', ['sass','js','watch']);