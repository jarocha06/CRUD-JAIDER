<!doctype html>
<html>

<head>
  <title>Consulta de Programas</title>
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
                            <input class="form-control" type="number" name="prograid" value="" placeholder="Codigo del programa" /><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" style="text-transform:uppercase;" type="text" name="progranombre" value="" placeholder="Nombre" /><br>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" style="text-transform:uppercase;" type="text" name="progratipo" value="" placeholder="Tipo de programa" /><br>
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
     $vtipo=$_POST['progratipo'];
     $vid=$_POST['prograid'];
     $vnombre=$_POST['progranombre'];
     $miconexion=conectar('', 'senadb');
     $resultado=consulta($miconexion, "SELECT programa.Id, programa.Nombre, tipoprograma.TipoNombre FROM programa INNER JOIN tipoprograma ON programa.idTipoPrograma = tipoprograma.id WHERE trim(Codigo) LIKE '%{$vid}%' AND (trim(Nombre) LIKE'%{$vnombre}%' AND trim(idTipoPrograma) LIKE '%{$vtipo}%')");
     if ($resultado->num_rows>0) {
         while ($fila = $resultado->fetch_object()) {
            echo $fila->Id." ".$fila->Nombre." ".$fila->TipoNombre."<br>";
         }
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