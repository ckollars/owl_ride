module.exports = function (grunt) {
  'use strict';

  // Build icon styles from svg using Grunticon
  grunt.registerTask(
    'icons',
    'Serves svg styles and backup pngs.',
    ['svgmin', 'grunticon', 'cssmin']
  );

  grunt.registerTask(
    'fav-icons',
    'Build all favicons',
    ['favicons']
  );

  // CSS Build
  grunt.registerTask(
    'build-styles',
    'CSS build.',
    ['sass:build', 'autoprefixer:build' ]
  );

  // Build js scripts for development
  grunt.registerTask(
    'build-scripts',
    'Concat all scripts for devlopment',
    ['concat:dev', 'uglify:dev']
  );

  // Build js scripts for development
  grunt.registerTask(
    'copy-dev-assets',
    'Copy assets over to _dev folder',
    ['copy:devImages', 'copy:devVendorScripts', 'copy:devHTML']
  );

  // Development
  grunt.registerTask(
    'server',
    'Build a development (_dev) site with watch the comand running.',
    ['build-styles', 'build-scripts', 'copy-dev-assets', 'notify', 'watch' ]
  );

  // Distribution
  grunt.registerTask(
    'dist',
    'Build a development (_dist) site for Amazon s3.',
    ['icons', 'favicons', 'sass:dist', 'autoprefixer:dist', 'concat:dist', 'uglify:dist', 'copy:distAssets', 'compress' ]
  );

};
