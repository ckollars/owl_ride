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
    return gulp.src('./style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: [
        'last 20 versions',
        '> 5%',
        'ie 9',
        'ie 10'
      ],
      remove: true,
      cascade: true
    }))
    .pipe(gulp.dest('./'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(cssnano({processImport: false}))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream({match: '**/*.*.css'}));
});

//
//   ES lint
//
//////////////////////////////////////////////////////////////////////

gulp.task('lint', function() {
  return gulp.src('./-/js/*.js')
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
      '-/js/plugins/**/*.js',
      '-/js/*.js'
    ])
    .pipe(sourcemaps.init())
    .pipe(concat('scripts.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .on('error', handleError)
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./-/js/vendor/'))
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
        proxy: "CHANGE-THIS.dev",
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
    gulp.watch("-/scss/**/*.scss", ['css']);
    gulp.watch(["-/js/**/*.js", "!-/js/vendor/**.*.js"], ['lint', 'js']);
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
