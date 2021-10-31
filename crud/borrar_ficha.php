<!Doctype html>
<html>

<head>
  <title>Eliminar Fichas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <link href="miscss/estilos.css" rel="stylesheet"/>
  <script src="js/bootstrap.js"></script>
</head>

<body>
    <div id="divconsulta" class="container">
        <br>
        <div id="div2">
            <div id="div4">
                <form name="formulario" role="form" method="post">
                 <div class=" col-md-12">
                    <strong class="lgris">Ingrese criterio de busqueda</strong>
                    <br> 
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input class="form-control" type="number" name="fichanumero" min="9999" max="9999999999999"
                                value="" placeholder="Numero de Ficha"/><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="btn btn-success" type="submit" value="Eliminar">
                        </div>
                    </div>
                    <br>
                 </div>
                </form>
                <br>
            </div>
            <div id="divconsulta2">
            <?php
 if ($_SERVER['REQUEST_METHOD']==='POST')
 {
 include('funciones.php');
 $ficha=$_POST['fichanumero'];
 $miconexion=conectar('', 'senadb');
 $resultado=consulta($miconexion,"SELECT * FROM ficha WHERE NumeroFicha='{$ficha}'");
 $resultado2=consulta($miconexion,"DELETE FROM ficha WHERE NumeroFicha='{$ficha}'");
 if($resultado->num_rows>0)
 {
 $fila = $resultado->fetch_object();
 echo $fila->progra_id." ".$fila->progra_nombre." ".$fila->progra_tipo."<br>";

 if($resultado2)
 echo "
    <script>
     alert('Se Elimino correctamente');
     .history.go(-1);
    </script>";
 }
 else{
    echo "
    <script>
     alert('No exixten Registros');
     window.history.go(-1);
    </script>";
    exit;
 }
 $miconexion->close();
 }?>
        </div>
    </div>
    </div>
</body>

</html>