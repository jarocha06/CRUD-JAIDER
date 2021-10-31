<?php
include('funciones.php');
$nombre=$_POST['progranombre'];
$tipo=intval($_POST['idTipoPrograma']);
$codigo=$_POST['codigo'];

$miconexion=conectar('', 'senadb');

$resultado=consulta($miconexion,"INSERT INTO programa (Codigo,Nombre,idTipoPrograma) values ('{$codigo}','{$nombre}','{$tipo}')");

if($resultado)
{
    echo "<script>
         alert('El programa se registro correctamente');
         window.history.go(-1);
         </script>";
  }
?>