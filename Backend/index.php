<?php

    header("Content-Type: application/json; charset=UTF-8");

    require_once "/Backend/Database.php";
    require_once "/Backend/Model/Contacto.php";
    require_once "/Backend/Controller/contactoController.php";

    $database = new Database();
    $db = $database -> conexion();

    $model = new Contacto($db);
    $controller = new contactoController($model);

    $method = $_SERVER['REQUEST_METHOD'];

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $url = rtrim($url, '/');

    if($method ==='GET' && $url === '/contactos') {
        $controller->listarContactos();
    } elseif ($method === 'POST' && $url === '/contactos') {
        $controller->datos();
    } elseif ($method === 'DELETE' && preg_match('/\/contactos\/(\d+)/', $url, $matches)) {
        $id = $matches[1];
        $controller->deleteContacto($id);
    } else {
        http_response_code(404);
        echo json_encode([
        'success' => false,
        'message' => 'Ruta no encontrada']);
    }

?>