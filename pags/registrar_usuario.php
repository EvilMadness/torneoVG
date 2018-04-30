<?php
require_once 'conexion_bd.php';

$nombre = $_POST["txtnombre"];
$paterno = $_POST["txtapaterno"];
$materno = $_POST["txtamaterno"];
$instituto = $_POST["combo_instituto"];
$personaje = $_POST["combo_personaje"];
$nickname = $_POST["txtnickname"];
$password = md5($_POST["txtpassword"]);
$email = $_POST["email"];

$insertarDatos = "INSERT INTO concursante(nombres,apaterno,amaterno,id_rol,id_institucion,id_personaje,nickname,password,email)
VALUES('$nombre','$paterno','$materno',1,$instituto,$personaje,'$nickname','$password','$email')";
$conn -> exec($insertarDatos);