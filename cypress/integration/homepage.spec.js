///<references types ="cypress"/>

const { data } = require("autoprefixer");
const imagemin = require("gulp-imagemin");

//Tener mejor autocompletado
describe('do-something', ()=>{

    it('Prueba de la pagina principal', ()=>{
        cy.visit('');
        //Usando el selectro de atributos con []
        //Verificando que el elemento exista
        cy.get('[data-cy="heading-sitio"]').should('exist');
        //Si existe selecciono su texto y veo si es si es igual
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas y Departamentos Exclusivos de lujo');

    });
    it('Prueba bloque iconos', ()=>{
        cy.get('[data-cy="heading-nosotros"]').should('exist');
    });

    it('seccion Propiedades', ()=>{
        //Debe haber 3 propeidades
        cy.get('[data-cy="anuncio"]').should('have.length',3);

        //Probar el enñace de las propiedades
        cy.get('[data-cy="enlace-propiedades"]').should('have.class', 'btn-verde');
        cy.get('[data-cy="enlace-propiedades"]').should('not.have.class', 'btn-amarillo');
        //Con fist solo seleccionamos el primero
        cy.get('[data-cy="enlace-propiedades"]').first().invoke('text').should('equal', 'Ver propiedad');

        //Probar el enlace a una propiedad
        cy.get('[data-cy="enlace-propiedades"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');

        //nos permite ejecutar codigo en un cierto tiempo en milisegundos
        cy.wait(2000);
        //Regresar una pagina atras 
        cy.go('back');
    });
    it('Prueba routing hacia todas las propiedades', ()=>{
        cy.get('[data-cy="ver-propiedades"]').should('exist');
        cy.get('[data-cy="ver-propiedades"]').should('have.class', 'btn-amarillo');
        //con attr verificamos atributos y despues el atributo a verificar
        cy.get('[data-cy="ver-propiedades"]').invoke('attr', 'href').should('equal', '/public/propiedades');
        //Simular el click en el boton
        cy.get('[data-cy="ver-propiedades"]').click();
        cy.get('[data-cy="propiedades-titulo"]').invoke('text').should('equal', 'Anuncios');
         //nos permite ejecutar codigo en un cierto tiempo en milisegundos
         cy.wait(2000);
         //Regresar una pagina atras 
         cy.go('back');
    });
    it('grafico', ()=>{
        cy.get('[data-cy="grafico-titulo"]').should('exist');
        cy.get('[data-cy="grafico-titulo"]').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="grafico-texto"]').should('exist');
        cy.get('[data-cy="grafico-texto"]').invoke('text').should('not.equal', 'Encuentra la casa de tus sueños');

        //Probar el boton
        cy.get('[data-cy="btn-contacto"]').invoke('attr', 'href').should('equal', '/public/contacto');
        cy.get('[data-cy="btn-contacto"]').click();
        /*
        cy.get('[data-cy="btn-contacto"]').invoke('attr', 'href')
        .then(href=>{
            cy.visit(href);
        });
       */
        cy.get('[data-cy="contacto-titulo"]').should('exist').invoke('text').should('equal', 'Contacto');
        cy.wait(1500);
        cy.visit('');
    });
   
    it('testimoniales testing', ()=>{
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro blog');
        cy.get('[data-cy="testimoniales"]').should('exist');
    });
});