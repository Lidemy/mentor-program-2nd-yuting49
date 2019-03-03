const gulp = require('gulp');
// 引入plugin
const clean = require('gulp-clean');//Removes files and folders
const sass = require('gulp-sass');//SASS to CSS
const babel = require('gulp-babel');//es6 to es5
const cleanCSS = require('gulp-clean-css');//minify CSS
const uglify = require('gulp-uglify');//minify JavaScript 
const concat = require('gulp-concat');//merge files
const rename = require('gulp-rename');//rename files
sass.compiler = require('node-sass');

function cleanfiles(){      
    return gulp.src('./dist', {read: false})
    .pipe(clean());      
};

function scsstocss(){
    return gulp.src('./src/*.scss') 
    .pipe(sass().on('error', sass.logError)) 
    .pipe(gulp.dest('./dist'))
}

function jstoes5(){
    return gulp.src('./src/*.js')
    .pipe(babel({
        presets: ['@babel/env']
    }))
    .pipe(gulp.dest('./dist'))
}

function minifycss(){
    return gulp.src('./dist/*.css')
    .pipe(concat('main.CSS'))
    .pipe(cleanCSS({debug: true}, (details) => {
      console.log(`${details.name}: ${details.stats.originalSize}`);
      console.log(`${details.name}: ${details.stats.minifiedSize}`);
    }))
    .pipe(rename(function(path){
        path.basename += '.min';
        path.extname = '.CSS';
    }))
    .pipe(gulp.dest('./dist'));
};

function minifyjs(){
    return gulp.src('./dist/*.js')
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(rename(function(path){
        path.basename += '.min';
        path.extname = '.js';
    }))
    .pipe(gulp.dest('./dist'));
};

var build = gulp.series(  
    cleanfiles, 
    gulp.parallel(scsstocss, jstoes5), 
    gulp.parallel(minifycss, minifyjs) 
);

exports.cleanfiles = cleanfiles;
exports.scsstocss = scsstocss;
exports.jstoes5 = jstoes5;
exports.minifycss = minifycss;
exports.minifyjs = minifyjs;

exports.default = build;

