<!Doctype html>
<html>

<head>
    <title>Registro de Aprendices</title>
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
            <img class="img-fluid" src="imagenes/sena.jpg" width="378px" height="260px"> <?php } ?>
            <div id="div3">
                <?php
                if($_SESSION['tipousuario']==1)
                {
                ?>
                <form id="formulario" role="form" method="post" action="guardado_aprendiz.php">
                    <div class="row">
                        <strong class="lgris">Ingrese los datos del aprendiz</strong>
                        <table>
                            <tr>
                                <th>
                                    <div class="form-group">
                                        <label class="lgris">Tipo Identificacion:</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="row">
                                        <div class="form-group">
                                            <select class="form-control" name="tipoid">
                                                <option value="">Seleccione Opcion</option>
                                                <option value="1">CC</option>
                                                <option value="2">TI</option>
                                                <option value="3">RC</option>
                                                <option value="4">PEP</option>
                                            </select>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="lgris">Identificacion:</label>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                   <div class="form-row">
                                    <div class="form-group col-md-12">
                                     <input class="form-control input-lg" type="number" name="identificacion" min="9999" max="9999999999999" value="" placeholder="IDENTIFICACIÓN" required />
                                    </div>
                                   </div>
                                </th>
                            </tr>
                            <tr>
                             <th>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label class="lgris">Nombres:</label>
                                    </div>
                                </div>
                             </th>
                             <th>
                              <div class="form-row">
                               <div class="form-group col-md-12">
                                 <input class="form-control" style="text-transform: uppercase;" type="text" name="nombres" placeholder="Nombres" required/>
                                </div>
                              </div>
                             </th>
                           </tr>
                           <tr>
                             <th>
                               <div class="form-row">
                                <div class="form-group col-md-12">
                                 <label class="lgris">Primer Apellido:</label>
                                </div>
                               </div>
                             </th>
                             <th>
                               <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <input class="form-control" style="text-transform: uppercase;" type="text" name="primerApellido" placeholder="Primer Apellido" required />
                                 </div>
                                </div>
                             </th>
                            </tr>
                            <tr>
                              <th>
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label class="lgris">Segundo Apellido:</label>
                                  </div>
                                </div>
                              </th>
                              <th>
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input class="form-control" style="text-transform: uppercase;" type="text" name="segundoApellido" placeholder="Segundo Apellido" required />
                                  </div>
                                </div>
                              </th>
                            </tr>
                            <tr>
                              <th>
                                <div class="form-row">
                                 <div class="form-group col-md-12">
                                   <label class="lgris">Dirección:</label>
                                 </div>
                                </div>
                              </th>
                              <th>
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input class="form-control" style="text-transform: uppercase;" type="text" name="direccion" placeholder="Direccion" required />
                                  </div>
                                </div>
                              </th>
                            </tr>
                            <tr>
                                <th>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                         <label class="lgris">Teléfono:</label>
                                      </div>
                                  </div>
                                </th>
                                <th>
                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <input class="form-control" type="number" name="telefono" min="9999" max="9999999999999" placeholder="TELEFONO" required />
                                    </div>
                                  </div>
                                </th>
                            </tr>
                            <tr>
                              <th>
                                <div class="row">
                                   <div class="form-group col-md-12">
                                     <label class="lgris">Ficha:</label>
                                    </div>
                                </div>
                              </th>
                              <th>
                                <div class="row">
                                  <div class="form-group col-md-12">
                                    <?php
                                    include('funciones.php');
                                    $miconexion=conectar('', 'senadb');
                                    $resultado=consulta($miconexion, "SELECT * FROM ficha");?>
                                    <select class="form-control" name="ficha">
                                        <option value="">Seleccione Opcion</option>
                                    <?php
                                    while ($fila = $resultado->fetch_array()) {
                                    echo "<option value=".$fila['Id'].">".$fila['NumeroFicha']."</option>";
                                    }
                                    ?>
                                    </select>
                                  </div>
                                </div>
                              </th>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </form>
                <?php
                }
                else
                {
                    echo "<script>
                    alert('Notiene permisos para realizar esta accion');
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