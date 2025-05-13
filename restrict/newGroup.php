<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <head>
       <ul class="nav justify-content-center">
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
    </head>
     <form action="../scripts/newGroup_script.php" method="POST">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome do Grupo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="product">
          </div>
          
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>

      
</body>
</html>