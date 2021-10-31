<!Doctype html>
<html>

<head>
  <title>Consulta de Aprendices</title>
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
                 <strong class="lgris">Ingrese criterio de busqueda</strong>
                  <div class="col-md-12">
                    <br> <br>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <input class="form-control" type="number" name="identificacion" min="9999" max="9999999999999"
                                value="" placeholder="IDENTIFICACION" required/><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" style="text-transform:uppercase;" type="text" name="nombres"
                                value="" placeholder="Nombres" /><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" style="text-transform:uppercase;" type="text" name="primerApellido"
                                value="" placeholder="Primer apellido" /><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input style="display: flex justify-content: space-around;" class="btn btn-success" type="submit" value="Consultar">
                        </div><br>
                        <div class="form-group col-md-3">
                           <input class="btn btn-success" type="button" onclick="location.href ='consultaTodos_aprendiz.php'" value="Consultar todos"><br><br>
                        </div>
                    </div>
                    <br>
                  </div>
                </form>
                <br>
            </div>
            </div>
        <div id="divconsulta2">
 <?php
 if ($_SERVER['REQUEST_METHOD']=='POST') {
     include('funciones.php');
     $videntificacion=$_POST['identificacion'];
     $vnombres=$_POST['nombres'];
     $vprimerApe=$_POST['primerApellido'];
     $miconexion=conectar('', 'senadb');
     $resultado=consulta($miconexion, "SELECT aprendices.Id, tipoidentificacion.NombreTipo, aprendices.Identificacion, aprendices.Nombre, aprendices.PrimerApellido, aprendices.SegundoApellido, aprendices.Direccion, aprendices.Telefono, ficha.NumeroFicha FROM aprendices INNER JOIN ficha ON aprendices.IdFicha = ficha.Id INNER JOIN tipoidentificacion ON aprendices.IdTipoIdentificacion = tipoidentificacion.Id WHERE (Identificacion) LIKE '%{$videntificacion}%' AND (Nombre) LIKE '%{$vnombres}%' AND (PrimerApellido) LIKE '%{$vprimerApe}%'");
     
     if ($resultado->num_rows>0) {
        $fila = $resultado->fetch_object();
        $_SESSION['ide1']=$fila->Id; ?>
          <form id="formulario2" role="form" method="post" action="consulta_aprendiz.php">
              <strong class="lgris">Datos del aprendiz</strong><br>
              <div class="col-md-12">

                  <label class="lgris">Id:</label>
                  <input class="form-control" type="text" name="ide" disabled="disabled"
                      value="<?php echo $fila->Id ?>"/>
                    
                  <label class="lgris">Tipo identificacion:</label>
                  <input class="form-control" type="text" name="tipoid" disabled="disabled" value="<?php echo $fila->NombreTipo ?>"/>
                    
                  <label class="lgris">Identificacion:</label>
                  <input class="form-control" type="number" name="identificacion" disabled="disabled" value="<?php echo $fila->Identificacion ?>"/>
            
                  <label class="lgris">Nombres:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="nombres" disabled="disabled" value="<?php echo $fila->Nombre ?>"/>

                  <label class="lgris">Primer apellido:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="primerApellido" disabled="disabled" value="<?php echo $fila->PrimerApellido ?>"/>

                  <label class="lgris">Segundo apellido:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="segundoApellido" disabled="disabled" value="<?php echo $fila->SegundoApellido ?>"/>

                  <label class="lgris">Dirección:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="direccion" disabled="disabled" value="<?php echo $fila->Direccion ?>"/>

                  <label class="lgris">Teléfono:</label>
                  <input class="form-control" type="number" name="telefono" min="9999" max="9999999999999" disabled="disabled" value="<?php echo $fila->Telefono ?>"/>

                  <label class="lgris">Ficha:</label>
                  <input class="form-control" type="number" name="ficha" disabled="disabled" value="<?php echo $fila->NumeroFicha ?>"/>
                  <br>
              </div>
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