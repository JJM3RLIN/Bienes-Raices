///<references types ="cypress"/>
describe('Prueba la navegación del header y footer', ()=>{
    it('Prueba nav Header', ()=>{
        cy.visit('');
        cy.get('[data-cy="nav-index"]').should('exist');
        cy.get('[data-cy="nav-index"]').find('a').should('have.length', 5);
        //Revisar que los enlaces sean correctos y con eq accedemos al a que queremos
        cy.get('[data-cy="nav-index"]').find('a').eq(0).invoke('attr', 'href')
        .should('equal', '/public/nosotros');
        cy.get('[data-cy="nav-index"]').find('a').eq(1).invoke('attr', 'href')
        .should('equal', '/public/propiedades');
        cy.get('[data-cy="nav-index"]').find('a').eq(2).invoke('attr', 'href')
        .should('equal', '/public/blog');
        cy.get('[data-cy="nav-index"]').find('a').eq(3).invoke('attr', 'href')
        .should('equal', '/public/contacto');
        cy.get('[data-cy="nav-index"]').find('a').eq(4).invoke('attr', 'href')
        .should('equal', '/public/login');
    });
    it('Prueba nav footer', ()=>{
        cy.visit('');
        cy.get('[data-cy="nav-footer"]').should('exist');
        cy.get('[data-cy="nav-footer"]').find('a').should('have.length', 4);
        //Revisar que los enlaces sean correctos y con eq accedemos al a que queremos
        cy.get('[data-cy="nav-footer"]').find('a').eq(0).invoke('attr', 'href')
        .should('equal', '/public/nosotros');
        cy.get('[data-cy="nav-footer"]').find('a').eq(1).invoke('attr', 'href')
        .should('equal', '/public/propiedades');
        cy.get('[data-cy="nav-footer"]').find('a').eq(2).invoke('attr', 'href')
        .should('equal', '/public/blog');
        cy.get('[data-cy="nav-footer"]').find('a').eq(3).invoke('attr', 'href')
        .should('equal', '/public/contacto');
   
    });
});