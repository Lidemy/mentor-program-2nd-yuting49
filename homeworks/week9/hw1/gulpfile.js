
const gulp = require('gulp');
const postcss = require('gulp-postcss');
const autoprefixer = require('gulp-autoprefixer');
const paths = {
	src: './src',
	bulid: './bulid'
}
function styles(){
    return gulp.src('./src/style.CSS')  
    .pipe(autoprefixer({
        browsers: ['last 10 versions'],
        cascade: false
    }))
    .pipe(gulp.dest(paths.bulid))
}

var build = gulp.series(styles);
exports.styles = styles;
exports.build = build;
//gulp.task('default', ['clean', 'css']);
//gulp.task('default', runSequence('clean', 'css'));
//gulp.task('default', gulp.parallel('scripts', 'styles'));
exports.default = build;

