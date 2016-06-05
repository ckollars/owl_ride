module.exports = {
  options: {
    livereload: true,
    spawn: false
  },
  configFiles: {
    files: [ 'Gruntfile.js', 'grunt/tasks.js', 'grunt/config-lib/*.js' ],
    options: {
      reload: true
    }
  },
  sass: {
    files: ['<%= pkg.themeFolder %>/scss/**/*.scss'],
    tasks: ['build-styles']
  },
  js: {
    files: ['<%= pkg.themeFolder %>/js/src/*.js', '<%= pkg.themeFolder %>/js/libs/**/*'],
    tasks: ['build-scripts']
  },
  php: {
    files: ['<%= pkg.themeFolder %>/**/*.php']
  },
  images: {
    files: ['<%= pkg.themeFolder %>/img/**/*'],
    tasks: ['copy:devImages']
  }
};
