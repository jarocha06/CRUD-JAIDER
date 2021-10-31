<!doctype html>
<html>

<head>
    <title>Modificación de Aprendices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="miscss/Estilos.css" rel="stylesheet" />
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
                    <br> <br>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input class="form-control" type="number" name="identificacion" autofocus value="" placeholder="Identificación" required/><br>
                        </div>
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
    $identificacion=$_POST['identificacion'];
    $miconexion=conectar('', 'senadb');
    $resultado=consulta($miconexion, "SELECT aprendices.Id, tipoidentificacion.NombreTipo, aprendices.Identificacion, aprendices.Nombre, aprendices.PrimerApellido, aprendices.SegundoApellido, aprendices.Direccion, aprendices.Telefono, ficha.NumeroFicha FROM aprendices 
    INNER JOIN ficha ON aprendices.IdFicha = ficha.Id 
    INNER JOIN tipoidentificacion ON aprendices.IdTipoIdentificacion = tipoidentificacion.Id 
    WHERE trim(Identificacion) LIKE '%{$identificacion}%'");
    if ($resultado->num_rows>0) {
        $fila = $resultado->fetch_object();
        $_SESSION['ide1']=$fila->Id; ?>
          <form id="formulario2" role="form" method="post" action="actualizar_aprendiz.php">
              <strong class="lgris">Datos del aprendiz</strong><br>
              <div class="col-md-12">

                  <label class="lgris">Id:</label>
                  <input class="form-control" type="text" name="ide" disabled="disabled"
                      value="<?php echo $fila->Id ?>" />
                    
                  <label class="lgris">Tipo identificacion:</label>
                  <input class="form-control" type="text" name="tipoid" value="<?php echo $fila->NombreTipo ?>" required />
                    
                  <label class="lgris">Identificacion:</label>
                  <input class="form-control" type="number" name="identificacion" value="<?php echo $fila->Identificacion ?>" required />
            
                  <label class="lgris">Nombres:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="nombres" 
                      value="<?php echo $fila->Nombre ?>" required />

                  <label class="lgris">Primer apellido:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="primerApellido"
                      value="<?php echo $fila->PrimerApellido ?>" required />

                  <label class="lgris">Segundo apellido:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="segundoApellido"
                      value="<?php echo $fila->SegundoApellido ?>" required />

                  <label class="lgris">Dirección:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="direccion"
                      value="<?php echo $fila->Direccion ?>" required />

                  <label class="lgris">Teléfono:</label>
                  <input class="form-control" type="number" name="telefono" min="9999" max="9999999999999"
                      value="<?php echo $fila->Telefono ?>" required />

                  <label class="lgris">Ficha:</label>
                  <input class="form-control" type="number" name="ficha" value="<?php echo $fila->NumeroFicha ?>" required />
                  <input class="btn btn-success" type="submit" value="Actualizar">
              </div>
              <br>
          </form>
          <?php
    } else {
        echo "No existen registros";
    }
    $miconexion->close();
 }?>
        </div>
    </div>
    </div>
</body>

</html>