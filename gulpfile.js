var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();
var connect = require('gulp-connect');

gulp.task('webserver', function() {
    connect.server({
            livereload: true,
            root: 'web',
            port: 8182
        });
});

var paths = {
    javascripts: [
        'bower_components/foundation/js/vendor/modernizr.js',
        'bower_components/foundation/js/vendor/jquery.js',
        'bower_components/foundation/js//foundation.min.js',
        'bower_components/foundation/js/foundation/foundation.alert.js'
    ],
    styles: [
        'bower_components/foundation/css/foundation.css',
        'assets/css/**/*'
    ],
    images: [
        'assets/images/**/*'
    ],
    copyfonts: [
    ]
};

gulp.task('javascripts', function() {
    return gulp.src(paths.javascripts)
        .pipe(concat('app.js'))
        .pipe(gulp.dest('web/js'))
        .pipe(uglify())
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest('web/js'))
        .pipe(browserSync.stream());
});

gulp.task('styles', function() {
    gulp.src(paths.styles)
        .pipe(concat('app.min.css'))
        .pipe(gulp.dest('web/css'))
        .pipe(browserSync.stream());

    return gulp.src(paths.styles)
        .pipe(concat('app.min.css'))
        .pipe(gulp.dest('web/css'))
        .pipe(browserSync.stream());
});

gulp.task('images', function() {
    return gulp.src(paths.images)
        //.pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest('web/images'))
        .pipe(browserSync.stream());
});

gulp.task('copyfonts', function() {
    gulp.src(paths.copyfonts)
        .pipe(gulp.dest('./web/fonts'))
        .pipe(browserSync.stream());
    gulp.src(paths.copyfonts)
        .pipe(gulp.dest('./web/css/fonts'))
        .pipe(browserSync.stream());
});


gulp.task('watch', ['webserver'], function () {

    for(var key = 0; key < paths.images.length;key++){
        gulp.watch(paths.images, ['images']);
    }

    for(var key = 0; key < paths.images.copyfonts;key++){
        gulp.watch(paths.copyfonts[key], ['copyfonts']);
    }

    for(key = 0; key < paths.javascripts.length;key++){
        gulp.watch(paths.javascripts[key], ['javascripts']);
    }

    for(key = 0; key < paths.styles.length;key++){
        gulp.watch(paths.styles[key], ['styles']);
    }

    browserSync.init({
        proxy: "localhost:8182"
    });
});

gulp.task('default', ['images', 'javascripts', 'styles', 'copyfonts']);
