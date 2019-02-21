<a href="index.php">VOLVER.</a>
<?php
//Me conecto con la base de datos.
$conector=new mysqli ("localhost","root","","liga");
if ($conector-> connect_errno) {
  echo "Fallo al conectar a MySQL: ".$conector->connect_errno;
}
else {
  $id_equipo=$_POST["id_equipo"];
  $nombre=$_POST["nombre"];
  $ciudad=$_POST["ciudad"];
  $web=$_POST["web"];
  $puntos=$_POST["puntos"];
  $consulta= "INSERT INTO equipo (id_equipo, nombre, ciudad, web, puntos)
            VALUES ('$id_equipo','$nombre','$ciudad','$web','$puntos')";
  $resultado=$conector->query($consulta);
  if($resultado==false){
    echo $conector->error;
  }
  else{
    echo "Correcta insercion";
  }
  $resultado=$conector->query("SELECT * FROM equipo");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table align= 'center'>
      <tr>
        <td>id_equipo</td>
        <td>nombre</td>
        <td>ciudad</td>
        <td>web</td>
        <td>puntos</td>
      </tr>
        <?php
          foreach ($resultado as $equipo) {
            echo "<tr>";
            echo "<td>".$equipo['id_equipo']."<td>";
            echo "<td>".$equipo['nombre']."</td>";
            echo "<td>".$equipo['ciudad']."</td>";
            echo "<td>".$equipo['web']."</td>";
            echo "<td>".$equipo['puntos']."</td>";
            echo "</tr>";
          }
         ?>
    </table>
  </body>
</html>
