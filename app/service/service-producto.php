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
      case 'findById': $registroProduc = $producto->getById(['id' => $_GET['id']]);break;
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

} else if($metodo == "PUT"){
  $inputJSON = file_get_contents("php://input");
  $datos = json_decode($inputJSON,true);
  $registroProduc = [
    "id"=> $datos["id"],
    "tipo"=> $datos["tipo"],
    "genero"=> $datos["genero"],
    "talla"=> $datos["talla"],
    "precio"=> $datos["precio"]
  ];
  $status = $producto->update($registroProduc);

  header("HTTP/1.1 200 OK");
  echo json_encode(["status"=> $status]);

} else if ($metodo == 'DELETE'){

  $requestURI = $_SERVER['REQUEST_URI'];
  $uriSegments = explode('/', $requestURI);

  $idEliminar =intval(end($uriSegments));

  $status = $producto->delete(['id'=> $idEliminar]);

  header(header: "HTTP/1.1 200 Ok");
  echo json_encode(value: ["status" => $status]);
}
?>
