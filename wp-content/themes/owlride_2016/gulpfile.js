var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    browserSync = require('browser-sync'),
    concat = require('gulp-concat'),
    eslint = require('gulp-eslint'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify');

//
//   CSS
//
//////////////////////////////////////////////////////////////////////

gulp.task('css', function () {
    return gulp.src('./_source/scss/styles.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: [
        '> 5%',
      ],
      remove: true,
      cascade: true
    }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(cssnano({processImport: false}))
    .pipe(sourcemaps.write('./_source/maps'))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream({match: '**/*.*.css'}));
});

//
//   ES lint
//
//////////////////////////////////////////////////////////////////////

gulp.task('lint', function() {
  return gulp.src('./_source/js/*.js')
    .pipe(eslint({
      rules: {
        'quotes': 0,
        'no-multi-spaces': [
          1, {
            'exceptions': {
              'VariableDeclarator': true
            }
          }
        ]
      },
      globals: {
        'jQuery':            false,
        '$':                 true,
        'imagesLoaded':      false,
        'Modernizr':         false,
        'templateDirectory': false,
        'Handlebars':        false,
        'IconicJS':          false,
        'ajaxpagination':    false
      },
      envs: [
        'browser'
      ]
    }))
    .pipe(eslint.format());
});

//
//   Javascript
//
//////////////////////////////////////////////////////////////////////

gulp.task('js', function(){
  return gulp.src([
      './_source/js/plugins/**/*.js',
      './_source/js/*.js'
    ])
    .pipe(sourcemaps.init())
    .pipe(concat('scripts.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .on('error', handleError)
    .pipe(sourcemaps.write('../_source/maps'))
    .pipe(gulp.dest('./js'))
    .pipe(browserSync.reload({stream:true, once: true}));
});

//
//   Browser Sync
//
//////////////////////////////////////////////////////////////////////

gulp.task('browser-sync', function() {
    // Documentaion on browser sync is at: browsersync.io
    // It's really rad.
    browserSync.init(null, {
        proxy: "owlride.local",
    });
});

gulp.task('bs-reload', function () {
    browserSync.reload();
});

//
//   Default Tasks
//
//////////////////////////////////////////////////////////////////////

gulp.task('default', ['css', 'lint', 'js', 'browser-sync'], function () {
    gulp.watch("_source/scss/**/*.scss", ['css']);
    gulp.watch(["_source/js/**/*.js", "!_source/js/vendor/**.*.js"], ['lint', 'js']);
    gulp.watch("./**/*.php", ['bs-reload']);
});


//
//   Error Handling
//
//////////////////////////////////////////////////////////////////////

function handleError (error) {
  //If you want details of the error in the console
  console.log('WARNING!', error.message.toString());
  this.emit('end');
}
