<?php

require_once 'Conexion.php';

class Usuario extends Conexion
{

  private $conexion;

  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function login($username, $password)
  {
    try {
      $sql = "SELECT id, username, passuser FROM Usuarios WHERE username = ?";
      $consulta = $this->conexion->prepare($sql);
      $consulta->execute([$username]);
      $user = $consulta->fetch(PDO::FETCH_ASSOC);

      if ($user && password_verify($password, $user['passuser'])) {
        return true;  // Login exitoso
      } else {
        return false;  // Contraseña incorrecta
      }
    } catch (PDOException $e) {
      return false;  // Error en la base de datos
    }
  }
  public function register($username, $password)
  {
    try {
      // Hashear la contraseña
      $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

      // Insertar en la base de datos
      $sql = "INSERT INTO Usuarios (username, passuser) VALUES (?, ?)";
      $consulta = $this->conexion->prepare($sql);
      $consulta->execute([$username, $hashedPassword]);

      // Retornar si el registro fue exitoso
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

}
?>