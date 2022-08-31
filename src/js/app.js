document.addEventListener('DOMContentLoaded', ()=>{
   fijarNav();
   menuResponsive();
   darkMode();
   alertaAdmin();
   descripAnuncios();
   ocultarContacto();

   //Paginacion
   cambiarSeccion();
   mostrarSeccion();
});
let paso = 1;
function fijarNav(){
    const barra = document.querySelector('.barra');
    const elemntoObservado = document.querySelector('.iconos-nosotros');
    const body = document.querySelector('body'); //evitar que cuando se fije la barra no envie todo hacia abajo

 if(elemntoObservado){

    window.addEventListener('scroll', ()=>{
        if(elemntoObservado.getBoundingClientRect(). top < 0){
         barra.classList.add('fijar');
        }
        else{
            barra.classList.remove('fijar');
        }
     });
 }
}

//Menu hamburguesa
function menuResponsive(){
    const menu = document.querySelector( '.menu-hamburguesa' );
    const nav = document.querySelector( '.navegacion' );
    const dark = document.querySelector( '.derecha' );
    menu.addEventListener('click',()=>{
    nav.classList.toggle('mostrar');
    dark.classList.toggle('mostrar');
    }); 
}

//Dark mode
function darkMode(){
    const dark = document.querySelector( '.dark-mode-boton');
    const tieneDark = window.matchMedia( ' (prefers-color-scheme: dark ) ' );
    if(tieneDark.matches) { //matches para ver que modo tiene
      document.body.classList.add('dark-mode'); //agregar clase automaticamente cuando carge la pagina
    }
    else{
        document.body.classList.remove('dark-mode');
    }
    //cambiar cuando el sistema tambien cambie de modo
    tieneDark.addEventListener('change', ()=>{
        if(tieneDark.matches) { //matches para ver que modo tiene
            document.body.classList.add('dark-mode'); //agregar clase automaticamente cuando carge la pagina
          }
          else{
              document.body.classList.remove('dark-mode');
          }
    });
    dark.addEventListener('click', ()=>{
        document.body.classList.toggle('dark-mode');
    });
}
function alertaAdmin(){
 
    const alertas = document.querySelectorAll('.alerta');
    if(alertas){
       alertas.forEach(alerta => {
        setTimeout( ()=>{
         
            const padre = alerta.parentElement; //obtener al padre del elemento

            padre.removeChild(alerta);
            
        }, 3500);
           
       });
    }

}
function descripAnuncios(){
    const descripciones = document.querySelectorAll('.descripcion');

    descripciones.forEach(txt =>{
       let long = txt.textContent.length;
        if(long > 200){
            aux = txt.textContent.split(' ', 30).join(' ').trim();  
            txt.textContent = aux + " ...";
            console.log(txt.textContent);
        }
        
    });
}

function cambiarSeccion(){
    const botones = document.querySelectorAll('.btn-paginacion');
    botones.forEach(boton =>{
        boton.addEventListener('click', (e)=>{
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
        });
    });
}
function mostrarSeccion(){
    const seccionAnterior = document.querySelector('.mostrar');
    const seccionMostrar = document.querySelector(`#paso-${paso}`);
    const btnAnterior = document.querySelector('.actual');
    const btnActual = document.querySelector(`[data-paso="${paso}"]`);

    if( seccionAnterior ){
          seccionAnterior.classList.remove('mostrar');
    }
    seccionMostrar.classList.add('mostrar');
    if( btnAnterior ){
        btnAnterior.classList.remove('actual');
    }
    btnActual.classList.add('actual');
}
//Muestra campos del form de manera condicional
function ocultarContacto(){
    //Obtener los name de los radio
    //se seleccionan por el selector de atributo ya que sus id son diferentes lo unico igual es su name
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input=>{
        input.addEventListener('click', (e)=>{
          const contacto = document.querySelector('#contacto');
          if(e.target.value === 'telefono'){
            contacto.innerHTML = `
            <label for="telefono">Número de teléfono:</label>
            <input data-cy="input-telefono" type="tel" placeholder="Tu teléfono" id="telefono" name="contacto[telefono]">

            <p>Elija la hora y fecha para la llamada</p>
            <label for="fecha">Fecha:</label>
            <input data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input data-cy="input-hora" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
            `;
          }else{
              contacto.innerHTML = ` 
              <label for="email">Correo electronico:</label>
              <input data-cy="input-correo" type="email" placeholder="Tu correo" id="email" name="contacto[correo]" required>`;
          }
         
        });
    });
}
