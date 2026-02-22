describe("Admin can login and make sure plugin is activated", () => {
  before(() => {
    cy.login();
  });

  it("Can activate plugin if it is deactivated", () => {
    cy.activatePlugin("tracking-code-for-pinterest-pixel");
    cy.deactivatePlugin("tracking-code-for-pinterest-pixel");
    cy.activatePlugin("tracking-code-for-pinterest-pixel");
  });
});
