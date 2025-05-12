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
                <a class="nav-link disabled" aria-disabled="true">Sair</a>
            </li>
        </ul>
    </header>
    <div style="margin-top: 3rem;">
        <form class="row gx-3 gy-2 align-items-center" action="newProduct.php" method="POST">
            <div class="col-sm-3">
                <label class="visually-hidden" for="specificSizeInputName">Name</label>
                <input type="text" class="form-control" id="specificSizeInputName" placeholder="Nome do Produto">
            </div>
            <div class="col-sm-3">
                <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                <div class="input-group">
                <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Preço">
            </div>
            </div>
            <div class="col-sm-3">
                <label class="visually-hidden" for="specificSizeSelect">Preference</label>
                <select class="form-select" id="specificSizeSelect">
<!--
    codigo PHP para listar os grupos de produtos    
-->
                <option selected>Grupo...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            </div>
            <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                <label class="form-check-label" for="autoSizingCheck2">
                 Remember me
            </label>
    </div>
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

    </div>
</body>
</html>