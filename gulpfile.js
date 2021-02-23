const { src, dest, parallel, series, watch } = require('gulp');
const del = require('del');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
///HTML
const include = require('gulp-file-include');
const htmlmin = require('gulp-htmlmin');
///CSS
const sass = require('gulp-sass');
const csso = require('gulp-csso');
const autoprefixer = require('gulp-autoprefixer');
const removeComments = require('gulp-strip-css-comments');
///JS
const uglify = require('gulp-uglify-es').default;
var order = require('gulp-order');
///IMG
// const imagemin = require('gulp-imagemin');
// const newer = require('gulp-newer');
/// Paths
const srcPath = 'src/';
const distPath = 'dist/';
const path = {
  build: {
    html: distPath,
    js: distPath + 'js/',
    css: distPath + 'css/',
    img: distPath + 'img/',
    fonts: distPath + 'fonts/',
  },
  src: {
    html: srcPath + '**/*.html',
    js: srcPath + 'js/**/*.js',
    css: srcPath + 'scss/**/*.scss',
    img: srcPath + 'img/**/*.{jpg,png,svg,gif,ico,webp}',
    fonts: srcPath + 'fonts/**/*.{eot,woff,woff2,ttf,svg}',
  },
  clean: './' + distPath,
};

function browsersync() {
  browserSync.init({
    server: {
      baseDir: path.clean,
    },
    notify: false,
  });
}

///HTML
function html() {
  return src([path.src.html, '!' + srcPath + '**/_*.html'])
    .pipe(
      include({
        prefix: '@@',
      }),
    )
    .pipe(
      htmlmin({
        collapseWhitespace: true,
      }),
    )
    .pipe(dest(path.build.html))
    .pipe(browserSync.stream());
}
///STYLE
function css() {
  return src(path.src.css)
    .pipe(
      plumber({
        errorHandler: function (err) {
          notify.onError({
            title: 'SCSS Error',
            message: 'Error: <%= error.message %>',
          })(err);
          this.emit('end');
        },
      }),
    )
    .pipe(sass())
    .pipe(
      autoprefixer({
        cascade: true,
      }),
    )
    .pipe(removeComments())
    .pipe(csso())
    .pipe(concat('style.css'))
    .pipe(
      rename({
        suffix: '.min',
        extname: '.css',
      }),
    )
    .pipe(dest(path.build.css))
    .pipe(browserSync.stream());
}
///JS
function js() {
  return src(path.src.js)
    .pipe(order(['jquery-3.5.1.min.js', '!script*.js', 'script.js']))
    .pipe(concat('script.js'))
    .pipe(
      rename({
        suffix: '.min',
        extname: '.js',
      }),
    )
    .pipe(uglify())
    .pipe(dest(path.build.js))
    .pipe(browserSync.stream());
}

function img() {
  return src(path.src.img)
    .pipe(dest(path.build.img))
    .pipe(browserSync.stream());
}

///FONTS
function fonts() {
  return src(path.src.fonts)
    .pipe(dest(path.build.fonts))
    .pipe(browserSync.stream());
}

function clean() {
  return del(path.clean);
}

function watching() {
  watch([path.src.html], html);
  watch([path.src.css], css);
  watch([path.src.js], js);
  watch([path.src.img], img);
  //watch([path.src.fonts], fonts);
}

exports.css = css;
exports.watching = watching;
exports.browsersync = browsersync;
exports.js = js;
exports.html = html;
exports.img = img;
exports.clean = clean;
exports.default = series(
  clean,
  parallel(html, js, css, img, browsersync, watching),
);
