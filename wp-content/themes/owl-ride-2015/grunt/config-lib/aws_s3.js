module.exports = {
  options: {
    accessKeyId: '<%= aws.AWSAccessKeyId %>', // Use the variables
    secretAccessKey: '<%= aws.AWSSecretKey %>', // You can also use env variables
    region: 'us-west-2',
    uploadConcurrency: 10, // 10 simultaneous uploads
    downloadConcurrency: 5 // 5 simultaneous downloads
  },
  dev: {
    options: {
      bucket: 'daymcgill',
      differential: true, // Only uploads the files that have changed
      //gzipRename: 'ext' // when uploading a gz file, keep the original extension
    },
    files: [
      {expand: true, cwd: 'wp-content/themes/mcgill-bros/_dev/', src: ['**'], dest: '', action: 'upload'},
    ]
  },
  staging: {
    options: {
      bucket: 'staging.surehang.com',
      //differential: true, // Only uploads the files that have changed
      gzipRename: 'ext', // when uploading a gz file, keep the original extension
      params: {
        ContentEncoding: 'gzip', // applies to all the files!
        CacheControl: 'max-age=2592000'
      }
    },
    files: [
      {expand: true, cwd: '<%= pkg.config.prod %>', src: ['*.html'], dest: ''},
      {expand: true, cwd: '<%= pkg.config.prod %>/css', src: ['**'], dest: '/css'},
      {expand: true, cwd: '<%= pkg.config.prod %>/js', src: ['**'], dest: '/js'},
      {expand: true, cwd: '<%= pkg.config.prod %>/favicons', src: ['**'], dest: '/favicons'},
      {expand: true, cwd: '<%= pkg.config.prod %>/video', src: ['**'], dest: '/video', },
      {expand: true, cwd: '<%= pkg.config.prod %>/img', src: ['**'], dest: '/img', stream: true},
    ]
  },
  production: {
    options: {
      bucket: 'www.surehang.com',
      params: {
        ContentEncoding: 'gzip', // applies to all the files!
        CacheControl: 'max-age=2592000'
      }
    },
    files: [
      {expand: true, cwd: '<%= pkg.config.dist %>', src: ['*.html'], dest: ''},
      {expand: true, cwd: '<%= pkg.config.dist %>/css', src: ['**'], dest: '/css'},
      {expand: true, cwd: '<%= pkg.config.dist %>/js', src: ['**'], dest: '/js'},
      {expand: true, cwd: '<%= pkg.config.dist %>/favicons', src: ['**'], dest: '/favicons'},
      {expand: true, cwd: '<%= pkg.config.dist %>/video', src: ['**'], dest: '/video', },
      {expand: true, cwd: '<%= pkg.config.dist %>/img', src: ['**'], dest: '/img', stream: true} // enable stream to allow large files
    ]
  }
};
