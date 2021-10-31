<!doctype html>
<html>

<head>
    <title>Registro de Programas</title>
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
                <form id="formulario" role="form" method="post" action="guardado_programa.php">
                    <div class="col-md-12">
                        <strong class="lgris">Ingrese los datos del programa</strong>
                        <br>
                            <label class="lgris">Tipo de Programa:</label>
                        <div class="form-row">
                            <div class="form-group col-xs-2">
                                <select class="form-control" name="idTipoPrograma">
                                    <option value="">Seleccione Opcion</option>
                                    <option value="1">TEGNOLOGO</option>
                                    <option value="2">TECNICO</option>
                                    <option value="3">VIRTUAL</option>
                                    <option value="4">ESPECIAL</option>
                                </select>
                            </div>
                        </div>
                        <label class="lgris">Codigo:</label>
                        <input class="form-control" type="number" name="codigo" min="9999" max="9999999999999" value="" placeholder="Codigo" required />
                        <label class="lgris">Nombre:</label>
                        <input type="text" class="form-control" style="text-transform: uppercase;" name="progranombre" value="" placeholder="Nombre del programa" required />
                        <br>
                        <input class="btn btn-success" type="submit" value="Guardar">
                    </div>
                </form>
                <?php
 }
 else
 {
    echo "
    <script>
     alert('No tiene permisos para realizar esta acción');
     window.history.go(-1);
    </script>";
 }
 ?>
                <br>
            </div>
        </div>
    </div>
</body>

</html>