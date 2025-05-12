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

        $sql = "SELECT name FROM tbGroup ORDER BY name";

        $dados = pg_query($conn, $sql);
    ?>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="newProduct.php">Cadastar Produto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newGroup.php">Cadastrar Grupo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pesquisar Produto</a>
            </li>
             <li class="nav-item">
                <a href="../logout.php" class="nav-link">Sair</a>
            </li>
        </ul>
    </header>
    <div style="margin-top: 3rem;">
        <form class="row gx-3 gy-2 align-items-center" action="newProduct.php" method="POST">
            <div class="col-sm-3">
                <label class="visually-hidden" for="specificSizeInputName">Name</label>
                <input type="text" class="form-control" id="specificSizeInputName" placeholder="Nome do Produto" name="produto">
            </div>
            <div class="col-sm-3">
                <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                <div class="input-group">
                <input type="number" class="form-control" id="specificSizeInputGroupUsername" placeholder="Preço" name="preco">
            </div>
            </div>
            <div class="col-sm-3">
                <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                <select class="form-select" id="specificSizeSelect" name="grupoProduto">
<!--
    codigo PHP para listar os grupos de produtos    
-->
                <option selected>Grupo...</option>

                <?php 
                   while($rows = pg_fetch_assoc($dados)){
                    $name = $rows["name"];
                    $id = $rows["id"];

                    print
                    "
                    <option value=$id>$name</option>
            
                    ";
                   }
                ?>
            </select>
            </div>
            <div class="col-auto">
           
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    </form>

    </div>

    <?php 
       if(isset($_POST["produto"])){
        $product = $_POST["produto"];
        $price = $_POST["preco"]; 
        $group_product = $_POST["grupoProduto"];

        $verify_product = "SELECT id, name FROM tbProducts WHERE name = $1";

       $name_param = [$product];

       $result_product = pg_query_params($conn, $verify_product, $name_param);

       $num_registers = pg_num_rows($result_product);

       if($num_registers == 1){
            echo "Já existe esse produto";
       } else {
            $insert_product =   "INSERT INTO tbProducts (name, price, group_product) VALUES ($1, $2, $3)";

            $params = [$product, $price, $group_product];

            $create_Product = pg_query_params($conn, $insert_product, $params);

            echo "Cadastrado com sucesso";
       }
       }    
       
       
    ?>
</body>
</html>