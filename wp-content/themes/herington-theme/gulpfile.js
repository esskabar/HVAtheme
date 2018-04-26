var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-uglifycss'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    streamqueue = require('streamqueue'),
    //importCss = require('gulp-import-css'),
    sourcemaps = require('gulp-sourcemaps'),
    gulpif = require('gulp-if'),
    concat = require('gulp-concat'),
    babel = require('gulp-babel'),


    productionMode = true;


gulp.task('default', ['watch']);


gulp.task('styles', function () {

    gulp.task('styles', function () {
        return gulp.src('./src/css/style.scss')
            .pipe(plumber({
                errorHandler: notify.onError("Error: <%= error.message %>")
            }))
            .pipe(sourcemaps.init())
            .pipe(sass())
            .pipe(gulpif(productionMode, autoprefixer({
                browsers: ['last 12 versions'],
                cascade: false
            })))
            .pipe(rename({suffix: '.min'}))
            .pipe(gulpif(productionMode, minifycss()))
            .pipe(sourcemaps.write('/'))
            .pipe(gulp.dest('./build/css'))
            .pipe(notify("Styles task complete"));
    });

});

gulp.task('vendorsJs', function () {
    return streamqueue({objectMode: true},
        gulp.src('./src/js/vendor/slick.min.js'),

        gulp.src('./src/js/vendor/light-gallery/lightgallery.js'),
        gulp.src('./src/js/vendor/light-gallery/lg-thumbnail.js'),
        gulp.src('./src/js/vendor/light-gallery/lg-fullscreen.js'),

        gulp.src('./src/js/vendor/bootstrap-select.js'),

        gulp.src('./src/js/vendor/bootstrap/dropdown.js'),
        gulp.src('./src/js/vendor/bootstrap/tab.js'),
        gulp.src('./src/js/vendor/bootstrap/transition.js')
    )

        .pipe(concat('vendors.js'))
        .pipe(gulpif(productionMode, uglify()))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./build/js'))
        .pipe(notify("Vendor script task complete"));
});


gulp.task('scriptsJs', function () {
    return streamqueue({objectMode: true},
        gulp.src('./src/js/custom/ajax_gallery.js'),
        gulp.src('./src/js/custom/custom.js'),
        gulp.src('./src/js/custom/floor-plans-slider.js'),
        gulp.src('./src/js/custom/map.js')
    )

        .pipe(concat('custom.js'))
        .pipe(gulpif(productionMode, uglify()))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./build/js'))
        .pipe(notify("Custom script task complete"))
});


gulp.task('watch', ['styles', 'vendorsJs', 'scriptsJs'], function () {
    gulp.watch('src/css/**/*.scss', ['styles']);
    gulp.watch('src/css/**/**/**/*.scss', ['styles']);
    gulp.watch('src/js/vendor/*.js', ['vendorJs']);
    gulp.watch('src/js/custom/*.js', ['scriptsJs']);
});