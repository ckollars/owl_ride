module.exports = {
  build: {
    options: {
      browsers: ['last 6 versions', 'ie 9'],
      map: {
        inline: true
      }
    },
    files: {
      '<%= pkg.themeFolder %>/css/main.min.css': '<%= pkg.themeFolder %>/css/main.min.css'
    }
  },
  dist: {
    options: {
      browsers: ['last 6 versions', 'ie 9'],
      map: false,
      cascade: false
    },
    files: {
      '<%= pkg.themeFolder %>/css/main.min.css': '<%= pkg.themeFolder %>/css/main.min.css'
    }
  }
};
