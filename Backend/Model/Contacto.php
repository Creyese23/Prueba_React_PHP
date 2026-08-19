<?php 
    class Contacto{
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function listarContactos(){
            try{
                $query = "SELECT * FROM contactos";
                $stmt = $this->conexion->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode(array("message" => "Error al obtener los contactos: " . $e->getMessage()));
                exit();
            }
        }

        public function agregarContactos($nombre, $email, $telefono){
            try{
                $query = "INSERT INTO contactos (nombre, email, telefono) VALUES (:nombre, :email, :telefono)";
                $stmt = $this->conexion->prepare($query);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode(array("message" => "Error al agregar el contacto: " . $e->getMessage()));
                exit();
            }
        }

        public function eliminarContactos($id){
            try{
                $query = "DELETE FROM contactos WHERE id = :id";
                $stmt = $this->conexion->prepare($query);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode(array("message" => "Error al eliminar el contacto: " . $e->getMessage()));
                exit();
            }
        }
    }
?>