describe("Set tracking ID with option in admin UI", () => {
  before(() => {
    cy.login();
  });

  it("Can admin set tracking id?", () => {
    cy.visit("/wp-admin/options-general.php");
    cy.get("#tracking_code_for_pinterest_pixel").clear().type("option");
    cy.get("#submit").click();
    cy.get("#tracking_code_for_pinterest_pixel")
      .invoke("val")
      .should("eq", "option");
  });

  it("Is tracking code printed to the head?", () => {
    cy.logout();
    cy.visit("/");
    cy.document().then((doc) => {
      const html = doc.documentElement.innerHTML;
      expect(html).to.contain("pintrk('load', 'option')");
    });
  });
});
