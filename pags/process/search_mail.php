<?php
require_once "../conexion_bd.php";
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $sqlemail = "SELECT * FROM concursante WHERE email = '{$email}'";
    $result = $conn->query($sqlemail);
    $count = $result->rowCount();
    if ($count > 0) {
        echo '<span class="ocupado">¡Email ya registrado!</span>';
    }else
        echo '<span class="disponible"> Email disponible </span>';
}