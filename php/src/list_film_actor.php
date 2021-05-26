<?php

    require_once 'config.php';

    $name = $_POST['name_actor'];
    $surname = $_POST['surname_actor'];


    $query = "SELECT p.*, a.*, p.ultima_actualizacion AS lup, a.ultima_actualizacion AS lua FROM pelicula p INNER JOIN pelicula_actor pa
                on p.id_pelicula = pa.id_pelicula INNER JOIN actor a
                    on pa.id_actor = a.id_actor 
                        WHERE a.nombre = '$name' AND a.apellidos = '$surname';";

    $table = "
    <table class=\"table\">
        <thead>
            <tr>
                <th scope=\"col\">id_pelicula</th>
                <th scope=\"col\">titulo</th>
                <th scope=\"col\">descripcion</th>
                <th scope=\"col\">anyo_lanzamiento</th>
                <th scope=\"col\">id_idioma</th>
                <th scope=\"col\">id_idioma_original</th>
                <th scope=\"col\">duracion_alquiler</th>
                <th scope=\"col\">rental_rate</th>
                <th scope=\"col\">duracion</th>
                <th scope=\"col\">replacement_cost</th>
                <th scope=\"col\">clasificacion</th>
                <th scope=\"col\">caracteristicas_especiales</th>
                <th scope=\"col\">ultima_actualizacion</th>
                <th scope=\"col\">id_actor</th>
                <th scope=\"col\">nombre</th>
                <th scope=\"col\">apellidos</th>
                <th scope=\"col\">ultima_actualizacion</th>

            </tr>
        </thead>
    <tbody>";


    if ($resultado = $conn->query($query)) {
        
        /* obtener un array asociativo */
        while ($fila = $resultado->fetch_assoc()) {
            
            $table .= 
            "<tr>
                <td>".$fila['id_pelicula']."</td>
                <td>".$fila['titulo']."</td>
                <td>".$fila['descripcion']."</td>
                <td>".$fila['anyo_lanzamiento']."</td>
                <td>".$fila['id_idioma']."</td>
                <td>".$fila['id_idioma_original']."</td>
                <td>".$fila['duracion_alquiler']."</td>
                <td>".$fila['rental_rate']."</td>
                <td>".$fila['duracion']."</td>
                <td>".$fila['replacement_cost']."</td>
                <td>".$fila['clasificacion']."</td>
                <td>".$fila['caracteristicas_especiales']."</td>
                <td>".$fila['lup']."</td>
                <td>".$fila['id_actor']."</td>
                <td>".$fila['nombre']."</td>
                <td>".$fila['apellidos']."</td>
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
    <title>Actor Pelicula</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>

    <?php echo $table; ?>
</body>
</html>