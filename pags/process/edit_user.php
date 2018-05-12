<?php
require_once '../conexion_bd.php';
$id = $_GET["id"];
$id = (int)$id;

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

$sqlNick = "SELECT * FROM concursante WHERE nickname='$nickname'";
$sqlEmail = "SELECT * FROM concursante WHERE email='$email'";
$resNick = $conn->query($sqlNick);
$resEmail = $conn->query($sqlEmail);
$nickRes = $resNick->fetchAll();
$emailRes = $resEmail->fetchAll();

$nickRes = count($nickRes);
$emailRes = count($emailRes);
//$sqlUpdate = "UPDATE concursante SET nombres='$nombre',apaterno='$paterno',amaterno='$materno',id_institucion='$instituto',idCarrera='$carrera',id_personaje='$personaje' WHERE idConcursante='$id'";
//echo $sqlUpdate;
//$res = $conn->exec($sqlUpdate);
if ($nickRes>0 && $emailRes>0){
    echo '<script>alert("Usuario y Email ya registrados")</script>';
    $sqlUpdate = "UPDATE concursante SET nombres='$nombre',apaterno='$paterno',amaterno='$materno',id_institucion='$instituto',idCarrera='$carrera',id_personaje='$personaje' WHERE idConcursante='$id'";
    //echo $sqlUpdate;
    $res = $conn->exec($sqlUpdate);
} elseif ($emailRes>0){
    echo '<script>alert("Email ya registrado")</script>';
    $sqlUpdate = "UPDATE concursante SET nombres='$nombre',apaterno='$paterno',amaterno='$materno',id_institucion='$instituto',idCarrera='$carrera',id_personaje='$personaje',nickname='$nickname' WHERE idConcursante='$id'";
    //echo $sqlUpdate;
    $res = $conn->exec($sqlUpdate);
} elseif ($nickRes>0) {
    echo '<script>alert("Usuario ya registrado")</script>';
    $sqlUpdate = "UPDATE concursante SET nombres='$nombre',apaterno='$paterno',amaterno='$materno',id_institucion='$instituto',idCarrera='$carrera',id_personaje='$personaje',email='$email' WHERE idConcursante='$id'";
    //echo $sqlUpdate;
    $res = $conn->exec($sqlUpdate);
} else{
    $sqlUpdate = "UPDATE concursante SET nombres='$nombre',apaterno='$paterno',amaterno='$materno',id_institucion='$instituto',idCarrera='$carrera',id_personaje='$personaje',nickname='$nickname',email='$email' WHERE idConcursante='$id'";
    $res = $conn->exec($sqlUpdate);
}
header("Location:../reporte_users.php");