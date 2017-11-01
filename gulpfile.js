'use strict';

const gulp = require('gulp');
const browserSync = require('browser-sync');

gulp.task('browser-sync', function(done) {
	browserSync.reload();
	done();
});

gulp.task('default', function server() {

	browserSync({
		proxy: "http://souz2.ru/",
		port: 3000,
		notify: false,
		open: false,
	});

	gulp.watch([
		'**/*.php',
		'**/*.css',
	], gulp.series('browser-sync'));

});