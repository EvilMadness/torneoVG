<?php
include "conexion_bd.php";

$usuario = $_POST['nickname'];
$pass = md5($_POST['password']);
