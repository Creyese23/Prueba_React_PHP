import "./Styles.css";
import Header from "./Componentes/Header";
import Inicio from "./Componentes/Inicio";
import ListarContactos from "./Componentes/ListarContactos";
import { Routes, Route } from "react-router-dom";
import Footer from "./Componentes/Footer";
import CrearContactos from "./Componentes/CrearContacto";

function App() {
  return (
    <div classNameName="App">
      <Header />

      <Routes>
        <Route path="/" element={<Inicio />} />
        <Route path="/listarcontactos" element={<ListarContactos />} />
        <Route path="/crearcontacto" element={<CrearContactos />} />
      </Routes>

      <Footer />
    </div>
  );
}

export default App;
