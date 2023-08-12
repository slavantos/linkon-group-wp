const gulp = require('gulp');
const sass = require('gulp-sass');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');

/*
Преобразование sass в css и минификация главного файла main.sass. 
Сохранение их в папку css
*/
function css(done) {
    gulp.src('scss/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('css'))
    .pipe(gulp.src('scss/main.scss'))
    .pipe(sass({
        outputStyle: 'compressed'
    }))
    .pipe(rename('main.min.css'))
    .pipe(gulp.dest('css'));

    done();
}

//Минификация js файлов
function js(done) {

    done();
}

//Сжатие изображений
function imagesMin(done) {
    gulp.src('img/*')
    .pipe(imagemin())
    .pipe(gulp.dest('img'));

    done();
}
gulp.task(imagesMin); //Вызвать отдельно "gulp imagesMin"


//Отслеживание изменений в sass файлах и применение к ним function css при сохранение
function watchSass() {
    gulp.watch('scss/*.scss', css);
}

//Наблюдаемые функции
gulp.task('default', gulp.parallel(watchSass));
