<?php 
    require_once "../connection/connection.php";

    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql =  "DELETE FROM tbproducts WHERE id = $1";

    $param = [(int)$id];

    if(pg_query_params($conn, $sql, $param)){
        echo "excluído com sucesso";
    } else {
        echo "Não foi possível excluir";
    };

?>