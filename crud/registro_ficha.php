<!doctype html>
<html>

<head>
    <title>Registro de Fichas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="miscss/Estilos.css" rel="stylesheet" />
    <script src="js/bootstrap.js"></script>
</head>

<body>
    <div id="div1" class="container">
        <br>
        <div id="div2">
            <?php session_start(); if(! empty($_SESSION['tipousuario'])) { ?>
            <img class="img-fluid" src="imagenes/sena.jpg" width="388px" height="280px"> <?php } ?>
            <div id="div3">
                <?php
 if($_SESSION['tipousuario']==1)
 {
 ?>
                <form id="formulario" role="form" method="post" action="guardado_ficha.php">
                    <div class="col-md-12">
                        <strong class="lgris">Ingrese los datos de la ficha</strong>
                        <br>
                            <div class="form-group col-md-6">
                                <label class="lgris">Numero de ficha:</label>
                                <input class="form-control input-lg" type="number" name="fichanumero" min="9999"
                                    max="9999999999999" value="" placeholder="Numero de la ficha" required />
                            </div>
                        </div>
                        <label class="lgris">Modaildad a la que pertenece:</label>
                        <div class="form-row">
                            <div class="form-group col-xs-2">
                                <select class="form-control" name="modalidad" required>
                                    <option value="">Seleccione Opcion</option>
                                    <option value="1">PRESENCIAL</option>
                                    <option value="2">VIRTUAL</option>
                                    <option value="3">SEMI-PRESENCIAL</option>
                                </select>
                            </div>
                        </div>
                        <label class="lgris">Programa al que pertenece:</label>
                        <div class="form-row">
                            <input class="form-control" style="text-transform: uppercase;" type="text" name="programa" value="" placeholder="Programa" required />
                        </div>
                        <br>
                        <input class="btn btn-success" type="submit" value="Guardar">
                    </div>
                </form>
                <?php
 }
 else
 {
  echo "No tiene permisos para realizar esta acción";
 }
 ?>
                <br>
            </div>
        </div>
    </div>
</body>

</html>