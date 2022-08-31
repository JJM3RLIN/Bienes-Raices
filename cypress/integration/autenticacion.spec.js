///<references types ="cypress"/>
describe('Probar la autenticacion', ()=>{

    it('Prueba autenticacion en /login', ()=>{
        cy.visit('/login');

        cy.get('[data-cy="login-titulo"]').should('exist');
        cy.get('[data-cy="input-correo"]').type('correo@correo.com');
        cy.get('[data-cy="input-contra"]').type('1234');
        cy.get('[ data-cy="form-login"]').should('exist').submit();
    });

});