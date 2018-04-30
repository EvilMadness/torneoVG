<?php
require_once "conexion_bd.php";

$sql1 = 'SELECT * FROM institucioneducativa';
$result1 = $conn -> query($sql1);
$instituciones = $result1 -> fetchAll();

$sql2 = 'SELECT * FROM personaje';
$result2 = $conn -> query($sql2);
$personajes = $result2 -> fetchAll();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/magister.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link href="../css/layout.css" rel="stylesheet" type="text/css" media="all">
    <script src="../js/validacion.js"></script>
</head>
<script language="JavaScript" type="text/javascript">
    function crear_objeto_XMLHttpRequest() {
        try {
            objeto = new XMLHttpRequest();
        } catch(err1) {
            try {
                objeto = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (err2) {
                try {
                    objeto = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (err3) {
                    objeto = false;
                }
            }
        }
        return objeto;
    }
    /* Aquí acaba la definición de la función que se usará para instaciar objetos XMLHttpRequest */
    var objeto_AJAX = crear_objeto_XMLHttpRequest();
    /* La siguiente función se ejecuta cuando es invocada por un cambio en el control de la lista de departamentos. */
    function pedirDatos(){
        var URL = "obtenerCarreras.php";
        objeto_AJAX.open("POST", URL, true);
        objeto_AJAX.onreadystatechange = muestraResultado;
        objeto_AJAX.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        objeto_AJAX.send("campo_seleccionado="+document.getElementById("combo_instituto").value);
    }

    /* La siguiente función se ejecuta cuando se recibe una respuesta del servidor. */
    function muestraResultado(){
        if (objeto_AJAX.readyState == 4 && objeto_AJAX.status == 200)
        {
            document.getElementById("combo_carrera").innerHTML = objeto_AJAX.responseText;
        }
    }
</script>
<body>
<div align="center" class="div" id="">
    <fieldset style="align-content: center">
    <form data-toggle="validator" role="form" action="registrar_usuario.php" method="post" id="formulario-contacto" onsubmit="return validarAutor()">
        <div class="first">
            <h2>Datos del participante</h2>
            <div class="one_half first">
                <label class="control-label" for="txtnombre"><b>Nombre(s)</b><span>*</span></label>
                <input type="text" id="txtnombre" name="nombre" placeholder="Nombre(s)" required>
            </div>
            <div class="one_quarter">
                <label for="txtapaterno"><b>Apellido Paterno</b><span>*</span></label>
                <input id="txtapaterno" name="txtapaterno" type="text" placeholder="Apellido paterno" required>
            </div>
            <div class="one_quarter">
                <label for="txtamaterno"><b>Apellido Materno</b><span>*</span></label>
                <input id="txtamaterno" name="txtamaterno" type="text" placeholder="Apellido materno" required>
            </div>
            <br><br><br><br><br>
            <div class="one_third first">
                <label for="combo_instituto"><b>Institución Educativa</b></label>
                <select class="slcb" name="combo_instituto" id="combo_instituto" onChange="javascript:pedirDatos();">
                    <option value="0" >---Seleccione---</option>
                    <?php
                    foreach ($instituciones as $institucion){
                        echo '<option value="'.$institucion['id_institucion'].'">'.utf8_encode($institucion['nombre']).'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="one_third">
                <label for="combo_carrera"><b>Carrera / Estudios</b></label>
                <select class="slcb" name="combo_carrera" id="combo_carrera">

                </select>
            </div>
            <div class="one_third">
                <label for="txtpersonaje"><b>Personaje</b></label>
                <select class="slcb" name="combo_personaje" id="combo_personaje">
                    <option value="0" >---Seleccione su personaje---</option>
                    <?php
                    foreach ($personajes as $personaje){
                        echo '<option value="'.$personaje['idPersonaje'].'">'.utf8_encode($personaje['nombre']).'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="first"><br><br>
            <h2>Datos de la cuenta</h2>
            <div class="one_third first">
                <label for="txtnickname"><b>Nickname</b><span>*</span></label>
                <input id="txtnickname" name="txtnickname" type="text" placeholder="Nombre de usuario">
            </div>
            <div class="one_third">
                <label for="txtpassword"><b>Contraseña</b><span>*</span></label>
                <input id="txtpassword" name="txtpassword" type="password" placeholder="Contraseña">
            </div>
            <div class="one_third">
                <label for="email"><b>Email</b><span>*</span></label>
                <input id="email" name="email" type="email" placeholder="Correo electronico" required>
            </div>
        </div>
        <div><br><br><br><br><br><br><br><br></div>
        <div>
            <input type="reset" value="Limpiar Campos">
        </div>
        <div>
            <input type="submit" name="buscar" value="Registrase">
        </div>

    </form>
</fieldset>
</div>
</body>
</html>