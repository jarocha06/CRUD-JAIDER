<?php
include('funciones.php');
$tipoid=intval($_POST['tipoid']);
$identificacion=$_POST['identificacion'];
$nombres=$_POST['nombres'];
$primerApe=$_POST['primerApellido'];
$segundoApe=$_POST['segundoApellido'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$ficha=$_POST['ficha'];

$miconexion=conectar('', 'senadb');
$resultado=consulta($miconexion,"INSERT INTO aprendices (IdTipoIdentificacion,Identificacion,Nombre,PrimerApellido,SegundoApellido,Direccion,Telefono) values ('{$tipoid}','{$identificacion}','{$nombres}','{$primerApe}','{$segundoApe}','{$direccion}','{$telefono}')");
$verificar_ficha = consulta($miconexion, "SELECT * FROM ficha WHERE NumeroFicha = '{$ficha}'");
if ($verificar_ficha->num_rows>0){
        echo "<script>
             alert('Error la Ficha ya existe');
             window.history.go(-1);
             </script>";  
}else {
    $resultado2=consulta($miconexion,"INSERT INTO ficha (NumeroFicha) values ('{$ficha}')");
}

if($resultado && $resultado2)
 {
   echo "<script>
        alert('El aprendiz se registro correctamente');
        window.history.go(-1);
        </script>";
 }
?>