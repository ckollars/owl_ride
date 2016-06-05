module.exports = {
  build: {
    options: {
      style: 'compressed',
      sourcemap: 'inline'
    },
    files: {
      '<%= pkg.themeFolder %>/css/main.min.css': '<%= pkg.themeFolder %>/scss/main.scss'
    }
  },
  dist: {
    options: {
      style: 'compressed',
      sourcemap: 'none'
    },
    files: {
      '<%= pkg.config.dist %>/css/main.min.css': '<%= pkg.config.src %>/scss/main.scss'
    }
  }
};
