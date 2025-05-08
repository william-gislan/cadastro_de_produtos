<?php 
 
    $server = "localhost";
    $user = "postgres";
    $pass = "123456";
    $db = "produtos";

    $connection_string = "host=$server dbname=$db user=$user password=$pass";

    $conn = pg_connect($connection_string);

    // if($coon){
    //     echo "conectado";
    // } else {
    //     echo "falhou";
    // }
?>