///<references types ="cypress"/>
describe('Prueba formulario de contacto', ()=>{
    it('Prueba pagina de contacto', ()=>{
        cy.visit('/contacto');
        cy.get('[data-cy="contacto-titulo"]').should('exist').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-form"]').should('exist').invoke('text').should('equal', 'Llene el formulario de Contacto');
    });
    it('Llena los campos del formulario', ()=>{

        cy.wait(1500);
        //con value se llena el valor del input
        cy.get('[data-cy="input-nombre"]').type('Maria');
        cy.wait(1500);
        cy.get('[data-cy="input-mensaje"]').type('Deseo comprar una casa')

        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.wait(1500);
        cy.get('[data-cy="input-precio"]').type('1200456');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();

        cy.wait(2000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        cy.get('[ data-cy="input-telefono"]').type('5578900736');
        cy.get('[data-cy="input-fecha"]').type('2022-01-31');
        cy.get('[data-cy="input-hora"]').type('03:30');

        //Enviar el correo con la información 
        //Método que oresiona el boton y envia el formulario
        cy.get('[data-cy="form-contacto"]').submit();
    })
});