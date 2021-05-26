<?php

    require_once 'config.php';

    $query = "SELECT a.*, p.titulo FROM actor a INNER JOIN pelicula_actor pa
                on a.id_actor = pa.id_actor INNER JOIN pelicula p
                    on pa.id_pelicula = p.id_pelicula
                ORDER BY a.id_actor;";

    $table = "
    <table class=\"table\">
        <thead>
            <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Nombre</th>
                <th scope=\"col\">Apellido</th>
                <th scope=\"col\">Última actualizacion</th>
                <th scope=\"col\">Pelicula</th>
                <th scope=\"col\">Acciones</th>
            </tr>
        </thead>
    <tbody>";


    if ($resultado = $conn->query($query)) {

        while ($fila = $resultado->fetch_assoc()) {
            
            $table .= 
            "<tr>
                <td><b>".$fila['id_actor']."</b></td>
                <td>".$fila['nombre']."</td>
                <td>".$fila['apellidos']."</td>
                <td>".$fila['ultima_actualizacion']."</td>
                <td>".$fila['titulo']."</td>
                <td><a href=\"delete_actor.php?id_actor=$fila[id_actor]\"><b>X</b></a></td>
            </tr>";
        }

        $resultado->free();
    }

    mysqli_close($conn);
    $table .= "</tbody></table>";
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Mostrar Actores</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>
<body>
    
    <div class="container">

    <?php echo $table; ?>

    </div>
</body>
</html>