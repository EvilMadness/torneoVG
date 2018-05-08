<?php
include "conexion_bd.php";

$usuario = $_POST['nickname'];
$pass = md5($_POST['password']);

$sql = "SELECT * FROM concursante WHERE nickname='$usuario' AND password='$pass'";
$res = $conn->query($sql);
$val = $res->fetchAll();
foreach ($val as $tipo){
    $rol = $tipo["id_rol"];
}

$val = count($val);

if ($val>0){
    session_start();
    $_SESSION["nickname"] = $usuario;
    $_SESSION["password"] = $pass;
    $_SESSION["tipo"] = $rol;
    header("Location:../index.php");
}
else{
    redireccionar("Las credenciales no coinciden con nuestros registros","login.php");
}

function redireccionar($msj,$location) {
    echo '<script type="text/javascript">alert("'.$msj.'");</script>';
    $cad = "location.href='$location'";
    echo "<script type=\"text/javascript\">setTimeout(".$cad.",4000);</script>";
}
