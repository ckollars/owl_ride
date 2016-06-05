module.exports = {
  options: {
    plugins: [
      { removeViewBox: false },
      { removeUselessStrokeAndFill: false }
    ]
  },
  dist: {
    files: [{
        expand: true,
        cwd: '<%= pkg.themeFolder %>/svgs',
        src: ['*.svg'],
        dest: '<%= pkg.themeFolder %>/svgs/compressed'
    }]
  }
};
