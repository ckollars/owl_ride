module.exports = function (grunt) {
  'use strict';

  function loadConfig(path) {
    var glob = require('glob'),
      object = {},
      key;

    glob.sync('*', {
      cwd: path
    }).forEach(function (option) {
      key = option.replace(/\.js$/, '');
      if (!object.hasOwnProperty(key)) {
        object[key] = {};
      }
      grunt.util._.extend(object[key], require(path + option));
    });

    return object;
  }

  var config = {
    pkg: grunt.file.readJSON('package.json'),
    aws: grunt.file.readJSON("aws-credentials.json")
  };



  grunt.util._.merge(config, loadConfig('./grunt/config-lib/'));

  grunt.initConfig(config);

  // Show elapsed time after tasks run.
  require('time-grunt')(grunt);

  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.loadTasks('grunt');

};
