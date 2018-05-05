<?php
require_once '../conexion_bd.php';

$result = "";
$resultado1 = "<option value='0'>═════ Seleccione la carrera ═════</option>";
$resultado2 = "No se encontraron carreras disponibles";

$campo_elegido = $_POST["campo_seleccionado"];

$sql1 = 'SELECT * FROM carrera';
$result1 = $conn -> query($sql1);
$carreras = $result1 -> fetchAll();

if (empty($carreras)) {
    echo $resultado2;
    die();
}
elseif ($campo_elegido >= 2){
    echo '<option value="0" >════════ Seleccione ════════</option>';
    echo '<option value="18" >Otro</option>';
}elseif ($campo_elegido == 1){
    echo $resultado1;
    foreach ($carreras as $carrera){
        echo '<option value="'.$carrera['idCarrera'].'">'.utf8_encode($carrera['nombre_carrera']).'</option>';
    }
}
elseif ($campo_elegido == 0){

}