const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const terser = require('gulp-terser');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');

const paths = {
  css: {
    src: 'assets/css/*.css',
    dest: 'dist/css/'
  },
  js: {
    src: 'assets/js/*.js',
    dest: 'dist/js/'
  }
};

// CSS Task
function css() {
  return gulp.src(paths.css.src)
    .pipe(sourcemaps.init())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.css.dest));
}

// JS Task
function js() {
  return gulp.src(paths.js.src)
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.js.dest));
}

// Watch Task (optional for development)
function watch() {
  gulp.watch(paths.css.src, css);
  gulp.watch(paths.js.src, js);
}

// Default task
exports.css = css;
exports.js = js;
exports.watch = watch;
exports.default = gulp.parallel(css, js);
