<?php
require_once "../conexion_bd.php";

$id_carrera = $_POST["id_carrera"];
$nombreCarr = $_POST["nom_carrera"];

$sqlid = "SELECT * FROM carrera WHERE idCarrera='$id_carrera'";
$resID = $conn->query($sqlid);
$IDres = $resID->fetchAll();
$IDres = count($IDres);

if ($IDres>0){
    echo '<script>alert("ID ya registrado")</script>';
    header("Location:../form_add_instituto.php");
    die();
}

$sqlInsert = "INSERT INTO carrera(idCarrera, nombre_carrera) VALUES ($id_carrera,'$nombreCarr')";
$conn->exec($sqlInsert);

header("Location:../report_carreras.php");