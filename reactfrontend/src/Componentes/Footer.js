import React from "react";

function Footer() {
  return (
    <React.Fragment>
      <footer
        className="footer footer-expand-lg fixed-bottom"
        style={{ backgroundColor: "#e3f2fd" }}
        data-bs-theme="light"
      >
        <div className="container">
          <div className="row">
            <div className="col-md-12 mt-3 text-center">
              <p>© 2026. Todos los derechos reservados.</p>
            </div>
          </div>
        </div>
      </footer>
    </React.Fragment>
  );
}
export default Footer;
