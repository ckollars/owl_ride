module.exports = {
  dev: {
    files: {
      '<%= pkg.themeFolder %>/js/dist/compiled.min.js': '<%= pkg.themeFolder %>/js/dist/compiled.js'
    }
  },
  dist: {
    files: {
      '<%= pkg.config.dist %>/js/compiled.min.js': '<%= pkg.config.dist %>/js/compiled.js'
    }
  }
};
