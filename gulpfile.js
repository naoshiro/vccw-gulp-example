// Module
// ---------------------------------------------
const gulp = require('gulp');
const browser = require('browser-sync');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const changed = require('gulp-changed');
const del = require('del');
const plumber = require('gulp-plumber');
const browserify = require('browserify');
const xtend = require('xtend');
const watchify = require('watchify');
const source = require('vinyl-source-stream');
const babelify = require('babelify');
const uglify = require('gulp-uglify');


// Path
// ---------------------------------------------
const path = {
  plugin: {
    dist: './www/public/wp-content/plugins',
    src: './src/plugins'
  },
  theme: {
    dist: './www/public/wp-content/themes/vgex',
    src: './src/theme'
  }
}

// Copy
// ---------------------------------------------
gulp.task('theme-copy', ()=> {
  gulp.src(path.theme.src + '/**/*.+(jpg|jpeg|png|gif|svg|ico|php|css)')
    .pipe(changed(path.theme.dist))
    .pipe(gulp.dest(path.theme.dist));
});
gulp.task('plugin-copy', ()=> {
  gulp.src(path.plugin.src + '/**/*')
    .pipe(changed(path.plugin.dist))
    .pipe(gulp.dest(path.plugin.dist));
});


// Sass
// ---------------------------------------------
gulp.task('sass', ()=> {
  gulp.src(path.theme.src + '/assets/css/style.scss')
    .pipe(sass({
      includePaths: ['./node_modules/bootstrap/scss'],
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions', 'ie 9', 'Android >= 3'],
      cascade: false
    }))
    .pipe(gulp.dest(path.theme.dist + '/assets/css/'));
});


// browserify
// ---------------------------------------------
var watching = false;
gulp.task('enable-watch-mode', ()=> watching = true);

gulp.task('watchjs', ['enable-watch-mode'], ()=> {
  gulp.start('js');
});

gulp.task('js', ()=> {
  var bundler = browserify({
    entries: [path.theme.src + '/assets/js/script.js'],
    extensions: ['.js'],
    transform: ['babelify'],
    plugin: ['licensify'],
    debug: true
  });

  if (watching) {
    bundler = watchify(bundler);
    bundler.on('update', ()=> {
      rebundle();
    });
  }
  rebundle();

  function rebundle() {
    bundler
    .bundle()
    .on('error', (err)=> {
      console.log('Error: ' + err.message);
    })
    .pipe(source('script.js'))
    .pipe(gulp.dest(path.theme.dist + '/assets/js/'));
  }
});

// Compress
// ---------------------------------------------
gulp.task('uglify', () => {
  gulp.src(path.theme.dist + '/assets/js/script.js')
    .pipe(uglify({
      preserveComments: 'license'
    }))
    .pipe(gulp.dest(path.theme.dist + '/assets/js/'));
});

// Clean
// ---------------------------------------------
gulp.task('theme-clean', ()=> {
  del([path.theme.dist]);
});
gulp.task('plugin-clean', ()=> {
  del([path.plugin.dist]);
});

// browsersync
// ---------------------------------------------
gulp.task("browsersync", function() {
  browser({
    proxy: "vccw-gulp-example.dev"
  });
});

// Compress
// ---------------------------------------------
gulp.task('uglify', () => {
  gulp.src(path.theme.dist + '/assets/js/script.js')
    .pipe(uglify({
      preserveComments: 'license'
    }))
    .pipe(gulp.dest(path.theme.dist + '/assets/js/'));
});


// task
// ---------------------------------------------
gulp.task('build', ['plugin-copy', 'theme-copy', 'sass', 'js']);
gulp.task('compress', ['uglify']);

gulp.task('dev', ['browsersync'], ()=> {
  gulp.watch(path.plugin.src + '/**/*', ['plugin-copy']);
  gulp.watch(path.theme.src + '/**/*.+(jpg|jpeg|png|gif|svg|ico|php)', ['theme-copy']);
  gulp.watch(path.theme.src + '/**/*.scss', ['sass']);
  gulp.watch(path.theme.src + '/**/*.js', ['js']);

  var timer;
  gulp.watch(path.theme.dist + '/**/*', ()=> {
    clearTimeout(timer);
    timer = setTimeout(browser.reload, 400);
  });
});
