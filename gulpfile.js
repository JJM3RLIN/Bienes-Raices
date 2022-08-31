const { src, dest, watch , parallel } = require('gulp');
const sass =  require("gulp-sass")(require("sass"));
const autoprefixer = require('autoprefixer');
const postcss    = require('gulp-postcss')
const sourcemaps = require('gulp-sourcemaps')
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');
const webp = require('gulp-webp');
const avif = require( 'gulp-avif' );
const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*.{jpg,png}'
}
const opciones = {
    quality: 50
  };

// css es una función que se puede llamar automaticamente
function css( done ) {
    return src(paths.scss)
    .pipe( sourcemaps.init() )
    .pipe(sass()) //compilarlo
    .pipe( postcss( [autoprefixer(), cssnano()  ] ) )
    .pipe( sourcemaps.write(".") )
    .pipe(dest("./public/build/css")); //almacenarlo

  done(); 
}


function javascript( done ) {
    return src(paths.js)
      .pipe(sourcemaps.init())
      .pipe(concat('bundle.js')) // final output file name
      .pipe(terser())
      .pipe(sourcemaps.write('.'))
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest('./public/build/js'))
      done();
}

function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3})))
        .pipe(dest('./public/build/img'));
      
}

function versionWebp( done ) {
     src(paths.imagenes)
     .pipe( webp(opciones) )
     .pipe( dest('public/build/img') )
     done();

}
function convertirAvif(done){
   
     src( 'src/img/**/*.{png,jpg}' )  //buscar esos dos formatos
    .pipe( avif(opciones) )
    .pipe( dest('public/build/img') )
    done();
  }

function watchArchivos() {
    watch( paths.scss, css );
    watch( paths.js, javascript );
    watch( paths.imagenes, imagenes );
    watch( paths.imagenes, versionWebp );
    watch(paths.imagenes, convertirAvif);
}

exports.default = parallel(css, javascript, watchArchivos);