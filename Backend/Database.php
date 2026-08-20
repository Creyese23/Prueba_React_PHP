<?php
       /* className Database{
            private $host_name="localhost";
            private $nombre="db_contactos";
            private $usuario="root";
            private $password="";

            public function conexion(){
                try{
                    $conexion = new PDO(
                        "mysql:host={$this->host_name};
                        db_name={$this->nombre}; charset=utf8mb4_general_ci",
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
        }*/

            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Headers: *");
            header("Access-Control-Allow-Methods: *");

            $conexion = mysqli_connect("localhost", "root", "", "db_contactos");
            if ($conexion===false) {
                die("ERROR: Error de conexión a la base de datos: " . mysqli_connect_error());
            }

        $method = $_SERVER['REQUEST_METHOD'];

        //echo "test-----".$method; die;

        switch ($method) {
            case 'GET':
                $listar = mysqli_query($conexion,'SELECT * FROM `contactos`');
                if (mysqli_num_rows($listar)> 0) {
                    while ($row = mysqli_fetch_array($listar)){
                        $json_array["data"][] = array("id"=>$row['id'], "nombre completo"=>$row['nombre_completo'], "email"=>$row['email'], "telefono"=>$row['telefono'], "fecha de creacion"=>$row['created_at']);
                    }
                    echo json_encode($json_array['data']);
                    return;
                }else{
                    echo json_encode(array("message" => "No se encontraron registros"));
                    return;
                }
                break;
            case 'POST':
                // Handle POST request
                break;
            case 'PUT':
                // Handle PUT request
                break;
            case 'DELETE':
                // Handle DELETE request
                break;
            default:
                http_response_code(405);
                echo json_encode(array("message" => "Método no permitido"));
                exit();
        }
?>