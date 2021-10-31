<?php
include('funciones.php');
$ficha=$_POST['fichanumero'];
$modalidad=intval($_POST['modalidad']);
$programa=intval($_POST['programa']);

$miconexion=conectar('', 'senadb');
$resultado=consulta($miconexion,"INSERT INTO ficha (NumeroFicha,IdModalidad,IdPrograma) values ('{$ficha}','{$modalidad}','{$programa}')");

if($resultado)
{
    echo "<script>
         alert('La ficha se registro correctamente');
         window.history.go(-1);
         </script>";
  }
?>