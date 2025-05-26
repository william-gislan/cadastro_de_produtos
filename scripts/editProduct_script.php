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
        
        $id = $_POST["id"];
        $name = $_POST["produto"];
        $price = $_POST["preco"];
        $stock = $_POST["estoque"];
        $group = $_POST["grupoProduto"];


        $sql = "UPDATE tbproducts SET
            name = $1,
            price = $2,
            idgroup = $3,
            stock = $4

            WHERE id = $5;
        ";

        $params = [$name, $price, $group, $stock, $id];

        $edit_product = pg_query_params($conn, $sql, $params);
        header("location:../restrict/searchProduct.php");

    ?>

</body>
</html>