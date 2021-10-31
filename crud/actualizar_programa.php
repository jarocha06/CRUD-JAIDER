<?php
include('funciones.php');
session_start();
$tiponombre=$_POST['progratipo'];
$codigo=$_POST['codigo'];
$nombre=$_POST['progranombre'];

$miconexion=conectar('', 'senadb');
$resultado=consulta($miconexion,"UPDATE programa SET Codigo='{$codigo}',Nombre='{$nombre}' WHERE  Codigo='{$codigo}'");

if ($miconexion->affected_rows>0)
 {
  echo "Actualizacion exitosa";
 }
 else {
    echo "ERROR AL ACTUALIZAR";
 }
?>