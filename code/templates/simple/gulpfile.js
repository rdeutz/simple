var gulp         = require('gulp');
var concat       = require('gulp-concat');
var clean        = require('gulp-rimraf');
var less         = require('gulp-less');
var minifycss    = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var uglify       = require('gulp-uglify');
var notify			= require('gulp-notify');
var browserSync     = require('browser-sync');
var reload          = browserSync.reload;

/* dirs */
var assetsDir    = 'assets';
var lessDir      = assetsDir + '/less';
var jsDir        = assetsDir + '/js';
var targetCss    = 'css';
var targetJs     = 'js';
var targetFont   = 'fonts';

var scripts = [
	assetsDir + '/bower/bootstrap/dist/bootstrap.js',
	assetsDir + '/bower/jquery/dist/jquery.js',
	assetsDir + '/bower/modernizr/modernizr.js',
 	jsDir + '/simple.js'
 	];

gulp.task('mergeScripts', function() {
	gulp.src(scripts)
		.pipe(concat('simple.js'))
		.pipe(uglify())
		.pipe(gulp.dest(targetJs));
});

gulp.task('clean', function() {
	gulp.src([targetCss + '/*.css', targetJs + '/*.js', targetFont + '/*'], {read:false})
		.pipe(clean());
});

gulp.task('copyFonts', function(){
	gulp.src(assetsDir + '/bower/font-awesome/fonts/*')
		.pipe(gulp.dest(targetFont));

	gulp.src(assetsDir + '/bower/bootstrap/fonts/*')
		.pipe(gulp.dest(targetFont));

});

gulp.task('css', function(){
	return gulp.src('assets/less/simple.less')
			.pipe(less())
			.pipe(minifycss())
			.pipe(autoprefixer('last 20 version'))
			.pipe(gulp.dest(targetCss));
});

gulp.task('cssdev', function(){
	return gulp.src('assets/less/simple.less')
			.pipe(less())
			.on('error',function (err) {
				console.log(err.toString());
				this.emit('end');
			})	
			.pipe(autoprefixer('last 20 version'))
			.pipe(notify('cssdev done'))
			.pipe(gulp.dest(targetCss))
			.pipe(reload({stream:true}));
});

gulp.task('watch', ['connect'], function() {
    gulp.watch(lessDir + '/**/*.less', ['cssdev']);
    gulp.watch(jsDir + '/**/*.js', ['mergescripts']);
});

gulp.task('connect', function() {
	browserSync({
        proxy: "localhost"
    });
});

gulp.task('default', ['clean'], function(){
	gulp.start(['copyFonts', 'css', 'mergeScripts']);
});
