const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const browserSync = require("browser-sync");
const crypto = require("crypto");
const hash = crypto.randomBytes(8).toString("hex");
const replace = require("gulp-replace");
const webpackStream = require("webpack-stream");
const webpack = require("webpack");
const webpackConfig = require("./webpack.config");
const webp = require("gulp-webp");
const rename = require("gulp-rename");
const imagemin = require("gulp-imagemin");

const bundleJs = (done) => {
  webpackStream(webpackConfig, webpack)
    .on("error", function (e) {
      console.error(e);
      this.emit("end");
    })
    .pipe(dest("./assets/dist/js"));
  done();
};

const compileSass = (done) => {
  src("./assets/src/scss/**/*.scss", { sourcemaps: true })
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(
      postcss([
        autoprefixer({
          grid: "autoplace",
          cascade: false,
        }),
      ])
    )
    .pipe(dest("./assets/dist/css", { sourcemaps: "./sourcemaps" }));
  done();
};

const imageminCompress = (done) => {
  src("./assets/src/img/**/*.{jpg,jpeg,png}")
    .pipe(imagemin())
    .pipe(dest("./assets/dist/img"));
    done();
};

const webpCompress = (done) => {
  src("./assets/src/img/**/*.{jpg,jpeg,png}")
    // rename処理を追加
    .pipe(
      rename(function (path) {
        path.basename += path.extname;
      })
    )
    .pipe(webp())
    .pipe(dest("./assets/dist/webp"));
  done();
};

function buildServer(done) {
  browserSync.init({
    port: 8080,
    // 静的サイト
    //  server: { baseDir: './' },
    // 動的サイト
    files: ["**/*"],
    proxy: "http://template.local/",
    open: true,
    watchOptions: {
      debounceDelay: 1000,
    },
  });
  done();
}

const browserReload = (done) => {
  browserSync.reload();
  done();
};

const cacheBusting = (done) => {
  src("./assets/dist/index.html")
    .pipe(replace(/\.(js|css)\?ver/g, ".$1?ver=" + hash))
    .pipe(dest("./assets/dist"));
  done();
};

const watchFiles = () => {
  watch("./assets/src/scss/**/*.scss", series(compileSass, browserReload));
  watch("./assets/src/js/**/*.js", series(bundleJs, browserReload));
  watch(
    "./assets/src/img/**/*.{jpg,jpeg,png}",
    series(imageminCompress, webpCompress, browserReload)
  );
};

module.exports = {
  sass: compileSass,
  bundle: bundleJs,
  webp: webpCompress,
  img: imageminCompress,
  cache: cacheBusting,
  default: parallel(buildServer, watchFiles),
};
