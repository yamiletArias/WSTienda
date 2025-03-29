<?php

require_once "../models/Usuario.php"; 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, PUT, DELETE");
header("Content-type: application/json; charset=UTF-8");

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'POST') {
    $inputJSON = file_get_contents('php://input');
    $datos = json_decode($inputJSON, true);

    // datos de login
    $username = $datos["username"]; 
    $password = $datos["password"];

    // Verificar el usuario en la base de datos
    $usuario = new Usuario();
    $result = $usuario->login($username, $password);

    if ($result) {
        // Usuario y contraseña correctos
        header('HTTP/1.1 200 OK');
        echo json_encode(["status" => true, "message" => "Inicio de sesión exitosa"]);
    } else {
        // Usuario o contraseña incorrectos
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode(["status" => false, "message" => "Nombre de usuario o contraseña no válidos"]);
    }
}

?>
