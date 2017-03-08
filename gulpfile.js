var gulp = require('gulp'),
    concatmap = require('gulp-concat-sourcemap'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    postcss = require('gulp-pleeease'),
    header = require('gulp-header'),
    sourcemaps = require('gulp-sourcemaps'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    gutil = require('gulp-util'),
    del = require('del'),
    fs = require('fs'),
    watch = require('gulp-watch'),
    dev = true,

    settings = {
        srcDirectory: "src/",
        css: {
            srcFile: "src/master.scss",
            header: "src/css/head.css",
            outputFile: "style.css",
            outputDirectory: "./",
            mapsDirectory: "./maps"
        },
        criticalcss: {
            srcFile: "src/critical.scss",
            outputFile: "critical.css",
            outputDirectory: "./"
        },
        js: {
            srcDirectory: "src/js/",
            outputDirectory: "./js/",
            syntaxCheck: ['src/js/plugins-bento/*.js', 'src/js/scripts.js'],
            bundleFiles: ['src/js/pluginsvendor/*.js', 'src/js/plugins-bento/*.js', 'src/js/scripts.js'],
            bundleOutput: 'bundled.js',
            bundleOutputMin: 'bundled.js'
        }
    };

gulp.task('css', function () {
    return gulp.src(settings.css.srcFile).pipe(plumber()).pipe(sass({
        sourceComments: false,
        imagePath: '../img',
        outputStyle: 'nested'
    })).pipe(rename(settings.css.outputFile)).pipe(postcss({
        'sourcemaps': false,
        'autoprefixer': true,
        'filters': true,
        'rem': true,
        'pseudoElements': true,
        'opacity': true,
        'import': true,
        'calc': true,
        'mqpacker': !dev,
        'minifier': !dev,
        'next': false
    })).pipe(header(fs.readFileSync(settings.css.header, 'utf8'))).pipe(gulp.dest(settings.css.outputDirectory)).pipe(notify({
        title: "SASS done",
        message: "Sass is done",
        onLast: true
    }))
});

gulp.task('criticalcss', function () {
    return gulp.src(settings.criticalcss.srcFile).pipe(sass({
        sourceComments: false,
        imagePath: '../img',
        outputStyle: 'nested'
    })).pipe(rename(settings.criticalcss.outputFile))
        .pipe(postcss({
            'sourcemaps': false,
            'autoprefixer': true,
            'filters': true,
            'rem': true,
            'pseudoElements': true,
            'opacity': true,
            'import': true,
            'calc': true,
            'mqpacker': !dev,
            'minifier': !dev,
            'next': false
        }))
        .pipe(gulp.dest(settings.criticalcss.outputDirectory))
});

gulp.task('lint', function () {
    gulp.src(settings.js.syntaxCheck).pipe(plumber()).pipe(jshint())
        // Use gulp-notify as jshint reporter
        .pipe(notify(function (file) {
            if (file.jshint.success) {
                // Don't show something if success
                return false;
            }
            var errors = file.jshint.results.map(function (data) {
                if (data.error) {
                    return "(" + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
                }
            }).join("\n");
            return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
        }));
});

gulp.task('clean:js', function (cb) {
    del([settings.js.outputDirectory], cb)
});

gulp.task('clean:css', function (cb) {
    del([settings.css.outputDirectory + settings.css.outputFile, settings.css.mapsDirectory], cb)
});

gulp.task('clean:criticalcss', function (cb) {
    del([settings.criticalcss.outputDirectory + settings.criticalcss.outputFile], cb)
});

gulp.task('minify', function () {
    var files = settings.js.bundleFiles.slice(0);
    for (var i = 0; i < files.length; i++) {
        files[i] = '!' + files[i]
    }

    files.push(settings.js.srcDirectory + '**/*.js');
    return gulp.src(files).pipe(plumber()).pipe(dev ? gutil.noop() : uglify()).pipe(gulp.dest(settings.js.outputDirectory)).pipe(notify({
        title: "Minification",
        message: "Minification is done",
        onLast: true
    }))
});

gulp.task('jsbundle', function () {
    gulp.src(settings.js.bundleFiles).pipe(plumber()).pipe(concatmap(settings.js.bundleOutput, {sourceRoot: '../'})).pipe(gulp.dest(settings.js.outputDirectory)).pipe(notify({
        title: "Bundle done",
        message: "Bundle of files done",
        onLast: true
    }))
});

gulp.task('jsbundlemin', function () {
    gulp.src(settings.js.bundleFiles).pipe(plumber()).pipe(concat(settings.js.bundleOutputMin)).pipe(uglify()).pipe(gulp.dest(settings.js.outputDirectory))
});

gulp.task('watch', ['css', 'criticalcss', 'lint', 'jsbundle', 'minify'], function () {
    var files = settings.js.bundleFiles.slice(0);
    for (var i = 0; i < files.length; i++) {
        files[i] = '!' + files[i]
    }

    files.unshift(settings.js.srcDirectory + '**/*.js');
    gulp.watch(settings.srcDirectory + '**/*.scss', ['css', 'criticalcss']);
    gulp.watch(settings.js.bundleFiles, ['jsbundle']);
    gulp.watch(files, ['minify']);
});

gulp.task('_setprod', function () {
    dev = false;
});

gulp.task('clean', ['clean:css', 'clean:criticalcss', 'clean:js']);
gulp.task('build', ['_setprod', 'css', 'criticalcss', 'lint', 'jsbundlemin', 'minify']);
gulp.task('default', function () {
    console.log("Use 'gulp watch' to start a sass compiler session or 'gulp build' to build the project");
    console.log("Use 'gulp clean' to clean compiled results");
    console.log("Use 'gulp build' to get production code");
});