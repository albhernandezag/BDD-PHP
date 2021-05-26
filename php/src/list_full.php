<?php

    require_once 'config.php';

    $query = "SELECT p.*, a.*, p.ultima_actualizacion AS lup, a.ultima_actualizacion AS lua FROM pelicula p INNER JOIN inventario i
                on p.id_pelicula = i.id_pelicula LEFT JOIN alquiler a
                    on i.id_inventario = a.id_inventario;";

    $table = "
    <table class=\"table\">
        <thead>
            <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Titulo</th>
                <th scope=\"col\">Descripción</th>
                <th scope=\"col\">Año lanzamiento</th>
                <th scope=\"col\">Idioma</th>
                <th scope=\"col\">Idioma original</th>
                <th scope=\"col\">Duracion alquiler</th>
                <th scope=\"col\">Precio</th>
                <th scope=\"col\">Duración</th>
                <th scope=\"col\">Coste reemplazo</th>
                <th scope=\"col\">Clasificación</th>
                <th scope=\"col\">Caracteristicas especiales</th>
                <th scope=\"col\">Última actualizacion pelicula</th>
                <th scope=\"col\">Alquiler</th>
                <th scope=\"col\">Fecha alquiler</th>
                <th scope=\"col\">Inventario</th>
                <th scope=\"col\">Cliente</th>
                <th scope=\"col\">Fecha devolucion</th>
                <th scope=\"col\">Empleado</th>
                <th scope=\"col\">Última actualizacion inventadio</th>
            </tr>
        </thead>
    <tbody>";


    if ($resultado = $conn->query($query)) {
        
        /* obtener un array asociativo */
        while ($fila = $resultado->fetch_assoc()) {
            
            $table .= 
            "<tr>
                <td><b>".$fila['id_pelicula']."</b></td>
                <td>".$fila['titulo']."</td>
                <td>".$fila['descripcion']."</td>
                <td>".$fila['anyo_lanzamiento']."</td>
                <td><b>".$fila['id_idioma']."</b></td>
                <td><b>".$fila['id_idioma_original']."</b></td>
                <td>".$fila['duracion_alquiler']."</td>
                <td>".$fila['rental_rate']."</td>
                <td>".$fila['duracion']."</td>
                <td>".$fila['replacement_cost']."</td>
                <td>".$fila['clasificacion']."</td>
                <td>".$fila['caracteristicas_especiales']."</td>
                <td>".$fila['lup']."</td>
                <td><b>".$fila['id_alquiler']."</b></td>
                <td>".$fila['fecha_alquiler']."</td>
                <td><b>".$fila['id_inventario']."</b></td>
                <td><b>".$fila['id_cliente']."</b></td>
                <td>".$fila['fecha_devolucion']."</td>
                <td><b>".$fila['id_empleado']."</b></td>
                <td>".$fila['lua']."</td>
            </tr>";
        }
        
        /* liberar el conjunto de resultados */
        $resultado->free();
    }

    mysqli_close($conn);
    $table .= "</tbody></table>";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Alquileres Total</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>

    <?php echo $table; ?>

</body>
</html>