<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
    require_once "../connection/connection.php";
    require_once "../funcs/delet_alert.php";

    $id = $_POST['id'];
   

    $sql =  "DELETE FROM tbproducts WHERE id = $1";

    $param = [(int)$id];

    if(pg_query_params($conn, $sql, $param)){
        delete_alert('Excluído com sucesso', 'success');
    } else {
        delete_alert('Não foi possível excluir', 'danger');
    };

?>
</body>
</html>