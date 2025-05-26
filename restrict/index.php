<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/productsStyles/index.css">
</head>
<body>
  
    <div class="container">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Produtos
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" aria-current="page" href="newProduct.php">Cadastar Produto</a>
                </li>
                <li>
                    <a class="dropdown-item" href="newGroup.php">Cadastrar Grupo</a>
                </li>
                <li>
                    <a class="dropdown-item" href="searchProduct.php">Pesquisar Produto</a>
                </li>
                <li>
                    <a href="../logout.php" class="dropdown-item">Sair</a>
                </li>
            </ul>
    
        </div>

        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Vendas
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" aria-current="page" href="newSale.php">Efetuar Venda</a>
                </li>
                <li>
                    <a class="dropdown-item" href="newGroup.php">Cancelar Venda</a>
                </li>
                <li>
                    <a class="dropdown-item" href="newClient.php">Cadastrar Cliente</a>
                </li>
                <li>
                    <a href="../logout.php" class="dropdown-item">Sair</a>
                </li>
            </ul>
    
        </div>
        
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>
</html>