<!Doctype html>
<html>

<head>
    <title>Modificacar Fichas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="miscss/Estilos.css" rel="stylesheet"/>
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
                            <input class="form-control" type="number" name="fichanumero" min="9999" max="9999999999999" autofocus value="" placeholder="Numero de Ficha"/>
                        </div>
                        <br>
                        <div class="form-group col-md-3">
                            <input class="btn btn-success" type="submit" value="Consultar">
                        </div>
                    </div>
                    <br>
                  </div>
               </form>
               <br>
            </div>

        <div id="divconsulta2">
            <?php
 if ($_SERVER['REQUEST_METHOD']==='POST') {
    include('funciones.php');
    session_start();
    $ficha=$_POST['fichanumero'];
    $miconexion=conectar('', 'senadb');
    $resultado=consulta($miconexion, "SELECT ficha.Id, ficha.NumeroFicha, modalidad.NombreM, programa.Nombre FROM ficha 
    INNER JOIN modalidad ON ficha.IdModalidad = modalidad.Id 
    INNER JOIN programa ON ficha.IdPrograma = programa.Id 
    WHERE trim(NumeroFicha) LIKE '%{$ficha}%'");
    if ($resultado->num_rows>0) {
        $fila = $resultado->fetch_object();
        $_SESSION['fichaid']=$fila->Id; ?>
          <form id="formulario2" role="form" method="post" action="actualizar_ficha.php">
            <div class="col-md-12">
                <strong class="lgris">Datos de la Ficha</strong><br>

                <label class="lgris">Id:</label>
                <input class="form-control" type="number" name="ide" disabled="disabled"value="<?php echo $fila->Id ?>" />

                <label class="lgris">Numero Ficha:</label>
                <input class="form-control" type="number" name="fichanumero" min="9999" max="9999999999999" required value="<?php echo $fila->NumeroFicha ?>"required/>

                <label class="lgris">Tipo Modalidad:</label>
                <input class="form-control" style="text-transform:uppercase;" type="text" name="modalidad" required value="<?php echo $fila->NombreM ?>"required/>

                <label class="lgris">Programa al que pertenece:</label>
                <input class="form-control" style="text-transform:uppercase;" type="text" name="programa" value="<?php echo $fila->Nombre ?>" required/><br>
                <input class="btn btn-success" type="submit" value="Actualizar">
            </div>
              <br>
          </form>
          <?php
    } else {
        echo "
        <script>
         alert('Error no existen registros');
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