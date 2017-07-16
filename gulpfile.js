var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();
var connect = require('gulp-connect');
var sass = require('gulp-sass');
var rev = require('gulp-rev');

var dest = './web';
var src = './assets';

gulp.task('webserver', function() {
    connect.server({
        livereload: true,
        root: 'web',
        port: 8182
    });
});

var paths = {
    backendjs: [
        'node_modules/vue/dist/vue.js',
        'assets/backend/**/*'
    ],
    javascripts: [
        'bower_components/foundation/js/vendor/modernizr.js',
        'bower_components/foundation/js/vendor/jquery.js',
        'bower_components/foundation/js//foundation.min.js',
        'bower_components/foundation/js/foundation/foundation.alert.js'
    ],
    styles: [
        'bower_components/foundation/scss/foundation.scss',
        'assets/sass/**/*'
    ],
    images: [
        'assets/images/**/*'
    ],
    copyfonts: [
    ]
};

var versioning = {
    manifestCss: src + '/rev-manifest-css.json',
    manifestJS: src + '/rev-manifest-js.json',
};

gulp.task('javascripts', function() {
    gulp.src(paths.javascripts)
        .pipe(concat('app.js'))
        .pipe(gulp.dest('web/js'))
    ;

    return gulp.src(paths.javascripts)
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(gulp.dest('web/js'))
        .pipe(rev.manifest(versioning.manifestJS, {base : dest}))
        .pipe(gulp.dest(src))
        .pipe(browserSync.stream())
        ;
});

gulp.task('backend-js', function() {
    gulp.src(paths.backendjs)
        .pipe(concat('backendjs.js'))
        .pipe(gulp.dest('web/js'))
    ;

    return gulp.src(paths.javascripts)
        .pipe(concat('backendjs.min.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(gulp.dest('web/js'))
        .pipe(rev.manifest(versioning.manifestJS, {base : dest}))
        .pipe(gulp.dest(src))
        .pipe(browserSync.stream())
        ;
});

gulp.task('styles', function() {
    gulp.src(paths.styles)
        .pipe(sass({ style: 'compressed' }).on('error', sass.logError))
        .pipe(concat('app.min.css'))
        .pipe(minify())
        .pipe(rev())
        .pipe(gulp.dest('web/css'))
        .pipe(rev.manifest(versioning.manifestCss, {base : dest}))
        .pipe(gulp.dest(src))
        .pipe(browserSync.stream())
    ;

    return gulp.src(paths.styles)
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('app.css'))
        .pipe(gulp.dest('web/css'))
        .pipe(browserSync.stream())
        ;
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
        proxy: "localhost:8182",
        open: false
    });
});

gulp.task('default', ['images', 'javascripts', 'styles', 'copyfonts', 'backend-js']);
