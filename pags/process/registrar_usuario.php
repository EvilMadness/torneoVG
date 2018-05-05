<?php
require_once '../conexion_bd.php';

$nombre = $_POST["nombre"];
$paterno = $_POST["apaterno"];
$materno = $_POST["amaterno"];
$instituto = $_POST["combo_instituto"];
$personaje = $_POST["combo_personaje"];
$nickname = $_POST["nickname"];
$password = md5($_POST["password"]);
$email = $_POST["email"];

$insertarDatos = "INSERT INTO concursante(nombres,apaterno,amaterno,id_rol,id_institucion,id_personaje,nickname,password,email)
VALUES('$nombre','$paterno','$materno',1,$instituto,$personaje,'$nickname','$password','$email')";
if($conn -> exec($insertarDatos)){
    echo '<script>alert("Usuario registrado correctamente.")</script>';
    header("Location:http://localhost/torneoVG/pags/form_registro.php");
}else
    echo '<script>alert("Error, no se ha podido registrar el usuario.")</script>';
