<?php
include('funciones.php');
session_start();
$ide=$_SESSION['ide1'];
$tipoid=$_POST['tipoid'];
$identificacion=$_POST['identificacion'];
$nombres=$_POST['nombres'];
$primerApe=$_POST['primerApellido'];
$segundoApe=$_POST['segundoApellido'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$ficha=$_POST['ficha'];

$miconexion=conectar('', 'senadb');
$resultado=consulta($miconexion, "UPDATE tipoidentificacion SET NombreTipo='{$tipoid}' WHERE NombreTipo='{$tipoid}'");

$resultado2=consulta($miconexion, "UPDATE aprendices SET Identificacion='{$identificacion}',Nombre='{$nombres}',PrimerApellido='{$primerApe}',SegundoApellido='{$segundoApe}',Direccion='{$direccion}',Telefono='{$telefono}' WHERE Id='{$ide}'");

$resultado3=consulta($miconexion, "UPDATE ficha SET NumeroFicha ='{$ficha}' WHERE NumeroFicha='{$ficha}'");

if ($resultado && $resultado2 && $resultado3) {
    echo "<script>
    alert('El aprendiz se Actualizo correctamente');
    window.history.go(-1);
    </script>";
} else {
    echo "<script>
    alert('Error no se pudo actualizar');
    window.history.go(-1);
    </script>";
    exit;
}
