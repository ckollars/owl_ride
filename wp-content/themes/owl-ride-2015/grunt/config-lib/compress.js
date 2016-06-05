module.exports = {
  dist: {
    options: {
      mode: 'gzip'
    },
    expand: true,
    cwd: '<%= pkg.config.dist %>',
    src: ['**/*'],
    dest: '<%= pkg.config.prod %>'
  }
};
