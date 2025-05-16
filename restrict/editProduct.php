<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php 
        require_once "../connection/connection.php";
   
        $id = $_GET["id"] ?? "";

        $sql = "SELECT * FROM tbproducts WHERE id = $1";

        $param = [(int) $id];

        $data = pg_query_params($conn, $sql, $param);

        $row = pg_fetch_assoc($data);

    ?>

     <form class="row gx-3 gy-2 align-items-center" action="../scripts/editProduct_script.php" method="POST">

        <!-- Nome do Produto -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputNomeProduto">Nome do Produto</label>
            <input type="text" class="form-control" id="inputNomeProduto" placeholder="Nome do Produto" name="produto" value= "<?php echo $row["name"] ?>">
        </div>

        <!-- Preço -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputPreco">Preço</label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control" id="inputPreco" placeholder="Preço" name="preco" value= "<?php echo $row["price"] ?>" >
            </div>
        </div>

        <!-- Estoque -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputEstoque">Estoque</label>
            <div class="input-group">
                <input type="number" class="form-control" id="inputEstoque" placeholder="Estoque" name="estoque" value= "<?php echo $row["stock"] ?>" >
            </div>
        </div>

        <!-- Grupo -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="selectGrupo">Grupo</label>
            <select class="form-select" id="selectGrupo" name="grupoProduto" >

                <?php
                    $sql = "SELECT name FROM tbgroup ORDER BY name;";
                    $group = pg_query($conn, $sql);
                    while($rows = pg_fetch_assoc($group)){
                        $name = $rows["name"];
                        echo "<option value=$name>$name</option>";
                    }
                ?>
            </select>
        </div>
       
        <!-- Botão -->
        <div class="col-auto">
            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>
</body>
</html>