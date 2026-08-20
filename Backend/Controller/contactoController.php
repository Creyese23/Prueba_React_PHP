<?php

    className contactoController{
        private $model;

        public function __construct($model){
            $this->model = $model;
        }

        public function index(){
            $contacto = $this->model->listarContactos();
            require_once 'Backend/View/contactoView.php';
            echo json_encode([
                "success"=>true,
                "data"=>$contacto
            ]);
        }

        public  function datos(){
            $data = json_decode(file_get_contents("php://input"), true);

            if(!$data){
                http_response_code(400);
                echo json_encode([
                    "success"=>false,
                    "message"=>"No se recibieron datos"
                ]);

                return;
            }

            $nombre = trim($data['nombre'] ?? '');
            $email = trim($data['email'] ?? '');
            $telefono = trim($data['telefono'] ?? '');

            if ($nombre==="" || $email==="" || $telefono==="") {
                http_response_code(422);
                echo json_encode([
                    "success"=>false,
                    "message"=>"Todos los campos son obligatorios"
                ]);
                return;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                http_response_code(422);
                echo json_encode([
                    "success"=>false,
                    "message"=>"El email no es válido"
                ]);
                return;
            }

            if(!preg_match('/^\+?[0-9]{7,15}$/', $telefono)){
                http_response_code(422);
                echo json_encode([
                    "success"=>false,
                    "message"=>"El teléfono no es válido"
                ]);
                return;
            }
        }

        public function destroy($id){
            if(!is_numeric($id)){
                http_response_code(400);
                echo json_encode([
                    "success"=>false,
                    "message"=>"El ID debe ser un número"
                ]);
                return;
            }

            $result = $this->model->eliminarContactos($id);

            if($result){
                echo json_encode([
                    "success"=>true,
                    "message"=>"Contacto eliminado correctamente"
                ]);
            }else{
                http_response_code(500);
                echo json_encode([
                    "success"=>false,
                    "message"=>"Error al eliminar el contacto"
                ]);
            }
        }
    }
?>