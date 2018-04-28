<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydataBase = "torneosmash";

try{
    $conn = new PDO("mysql:host=$servername; dbname=$mydataBase",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "<div align='center'><h1>ERROR DE CONEXIÓN: </h1></div>". $e -> getMessage();
}
?>