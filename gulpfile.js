var gulp=require('gulp'),
	uglify=require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	postcss = require('gulp-postcss'),
	csswring = require('csswring'),
	precss = require('precss'),
	cssnext = require('postcss-cssnext');
	


function errorLog(error) {
	console.error.bind(error);
	this.emit('end');
}

//image task
//compress

gulp.task ('image', function() {
	gulp.src('images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('build/images'))
});
	
//Scripts Task
//Uglifies

gulp.task ('scripts', function() {
	gulp.src('js/*.js')
		.pipe(uglify())
		.on('error', errorLog)
		.pipe(gulp.dest('build/js'));
});

//styles task
//minimizes and prefixes
gulp.task ('styles', function() {
	var processors = [precss({}),
		cssnext({}),
		csswring
	];
	
	gulp.src('css/**/*.css')
		.pipe(postcss(processors))
    	.pipe(gulp.dest('build/css'));
});


//watch task
//watches js
gulp.task ('watch', function() {
	
	gulp.watch('js/*.js', ['scripts']);
	gulp.watch('css/**/*.css',['styles']);
});
	
gulp.task('default', ['scripts', 'styles', 'watch']);

