module.exports = {
  target: {
    options: {

    },
    files: [
      {'<%= pkg.themeFolder %>/css/icons.data.png.min.css': ['<%= pkg.themeFolder %>/css/icons.data.png.css']},
      {'<%= pkg.themeFolder %>/css/icons.data.svg.min.css': ['<%= pkg.themeFolder %>/css/icons.data.svg.css']},
      {'<%= pkg.themeFolder %>/css/icons.fallback.min.css': ['<%= pkg.themeFolder %>/css/icons.fallback.css']},
    ]
  }
};
