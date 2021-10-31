<!doctype html>
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
    <header>
        <div class="alert" style="text-align: center;">
            <h3>Aprendices Registrados</h3>
        </div>
    </header>
    <section class="sectab">
        <table class="table col-md-12">
            <tr class="bg-success">
                <th>ID</th>
                <th>Tipo Identificacion</th>
                <th>Identificacion</th>
                <th>Nombres</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Ficha</th>
            <tr>
                <?php
include('funciones.php');
$miconexion=conectar('', 'senadb');
$resultado=consulta($miconexion, "SELECT aprendices.Id, tipoidentificacion.NombreTipo, aprendices.Identificacion, aprendices.Nombre, aprendices.PrimerApellido, aprendices.SegundoApellido, aprendices.Direccion, aprendices.Telefono, ficha.NumeroFicha FROM aprendices 
INNER JOIN ficha ON aprendices.IdFicha = ficha.Id 
INNER JOIN tipoidentificacion ON aprendices.IdTipoIdentificacion = tipoidentificacion.Id");

if ($resultado->num_rows>0) {
    while ($fila = $resultado->fetch_array()) {
        echo'
        <tr>'.'
        <td>'.$fila['Id'].'</td>'." ".'
        <td>'.$fila['NombreTipo'].'</td>'." ".'
        <td>'.$fila['Identificacion'].'</td>'." ".'
        <td>'.$fila['Nombre'].'</td>'." ".'
        <td>'.$fila['PrimerApellido'].'</td>'." ".'
        <td>'.$fila['SegundoApellido'].'</td>'." ".'
        <td>'.$fila['Direccion'].'</td>'." ".'
        <td>'.$fila['Telefono'].'</td>'." ".'
        <td>'.$fila['NumeroFicha'].'</td>'." ".'
        <tr>';
    }
} else {
    echo "No existen registros";
}
$miconexion->close();
?>
                </div>
                </div>
                </div>

        </table>
    </section>
</body>

</html>