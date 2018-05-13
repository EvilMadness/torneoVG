<?php
session_start();
require_once "../conexion.php";
if (!isset($_POST['search'])){
exit('Valor no recibido');}

function search(){
    $mysqli = getConnexion();
    $search = $mysqli->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM concursante INNER JOIN personaje p on concursante.id_personaje = p.idPersonaje WHERE nickname LIKE '%$search%' OR nombres LIKE '%$search%'";
    $res = $mysqli->query($sql); ?>
        <table class="tablapos" border="1" width="80%" style="background-color: #469599" id="result">
            <tr>
                <th>Nickname</th>
                <th>Img</th>
                <th>Personaje</th>
                <th>Correo</th>
                <th>Nombre</th>
                <?php if (isset($_SESSION["tipo"])){
                    echo '<th>Acciones</th>';
                } ?>
            </tr>
    <?php while ($row = $res->fetch_array(MYSQLI_ASSOC)){ ?>
                <tr align="center">
                    <td><?php echo $row['nickname'];?></td>
                    <td style="padding: 0px" width="50px"><img src="../images/personajes/<?php echo $row['imagen']; ?>"></td>
                    <td><?php echo $row['nombre'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo utf8_encode($row['nombres']);?></td>
                    <?php if (isset($_SESSION["tipo"])){
                        echo '<td style="padding: 0px">';
                        if ($_SESSION["nickname"]==$row['nickname']||$_SESSION["tipo"]==2){ ?>
                            <a href="detail_user.php?id=<?php echo $row['idConcursante'];?>"><img src="../images/icon/Detalle.png"></a>
                        <?php }
                        if ($_SESSION["tipo"]==2){ ?>
                            <a href="form_editar.php?id=<?php echo $row['idConcursante'];?>"><img src="../images/icon/Edit.png"></a>
                            <a href="process/remove_user.php?id=<?php echo $row['idConcursante'];?>"onclick="return confirmDelete('<?php echo $row['nickname'];?>')"><img src="../images/icon/delete.png"></a>
                        <?php } echo '</td>';
                    } ?>
                </tr>
        </table>
    <?php }


}
search();