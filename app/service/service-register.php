<?php

require_once "../models/Usuario.php";
$usuario = new Usuario();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'POST') {
    $inputJSON = file_get_contents('php://input');
    $datos = json_decode($inputJSON, true);

    $username = $datos['username'];
    $password = $datos['password'];

    if (empty($username) || empty($password)) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(["status" => false, "message" => "Username and password are required."]);
        exit;
    }

    $status = $usuario->register($username, $password);

    if ($status) {
        header("HTTP/1.1 200 OK");
        echo json_encode(["status" => true, "message" => "User registered successfully."]);
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(["status" => false, "message" => "Failed to register user."]);
    }
}