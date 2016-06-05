module.exports = {
  devImages: {
    files: [
      { expand: true, flatten: true, cwd: '<%= pkg.themeFolder %>/img', src: '**/*', dest: '<%= pkg.themeFolder %>/_dev/img' }
    ]
  },
  devGrunticon: {
    files: [
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/css/img/icon-png', src: '*.png', dest: '<%= pkg.config.dev %>/img/icon-png' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/css', src: '*.min.css', dest: '<%= pkg.config.dev %>/css' }
    ]
  },
  devVendorScripts: {
    files: [
      // Modernizer
      { expand: true, flatten: true, cwd: '<%= pkg.themeFolder %>/js/libs', src: 'modernizr.min.js', dest: '<%= pkg.themeFolder %>/_dev/js' }
    ]
  },
  devHTML: {
    files: [
      { expand: true, flatten: true, cwd: '<%= pkg.themeFolder %>', src: '*.html', dest: '<%= pkg.themeFolder %>/_dev' },
    ]
  },
  devFavicons: {
    files: [
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/favicons/build', src: ['*.png', '*.ico'], dest: '<%= pkg.config.dev %>/favicons' }
    ]
  },
  distAssets: {
    files: [
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/img', src: '**/*', dest: '<%= pkg.config.dist %>/img' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/css/img/icon-png', src: '*.png', dest: '<%= pkg.config.dist %>/img/icon-png' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/css/', src: '*.min.css', dest: '<%= pkg.config.dist %>/css' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/js/libs', src: 'modernizr.min.js', dest: '<%= pkg.config.dist %>/js' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/js/libs', src: 'picturefill.min.js', dest: '<%= pkg.config.dist %>/js' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>', src: '*.html', dest: '<%= pkg.config.dist %>' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/video', src: '**', dest: '<%= pkg.config.dist %>/video' },
      { expand: true, flatten: true, cwd: '<%= pkg.config.src %>/favicons/build', src: ['*.png', '*.ico'], dest: '<%= pkg.config.dist %>/favicons' }
    ]
  }

};
