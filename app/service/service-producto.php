<?php

require_once "../models/Producto.php";
$producto = new Producto();

header("Access-Control-Allow-Origin");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, PUT, DELETE");
header("Content-type: application/json; charset=UTF-8");

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'GET') {
  $registroProduc = [];

  if (isset($_GET['q'])){
    switch ($_GET['q']){
      case 'showAll' : $registroProduc = $producto->getAll();break;
    }
  }

  header('HTTP/1.1 200 OK');
  echo json_encode($registroProduc);

} else if ($metodo == 'POST') {

  $inputJSON = file_get_contents('php://input');
  $datos = json_decode($inputJSON, true);

  $registroProduc = [
    "tipo"   => $datos["tipo"],
    "genero" => $datos["genero"],
    "talla"  => $datos["talla"],
    "precio" => $datos["precio"]
  ];

  $status = $producto->add($registroProduc);

  header('HTTP/1.1 200 OK');
  echo json_encode(["status" => $status]);
}
?>
