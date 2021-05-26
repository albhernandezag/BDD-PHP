<?php

    require_once 'config.php';

    $id_actor = $_GET['id_actor'];

    $query1 = "DELETE FROM pelicula_actor WHERE id_actor = $id_actor;";
    $query2 = "DELETE FROM actor WHERE id_actor = $id_actor;";

    if ($conn->query($query1)) {
        
        if ($conn->query($query2)) {
        
            echo "<h1>El actor $id_actor se elimino correctamente</h1>";
        } else {
    
            echo "<h1>El actor $id_actor no se pudo eliminar correctamente</h1>";
        }
    } else {

        echo "<h1>El actor $id_actor no se pudo eliminar correctamente</h1>";
    }

    $conn->close();
?>