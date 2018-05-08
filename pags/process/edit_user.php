<?php
require_once '../conexion_bd.php';

$nombre = $_POST["nombre"];
$paterno = $_POST["apaterno"];
$materno = $_POST["amaterno"];
$instituto = $_POST["combo_instituto"];
$instituto = (int)$instituto;
$personaje = $_POST["combo_personaje"];
$carrera = $_POST["combo_carrera"];
$carrera = (int)$carrera;
$nickname = $_POST["nickname"];
$password = md5($_POST["password"]);
$email = $_POST["email"];

