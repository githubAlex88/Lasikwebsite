'use strict';

const SRC = 'src';
const PUBLIC = '../';


const gulp = require('gulp');
const connect = require('gulp-connect');
const scss = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const include = require('gulp-include');
const _size = require('gulp-size');
const imagemin = require('gulp-imagemin');
const rename = require('gulp-rename');
const rollup = require('rollup').rollup;
const babel = require('rollup-plugin-babel');
const resolve = require('rollup-plugin-node-resolve');
const commonjs = require('rollup-plugin-commonjs');
const replace = require('rollup-plugin-replace');
const uglify = require('rollup-plugin-uglify');
const json = require("rollup-plugin-json");
const svgSprite = require('gulp-svg-sprite');
const optipng = require('imagemin-optipng');
const htmlmin = require('gulp-htmlmin');


const plumber = require('gulp-plumber');  // TDO: remove

///////////////////////////////////////////////////////////
// Local server
///////////////////////////////////////////////////////////
gulp.task('connect', function() {
  connect.server({
    port: 8000,
    root: 'public',
    livereload: true
  });
});

///////////////////////////////////////////////////////////
// Process images
///////////////////////////////////////////////////////////
gulp.task('images', () => {
  return gulp.src(`${SRC}/images/**/*.*`)
    .pipe(imagemin([
      imagemin.optipng({optimizationLevel: 7}) // maxlevel 7
    ], {
        // setting interlaced to true. link: [ https://goo.gl/G7kt0S ]
        verbose: true, // show in console optimization
    }))
    .pipe(_size({ title: '==> process:images: ' }))
    .pipe(gulp.dest(`${PUBLIC}/assets/images/`))
    .pipe(connect.reload());
});


///////////////////////////////////////////////////////////
// Compiling Styles
///////////////////////////////////////////////////////////
gulp.task('styles', () => {
  return gulp.src(`${SRC}/scss/main.scss`)
    .pipe(sourcemaps.init())
    .pipe(scss({
      includePaths: [
        './node_modules/**',
      ],
      // outputStyle: 'compressed',
    }).on('error', scss.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false,
    }))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write())
    .pipe(rename('style.css'))
    .pipe(gulp.dest(`${PUBLIC}`))
    .pipe(connect.reload());
});


///////////////////////////////////////////////////////////
// Compiling HTML Templates
///////////////////////////////////////////////////////////
gulp.task('templates', () => {
  return gulp.src(`${SRC}/templates/pages/**/*.html`)
    .pipe(include())
      .on('error', console.log)
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest(`${PUBLIC}`))
    .pipe(connect.reload());
});


///////////////////////////////////////////////////////////
// Fonts
///////////////////////////////////////////////////////////
gulp.task('fonts', () => {
  return gulp.src(`${SRC}/fonts/**/*.*`)
    .pipe(gulp.dest(`${PUBLIC}/assets/fonts/`))
    .pipe(connect.reload());
});


///////////////////////////////////////////////////////////
// Compiling JS
///////////////////////////////////////////////////////////
gulp.task('js', (done) => {
  rollup({
    input: `${SRC}/js/index.js`,
    plugins: [
      json(),
      resolve({
        jsnext: true,
        main: true,
        browser: true
      }),
      commonjs({
        // non-CommonJS modules will be ignored, but you can also
        // specifically include/exclude files
        include: "node_modules/**", // Default: undefined
        // search for files other than .js files (must already
        // be transpiled by a previous plugin!)
        extensions: [".js"], // Default: [ '.js' ]
        // if true then uses of `global` won't be dealt with by this plugin
        ignoreGlobal: false, // Default: false
        // if false then skip sourceMap generation for CommonJS modules
        sourceMap: true, // Default: true
        // sometimes you have to leave require statements
        // unconverted. Pass an array containing the IDs
        // or a `id => boolean` function. Only use this
        // option if you know what you're doing!
        ignore: ["conditional-runtime-dependency"]
      }),
      babel({
        presets: ["es2015-rollup", "stage-2"],
        exclude: 'node_modules/**',
        runtimeHelpers: true,
      }),
      replace({
        ENV: JSON.stringify(process.env.NODE_ENV || 'development')
      }),
      uglify(),
      (process.env.NODE_ENV === 'production' && uglify())
    ]
  })
  .then( bundle => {
    bundle.write({
      file: `${PUBLIC}/assets/js/main.js`,
      sourceMap: 'inline',
      format: 'iife',
    })
    done();
  })
  .catch(err => {
    console.log(err)
    done()
  })
});


///////////////////////////////////////////////////////////
// Process svg
///////////////////////////////////////////////////////////
gulp.task('svg', () => {
  return gulp.src(`${SRC}/svg/**.svg`, { cwd: '' })
  .pipe(svgSprite( {
    mode: {
      symbol: {
        bust: false,
        layout: 'vertical'
      }
    }
  }))
  .pipe(gulp.dest(`${PUBLIC}/assets/svg`))
  .pipe(connect.reload());
});


///////////////////////////////////////////////////////////
// Watch tasks
///////////////////////////////////////////////////////////
gulp.task('watch:styles', () => {
  gulp.watch(`${SRC}/scss/**/*.scss`, gulp.series('styles'));
});

gulp.task('watch:templates', () => {
  gulp.watch(`${SRC}/templates/**/*.html`, gulp.series('templates'));
});

gulp.task('watch:images', () => {
  gulp.watch(`${SRC}/images/**/*.*`, gulp.series('images'));
});

gulp.task('watch:svg', () => {
  gulp.watch(`${SRC}/svg/**/*.*`, gulp.series('svg'));
});

gulp.task('watch:js', () => {
  gulp.watch(`${SRC}/js/**/*.*`, gulp.series('js'));
});

gulp.task('watch:fonts', () => {
  gulp.watch(`${SRC}/fonts/**/*.*`, gulp.series('fonts'));
});


///////////////////////////////////////////////////////////
// Main tasks
///////////////////////////////////////////////////////////
const taskStack = ['js', 'styles', 'svg', 'fonts']
const watchStack = taskStack.filter((task) => task !== 'svg').map((task) => 'watch:' + task)
gulp.task('watch',
  gulp.series(taskStack,
    gulp.parallel.apply(null, watchStack)
  )
);

gulp.task('build',
  gulp.series(taskStack)
);

gulp.task('default',
  gulp.parallel(['connect', 'watch'])
);