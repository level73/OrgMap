module.exports = function(grunt){
  "use strict";

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less: {
      process: {
        options: {
          paths: ['css/less'],
        },
        files: {
          'css/<%= pkg.name %>.css': 'css/less/main.less'
        }
      }
    },
    watch: {
      less: {
        files: 'css/less/*',
        tasks: 'less:process'
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['watch']);

}
