module.exports = {
    options: {
      appleTouchBackgroundColor: '#ffffff',
      tileColor: '#ef4036',
      appleTouchPadding: 34,
      trueColor: true,
      html: '<%= pkg.config.src %>/favicons/build/index.html',
      HTMLPrefix: 'favicons/'
    },
    icons: {
      src: '<%= pkg.config.src %>/favicons/logo.png',
      dest: '<%= pkg.config.src %>/favicons/build'
    }
};
