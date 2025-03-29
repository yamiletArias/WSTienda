<?php

$clave1 = "deyanira04";
$clave2 = "jhon1234";
$clave3 = "tati123";

// Encriptar las contraseñas
var_dump(password_hash($clave1, PASSWORD_BCRYPT));
var_dump(password_hash($clave2, PASSWORD_BCRYPT));
var_dump(password_hash($clave3, PASSWORD_BCRYPT));