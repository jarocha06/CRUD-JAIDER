<?php
 include('funciones.php');
 session_start();
 $_SESSION['usuario']=$_POST['usuario'];
 $_SESSION['clave']=$_POST['clave'];

 $miconexion=conectar('', 'senadb');
 $resultado=consulta($miconexion, "SELECT * FROM usuario WHERE Nombre='{$_SESSION['usuario']}' AND Clave='{$_SESSION['clave']}'");
?>
<!doctype html>
<html>

<head>
  <title>Menu principal</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="miscss/Estilos.css" rel="stylesheet" />
  <script src="js/bootstrap.js"></script>
</head>

<body>
    <div id="div1" class="container"><br>
        <div id="div2">
            <?php if ($resultado->num_rows>0) { ?> <img class="img-fluid" src="imagenes/sena.jpg" width="388px" height="280px"> <?php } ?>
            <div id="div3">
                <?php
     if ($resultado->num_rows>0) {
         $fila = $resultado->fetch_object();
         $_SESSION['tipousuario']=$fila->IdTipoUsuario; ?>
        <label class="lgris">Bienvenido <?php echo $_SESSION['usuario'] ?></label><br><br>
        <input style="width:45%;" class="btn btn-success" type="button" onclick="location.href ='menu_aprendices.php'" value="APRENDICES">
        <input style="width:45%;" class="btn btn-success" type="button" onclick="location.href ='menu_programas.php'" value="PROGRAMAS"><br><br>
        <input style="width:45%;" class="btn btn-success" type="button" onclick="location.href ='menu_fichas.php'" value="FICHAS">
        <input style="width:45%;" class="btn btn-success" type="button" onclick="location.href ='menu_instructores.php'" value="INSTRUCTORES"><br><br>
        <input style="width:50% text-align: center;" class="btn btn-success" type="button" onclick="location.href ='index.php'" value="SALIR">
        <?php
     } else {
         echo "Usuario o clave invalido";
     }
 $miconexion->close();
 ?>
                <br><br>
            </div>
        </div>
    </div>
</body>

</html>