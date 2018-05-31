var gulp        = require('gulp');
var browserSync = require('browser-sync').create();

gulp.task('default', function() {
    browserSync.init({
        proxy: "http://127.0.0.1/han"
    });
    gulp.watch([
      "*.php",
      "./partials/*.php",
      "./includes/*.php",
      "./assets/css/*.css"
    ]).on("change", browserSync.reload);
});
