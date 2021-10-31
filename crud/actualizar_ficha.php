<?php
include('funciones.php');
session_start();
$ide=$_SESSION['fichaid'];
$ficha=$_POST['fichanumero'];
$modalidad=$_POST['modalidad'];
$programa=$_POST['programa'];

$miconexion=conectar('', 'senadb');

$resultado=consulta($miconexion, "UPDATE ficha SET NumeroFicha='{$ficha}' WHERE Id='{$ide}'");
$resultado2=consulta($miconexion, "UPDATE modalidad SET NombreM ='{$modalidad}' WHERE NombreM='{$modalidad}'");
$resultado3=consulta($miconexion, "UPDATE programa SET Nombre ='{$programa}' WHERE Nombre='{$programa}'");

if ($resultado && $resultado2 && $resultado3) 
{
    echo "
    <script>
     alert('La Ficha se Actualizo correctamente');
     window.history.go(-1);
    </script>";
} else {
    echo "
    <script>
     alert('Error no se pudo actualizar');
     window.history.go(-1);
    </script>";
    exit;
}