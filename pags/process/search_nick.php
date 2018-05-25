<?php
require_once "../conexion_bd.php";
if(isset($_POST['nickname'])){
    $nick = $_POST['nickname'];
    $sql = "SELECT * FROM concursante WHERE nickname = '{$nick}'";
    $result = $conn->query($sql);
    $count = $result->rowCount();
    if ($count > 0) {
        echo '<span class="ocupado">¡Usuario ya registrado!</span>';
    }else
        echo '<span class="disponible"> Usuario disponible </span>';
}