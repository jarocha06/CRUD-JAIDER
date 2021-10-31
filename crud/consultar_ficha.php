<!Doctype html>
<html>

<head>
  <title>Consultar Fichas</title>
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
                        <div class="form-group col-md-3">
                            <input class="form-control" type="number" name="fichanumero" placeholder="NUMERO FICHA"/><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" style="text-transform:uppercase;" type="text" name="modalidad" placeholder="Modalidad"/><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" style="text-transform:uppercase;" type="text" name="programa" placeholder="Programa"/><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="btn btn-success" type="submit" value="Consultar"/>
                        </div>
                    </div>
                    <br>
            </div>
            </form>
            <br>
        </div>

        <div id="divconsulta2">
 <?php
 if ($_SERVER['REQUEST_METHOD']=='POST') {
     include('funciones.php');
     $ficha=$_POST['fichanumero'];
     $modalidad=$_POST['modalidad'];
     $programa=$_POST['programa'];
     $miconexion=conectar('', 'senadb');
     $resultado=consulta($miconexion, "SELECT ficha.Id, ficha.NumeroFicha, modalidad.NombreM, programa.Nombre FROM ficha 
     INNER JOIN modalidad ON ficha.IdModalidad = modalidad.Id 
     INNER JOIN programa ON ficha.IdPrograma = programa.Id 
     WHERE (NumeroFicha) LIKE '%{$ficha}%' AND (IdModalidad) LIKE '%{$modalidad}%' AND (IdPrograma) LIKE '%{$programa}%'");
     if ($resultado->num_rows>0) {
        $fila = $resultado->fetch_object();
        $_SESSION['ide1']=$fila->Id; ?>
          <form id="formulario2" role="form" method="post" action="consultar_ficha.php">
              <strong class="lgris">Datos de la ficha</strong><br>
              <div class="col-md-12">

                  <label class="lgris">Id:</label>
                  <input class="form-control" type="text" name="ide" disabled="disabled" value="<?php echo $fila->Id ?>"/>
                    
                  <label class="lgris">Numero de Ficha:</label>
                  <input class="form-control" type="text" name="fichanumero" disabled="disabled" value="<?php echo $fila->NumeroFicha ?>"/>
                    
                  <label class="lgris">Tipo Modalidad:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="modalidad" disabled="disabled" value="<?php echo $fila->NombreM ?>"/>
            
                  <label class="lgris">Programa al que pertenece:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="programa" disabled="disabled" value="<?php echo $fila->Nombre ?>"/>
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