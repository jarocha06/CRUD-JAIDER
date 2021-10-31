<!Doctype html>
<html>

<head>
    <title>Modificación de Programas</title>
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
                            <input class="form-control" type="number" name="codigo" min="9999" max="9999999999999"
                                autofocus value="" placeholder="Codigo del programa" />
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
    $codigo=$_POST['codigo'];
    $miconexion=conectar('', 'senadb');
    $resultado=consulta($miconexion, "SELECT * FROM programa WHERE Codigo='{$codigo}'");
    if ($resultado->num_rows>0) {
        $fila = $resultado->fetch_object();
        $_SESSION['codigo']=$fila->Codigo; ?>
          <form id="formulario2" role="form" method="post" action="actualizar_programa.php">
              <div class="col-md-12">
                  <strong class="lgris">Datos del programa</strong><br>

                  <label class="lgris">Codigo programa:</label>
                  <input class="form-control" type="text" name="codigo" required value="<?php echo $fila->Codigo ?>" />

                  <label class="lgris">Nombre:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="progranombre" required value="<?php echo $fila->Nombre ?>" />

                  <label class="lgris">Tipo de programa:</label>
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="progratipo" value="<?php echo $fila->TipoNombre ?>" required /><br>
                  <input class="btn btn-success" type="submit" value="Actualizar">
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