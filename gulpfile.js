var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();
var connect = require('gulp-connect');
var sass = require('gulp-sass');
var rev = require('gulp-rev');
var symlink = require('gulp-symlink');

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
        'assets/sass/**/*',
        'node_modules/font-mfizz/dist/font-mfizz.css'
    ],
    images: [
        'assets/images/**/*'
    ],
    copyfonts: [
        'node_modules/font-mfizz/dist/font-mfizz.eot',
        'node_modules/font-mfizz/dist/font-mfizz.svg',
        'node_modules/font-mfizz/dist/font-mfizz.woff',
        'node_modules/font-mfizz/dist/font-mfizz.ttf'
    ]
};

var versioning = {
    manifestCss: dest + '/rev-manifest-css.json',
    manifestJS: dest + '/rev-manifest-js.json'
};

gulp.task('javascripts', function(done) {

    gulp.src(paths.javascripts)
        .pipe(gulp.dest('assets/vendors/js'))
    ;
    gulp.src(paths.javascripts)
        .pipe(concat('app.js'))
        .pipe(gulp.dest('web/js'))
    ;

    gulp.src(paths.javascripts)
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(gulp.dest('web/js'))
        .pipe(rev.manifest(versioning.manifestJS, {base : dest}))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream())
        ;
    done();
});

gulp.task('backend-js', function(done) {
    gulp.src(paths.backendjs)
        .pipe(gulp.dest('assets/vendor/js'))
    ;
    gulp.src(paths.backendjs)
        .pipe(concat('backendjs.js'))
        .pipe(gulp.dest('web/js'))
    ;

    gulp.src(paths.javascripts)
        .pipe(concat('backendjs.min.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(gulp.dest('web/js'))
        .pipe(rev.manifest(versioning.manifestJS, {base : dest}))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream())
        ;
    done();
});

gulp.task('styles', function(done) {
    gulp.src(paths.styles)
        .pipe(sass({ style: 'compressed' }).on('error', sass.logError))
        .pipe(concat('app.min.css'))
        .pipe(minify())
        .pipe(gulp.dest('web/css'))
        .pipe(rev())
        .pipe(gulp.dest('web/css'))
        .pipe(rev.manifest(versioning.manifestCss, {base : dest}))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream())
    ;

    gulp.src(paths.styles)
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('app.css'))
        .pipe(gulp.dest('web/css'))
        .pipe(browserSync.stream())
        ;
    done();
});

gulp.task('images', function(done) {
    gulp.src(paths.images)
    //.pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest('web/images'))
        .pipe(browserSync.stream());
    done();
});

gulp.task('copyfonts', function(done) {
    gulp.src(paths.copyfonts)
        .pipe(gulp.dest('./web/fonts'))
        .pipe(browserSync.stream());
    gulp.src(paths.copyfonts)
        .pipe(gulp.dest('./web/css/fonts'))
        .pipe(browserSync.stream());

    done();
});

gulp.task('symlink', function (done) {
    gulp.src('./assets')
        .pipe(symlink('./web/dev', {force: true}))
    ;
    done();
});

gulp.task('watch', function (done) {

    for(var key = 0; key < paths.images.length;key++){
        gulp.watch(paths.images, ['images']);
    }

    for(key = 0; key < paths.images.copyfonts;key++){
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
    done();
});

gulp.task('default', ['images', 'javascripts', 'styles', 'copyfonts', 'symlink']);
