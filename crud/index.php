<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="miscss/Estilos.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <div id="div1" class="container">
    <br/>
    <div id="div2">
      <div>
        <img class="img-fluid" src="imagenes/sena.jpg" width="388px" height="260px" />
      </div>
      <div id="div3">
        <form action="menu.php" class="needs-validation" method="POST" novalidate>
          <div class="row">
            <div class="col-md-12">
              <table>
                <div class="centrar">
                  <tr>
                    <div>    
                      <strong class="lgris">Ingrese su usuario y contraseña para iniciar sesión</strong>
                    </div>
                    <br>
                    <div class="form-group">
                      <th>
                        <label class="lgris"> Usuario:</label>
                      </th>
                    </div>
                    <div class="form-group">
                      <th>
                        <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario" required>
                      </th>
                    </div>
                  </tr>
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">Este campo no puede estar vacio</div>
                  <tr>
                    <div class="form-group">
                      <th>
                        <label class="lgris">Contraseña:</label>
                      </th>
                    </div> 
                    <div class="form-group">
                      <th>
                        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="clave" required>
                      </th>
                    </div>
                  </tr>
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">Este campo no puede estar vacio</div>
                </div>
              </table>
            </div>
          </div>
          <br>
          <input class="btn btn-success" type="submit" value="Iniciar sesión" />
          <br>
          <br>
        </form>
      </div>
    </div>
    <br/>
    <br/>
    <script>
    // Validar Campos vacios
    (function() {
      'use strict';
      window.addEventListener('load', function() {
          // Obtengo el formulario a validar
          var forms = document.getElementsByClassName('needs-validation');
          // Ralizo un bucle sobre el y evito que se envie los campos vacios
          var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                  }
                  form.classList.add('was-validated');
              }, false);
          });
      }, false);
    })();
    </script>
  </div>
</body>

</html>