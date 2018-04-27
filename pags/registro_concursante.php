<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/magister.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link href="../css/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<div align="center" class="div" id="comments">
    <fieldset style="align-content: center">
    <form action="registrar_autor.php" method="post" id="formulario" onsubmit="return validarAutor()">
        <div class="one_half first">
            <label for="txtnombre"><b>Nombre(s)</b><span>*</span></label>
            <input type="text" id="txtnombre" name="txtnombre" placeholder="Nombre(s)">
        </div>
        <div class="one_quarter">
            <label for="txtapaterno"><b>Apellido Paterno</b><span>*</span></label>
            <input id="txtapaterno" name="txtapaterno" type="text" placeholder="Apellido paterno">
        </div>
        <div class="one_quarter">
            <label for="txtamaterno"><b>Apellido Materno</b><span>*</span></label>
            <input id="txtamaterno" name="txtamaterno" type="text" placeholder="Apellido materno">
        </div>
        <div class="two_quarter first">
            <label for="txtdireccion"><b>Municipio</b><span>*</span></label>
            <input id="txtdireccion" name="txtdireccion" type="text" placeholder="Domicilio u dirección">
        </div>
        <div align="left">
            <label for="txtpais"><b>Pais: </b></label>
            <input id="txtpais" name="txtpais" type="text" placeholder="Pais de origen: México">
        </div>
        <div align="left">
            <label for="txtnickname"><b>Nickname: </b></label>
            <input id="txtnickname" name="txtnickname" type="text" placeholder="Nombre de usuario">
        </div>
        <div class="body1">
            <input type="reset" value="Limpiar Campos">
        </div>
        <div class="body1 ">
            <input type="submit" name="buscar" value="Registrase">
        </div>
    </form>
</fieldset>
</div>
</body>
</html>