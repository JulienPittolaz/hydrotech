var gulp           = require("gulp"),
concat         = require("gulp-concat"),
uglify         = require("gulp-uglify"),
sass           = require('gulp-sass'),
cssmin         = require("gulp-cssmin"),
rename         = require('gulp-rename'),
gutil          = require('gulp-util'),
filter         = require("gulp-filter"),
plumber        = require('gulp-plumber');

var config = {
    paths: {
        javascript: {
            src:  "app/js/*.js",
            dest: "assets/js"
        },
        css: {
            src: "resources/assets/sass/app.scss",
            dest: "public/css"
        }
    }
};


gulp.task("scripts", function(){
    return gulp.src(config.paths.javascript.src)
    .pipe(plumber())
    .pipe(concat("app.js"))
    .pipe(uglify())
    .pipe(gulp.dest(config.paths.javascript.dest));
});

gulp.task("css", function(){
    gulp.src(config.paths.css.src)
    .pipe(plumber())
    .pipe(sass())
    .pipe(cssmin())
    //.pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(config.paths.css.dest));
});

gulp.task("default", ["watch", "css"]);

gulp.task('watch', function() {
    //gulp.watch('app/js/**/*.js', ['scripts']);
    gulp.watch('app/sass/**/*.scss', ['css']);
});
