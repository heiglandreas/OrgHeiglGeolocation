module.exports = function(grunt) {
    grunt.initConfig({
        clean: ['public/lib'],
        copy: {
            leaflet: {
                cwd: 'node_modules/leaflet/dist',
                src: '**/*',
                dest: 'public/lib/leaflet',
                expand: true
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('default', ['clean', 'copy']);
};