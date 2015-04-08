var gulp            = require('gulp');
var sym             = require('gulp-sym');

/* dirs */
var targetBase     = '../clean';

gulp.task('mapping', function() {
    var dof = 'templates/simple';
    gulp.src('code/' + dof)
        .pipe(sym(targetBase + '/' + dof, {force:true})); 

    dof = 'language/en-GB/en-GB.tpl_simple.sys.ini';
    gulp.src('code/' + dof)
        .pipe(sym(targetBase + '/' + dof, {force:true}));

    dof = 'language/en-GB/en-GB.tpl_simple.ini';
    gulp.src('code/' + dof)
        .pipe(sym(targetBase + '/' + dof, {force:true}));

});

gulp.task('default', function (){
    gulp.start('mapping');
});

