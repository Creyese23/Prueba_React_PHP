<?php
    class Database{
            private $host_name="localhost";
            private $nombre="db_contactos";
            private $usuario="root";
            private $password="";

            public function conexion(){
                try{
                    $conexion = new PDO(
                        "mysql:host={$this->host_name};
                        dbname={$this->nombre}; charset=utf8",
                        $this->usuario,
                        $this->password
                    );

                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                    return $conexion;

                }catch(PDOException $e){
                    http_response_code(500);
                    echo json_encode(array("message" => "Error de conexión a la base de datos: " . $e->getMessage()));
                    exit();
                }
            }
        }
?>