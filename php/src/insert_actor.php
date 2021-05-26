<?php

    require_once 'config.php';

    $name = $_POST['name_actor'];
    $surname = $_POST['surname_actor'];

    $query = "INSERT INTO actor (nombre, apellidos) VALUES ('$name', '$surname');";
    // echo $query; Printea la query para que sepas que funciona correctamente

    if ($conn->query($query)) {
        
        echo "<h1>El actor $name $surname se insertó correctamente</h1>";
    } else {

        echo "<h1>El actor $name $surname <b>no</b> se insertó correctamente</h1>";
    }

    $conn->close();
?>