<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <header>

    <?php 
        require_once "../connection/connection.php";

        $sql = "SELECT name, id FROM tbGroup ORDER BY name";

        $dados = pg_query($conn, $sql);
    ?>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Ínicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="newProduct.php">Cadastar Produto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newGroup.php">Cadastrar Grupo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="searchProduct.php">Pesquisar Produto</a>
            </li>
             <li class="nav-item">
                <a href="../logout.php" class="nav-link">Sair</a>
            </li>
        </ul>
    </header>
     <form class="row gx-3 gy-2 align-items-center" action="../scripts/newProduct_script.php" method="POST">

        <!-- Nome do Produto -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputNomeProduto">Nome do Produto</label>
            <input type="text" class="form-control" id="inputNomeProduto" placeholder="Nome do Produto" name="produto" required>
        </div>

        <!-- Preço -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputPreco">Preço</label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control" id="inputPreco" placeholder="Preço" name="preco" required>
            </div>
        </div>

        <!-- Estoque -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="inputEstoque">Estoque</label>
            <div class="input-group">
                <input type="number" class="form-control" id="inputEstoque" placeholder="Estoque" name="estoque" required>
            </div>
        </div>

        <!-- Grupo -->
        <div class="col-sm-3">
            <label class="visually-hidden" for="selectGrupo">Grupo</label>
            <select class="form-select" id="selectGrupo" name="grupoProduto" required>

                <?php

                    while($rows = pg_fetch_assoc($dados)){
                        $name = $rows["name"];
                        $id = $rows["id"];
                        echo "<option value=$id>$name</option>";
                    }
                ?>
                
            </select>
        </div>
        <!-- Botão -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>
</div>

</body>
</html>