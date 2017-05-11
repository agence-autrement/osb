var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var del = require('del');
var runSequence = require('run-sequence');


//live reload
gulp.task('live', function() {
    gulp.watch('./library/scss/**/*.scss', ['sass']);
    //gulp.watch("./library/css/style.css").on("change", browserSync.reload);
    //gulp.watch("./*.php").on('change', browserSync.reload);
    //gulp.watch("./library/js/scripts.js").on('change', browserSync.reload);
    //gulp.watch("js/*.js", ['js-watch']);
});


//minify css
gulp.task('minify-css', function () {
    return gulp.src('./library/css/style.css')
        .pipe(cleanCSS())
        .pipe(cleanCSS({compatibility: 'ie9'}))
        .pipe(gulp.dest('/library/css/'));
});


// Compile sass en css
gulp.task('sass', function () {
    return gulp.src("./library/scss/**/*.scss")
        .pipe(sourcemaps.init())
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest("./library/css"))
        .pipe(browserSync.reload({
            stream: true
        }))
});
//js watch
gulp.task('js-watch', ['js'], function (done) {
    browserSync.reload();
    done();
});
//js uglify
gulp.task('js', function () {
    return gulp.src('library/js/**/*.js')
        .pipe(browserify())
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
});
//concat les js
gulp.task('concat-js', function () {
    return gulp.src('./library/js/**/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('./dist/js'));
});

//optimisation image
gulp.task('images',function(){
   return gulp.src('./library/images/**/*.+(png|jpg|gif|svg')
       .pipe(cache(imagemin({
           interlaced:true
       })))
       .pipe(gulp.dest('dist/images'))
});
//dossier font
gulp.task('fonts', function() {
    return gulp.src('app/fonts/**/*')
        .pipe(gulp.dest('dist/fonts'))
});

//nettoyage caché sauf images

gulp.task('clean:dist', function(callback){
    del(['dist/**/*', '!dist/images', '!dist/images/**/*'], callback)
});
//callback clean
gulp.task('clean', function(callback) {
    del('dist');
    return cache.clearAll(callback);
});


///tâche dist
gulp.task('build', function (callback) {
    runSequence('clean:dist',
        ['sass', 'useref', 'images', 'fonts'],
        callback
    )
});
///action par defaut
gulp.task('default', function (callback) {
    runSequence(['sass','live'],
        callback
    )
});