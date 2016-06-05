module.exports = {
  options: {
    separator: ';',
    stripBanners: true
  },
  dev: {
    src: ['bower_components/jquery/dist/jquery.js', '<%= pkg.themeFolder %>/js/libs/**/*', '<%= pkg.themeFolder %>/js/src/*.js', '!<%= pkg.themeFolder %>/js/libs/modernizr.min.js', '!<%= pkg.themeFolder %>/js/libs/picturefill.min.js'],
    dest: '<%= pkg.themeFolder %>/js/dist/compiled.js'
  },
  dist: {
    src: ['<%= pkg.config.src %>/bower_components/jquery/dist/jquery.min.js', '<%= pkg.config.src %>/js/libs/**/*', '<%= pkg.config.src %>/js/*.js', '!<%= pkg.config.src %>/js/libs/modernizr.min.js', '!<%= pkg.config.src %>/js/libs/picturefill.min.js'],
    dest: '<%= pkg.config.dist %>/js/compiled.js'
  }
};
