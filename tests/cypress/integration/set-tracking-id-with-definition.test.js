describe("Set tracking ID with wp-config definition", () => {
  before(() => {
    cy.login();
    cy.wpCli(
      "config set TRACKING_CODE_FOR_PINTEREST_PIXEL_ID definition --add"
    );
  });

  it("Is input field disabled?", () => {
    cy.visit("/wp-admin/options-general.php");
    cy.get("#tracking_code_for_pinterest_pixel").should("be.disabled");
  });

  it("Does input field contain the defined value?", () => {
    cy.visit("/wp-admin/options-general.php");
    cy.get("#tracking_code_for_pinterest_pixel")
      .invoke("val")
      .should("eq", "definition");
  });

  it("Is tracking code printed to the head?", () => {
    cy.logout();
    cy.visit("/");
    cy.document().then((doc) => {
      const html = doc.documentElement.innerHTML;
      expect(html).to.contain("pintrk('load', 'definition')");
    });
  });

  after(() => {
    cy.wpCli("config delete TRACKING_CODE_FOR_PINTEREST_PIXEL_ID");
  });
});
