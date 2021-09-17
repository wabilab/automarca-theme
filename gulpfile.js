// GULP PACKAGES
// Most packages are lazy loaded
var gulp = require("gulp"),
  path = require('path'),
  gutil = require("gulp-util"),
  notify = require("gulp-notify"),
  webpack = require("webpack-stream"),
 /*  browserSync = require("browser-sync").create(), */
  filter = require("gulp-filter"),
  touch = require("gulp-touch-cmd"),
  tildeImporter = require('node-sass-tilde-importer'),
  plugin = require("gulp-load-plugins")(),
  sass = require('gulp-sass')(require('sass'));

  

// GULP VARIABLES
// Modify these variables to match your project needs

// Set local URL if using Browser-Sync
const LOCAL_URL = "https://localhost:8888/automarca";

// Select Foundation components, remove components project will not use
const SOURCE = {
  scripts: [
    // Place custom JS here, files will be concantonated, minified if ran with --production
    "assets/scripts/js/**/*.js",
  ],

  // Scss files will be concantonated, minified if ran with --production
  styles: "assets/styles/scss/style-automarca.scss",

  // Images placed here will be optimized
  images: "assets/images/src/**/*",

  php: "**/*.php",
};

const ASSETS = {
  styles: "assets/styles/",
  scripts: "assets/scripts/",
  images: "assets/images/",
  images_webp: "assets/images/webp/",
  all: "assets/",
};

const JSHINT_CONFIG = {
  node: true,
  globals: {
    document: true,
    window: true,
    jQuery: true,
    $: true,
    Foundation: true,
  },
};

// GULP FUNCTIONS
// JSHint, concat, and minify JavaScript
gulp.task("scripts", function () {
  // Use a custom filter so we only lint custom JS
  const CUSTOMFILTER = filter(ASSETS.scripts + "js/**/*.js", { restore: true });

  return gulp
    .src(SOURCE.scripts)
    .pipe(
      webpack({
        mode: "development",
        entry: {
          "main-automarca": "./assets/scripts/js/main-scripts.js",
        },
        output: {
          filename: "./assets/scripts/[name].js",
        },
        module: {
          rules: [
            {
              loader: "webpack-modernizr-loader",
              test: /\.modernizrrc\.js$/,
              exclude: /node_modules/
              // Uncomment this when you use `JSON` format for configuration
              // type: 'javascript/auto'
            },
          ],
        },
        resolve: {
          alias: {
            modernizr$: path.resolve(__dirname, "./.modernizrrc.js"),
          },
        },
        externals: {
          jquery: "jQuery",
        },
      })
    )
    .pipe(
      plugin.plumber(function (error) {
        gutil.log(gutil.colors.red(error.message));
        this.emit("end");
      })
    )
    .pipe(plugin.sourcemaps.init())
    .pipe(CUSTOMFILTER)
    .pipe(plugin.jshint(JSHINT_CONFIG))
    .pipe(plugin.jshint.reporter("jshint-stylish"))
    .pipe(CUSTOMFILTER.restore)
    .pipe(plugin.concat("main-automarca.js"))
    .pipe(plugin.uglify())
    .pipe(plugin.sourcemaps.write(".")) // Creates sourcemap for minified JS
    .pipe(gulp.dest(ASSETS.scripts))
    .pipe(touch());
});

// Compile Sass, Autoprefix and minify
gulp.task("styles", function () {
  return gulp
    .src(SOURCE.styles)
    .pipe(
      plugin.plumber(function (error) {
        gutil.log(gutil.colors.red(error.message));
        this.emit("end");
      })
    )
    .pipe(plugin.sourcemaps.init({ largeFile: true }))
    .pipe(
      sass({

        includePaths: ["node_modules"],
        importer: tildeImporter,
      })
    )
    .pipe(
      plugin.autoprefixer({
        flexbox: true,
        browsers: ["last 2 versions", "ie >= 9", "ios >= 7"],
        cascade: false,
      })
    )
    .pipe(
      plugin.cssnano({
        safe: true,
        minifyFontValues: { removeQuotes: false },
      })
    )
    .pipe(plugin.sourcemaps.write(".", { addComment: false }))
    .pipe(gulp.dest(ASSETS.styles))
    .pipe(touch());
});

// Optimize images, move into assets directory
gulp.task("images", function () {
  return gulp
    .src(SOURCE.images)
    .pipe(
      plugin.imagemin({
        interlaced: true,
        progressive: true,
        optimizationLevel: 5,
        svgoPlugins: [
          {
            removeViewBox: true,
          },
        ],
      })
    )
    .pipe(gulp.dest(ASSETS.images))
    .pipe(touch());
});

gulp.task("webp", function () {
  return gulp
    .src(SOURCE.images + "/**/*.{gif,png,jpg}")
    .pipe(
      plugin.webp({
        quality: 80,
        method: 4,
      })
    )
    .pipe(gulp.dest(ASSETS.images_webp))
    .pipe(touch());
});

// gulp.task("translate", function () {
//   return gulp
//     .src(SOURCE.php)
//     .pipe(
//       plugin.wpPot({
//         domain: "jointswp",
//         package: "Example project",
//       })
//     )
//     .pipe(gulp.dest("file.pot"));
// });

// Browser-Sync watch files and inject changes
/* gulp.task("browsersync", function () {
  // Watch these files
  var files = [SOURCE.php];

  // browserSync.init(files, {
  //   proxy: LOCAL_URL,
  // });

  gulp
    .watch(SOURCE.styles, gulp.parallel("styles"))
    .on("change", browserSync.reload);
  gulp
    .watch(SOURCE.scripts, gulp.parallel("scripts"))
    .on("change", browserSync.reload);
  gulp
    .watch(SOURCE.images, gulp.parallel("images"))
    .on("change", browserSync.reload);
}); */

// Watch files for changes (without Browser-Sync)
gulp.task("watch", function () {
  // Watch .scss files
  gulp.watch(SOURCE.styles, gulp.parallel("styles"));

  // Watch scripts files
  gulp.watch(SOURCE.scripts, gulp.parallel("scripts"));

  // Watch images files
  gulp.watch(SOURCE.images, gulp.parallel("images"));

  gulp.watch([SOURCE.images + "/**/*.{gif,png,jpg}"], gulp.parallel("webp"));

});

// Run styles, scripts and foundation-js
gulp.task("default", gulp.parallel("styles", "scripts", "images", "webp"));
