# Prueba_React_PHP

# NODE
- v24.14.1

# PHP
- v8.2.12

# MySQL
- v10.4.32

# BACKEND
    - Backend creado en php en MVC.
    - Archivo database.php para la conexion de la base de datos que se encuentra alojada en XAMPP.
    - En la carperta controller se encuentra alojado el archivo contactoController.php que es el encargado recibe las peticiones del usuario o de una interfaz, decide qué acción tomar, pide o envía datos al sistema central y devuelve una respuesta adecuada.
    - En la carperta model se encuentra alojado el archivo contacto.php que es el encargado manejar la logica del negocio, realiza consulta en la base de datos.
    - En la carperta view se encuentra alojado el archivo response.php que es el encargado responde a la peticion del usuario y envia los datos para que sean representados en la interfaz grafica.
    
# FRONTEND
  - Frontend creado en react utilizando el framework bootstrap.
  - Carperta componentes donde se encuentran todos los componentes a utilizar para la interfaz visual del proyecto.

  # CREACION BASE DE DATOS
   - CREATE DATABASE db_contactos;
   - USE db_contactos;
   - CREATE TABLE `contactos` (
         `id` int(11) NOT NULL,
            `nombre_completo` varchar(100) NOT NULL,
            `email` varchar(150) NOT NULL,
            `telefono` varchar(20) DEFAULT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;