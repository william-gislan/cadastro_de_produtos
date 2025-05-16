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
    <div class="container" style="display: flex; flex-direction:column; align-items:center; gap:1rem">
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

        <?php 
         
         require_once "../connection/connection.php";
        

            $search = $_GET["search"] ?? "";

            $sql = "SELECT * FROM tbproducts WHERE name LIKE '%$search%'";

            $params = [$search];

            $data = pg_query($conn, $sql);
        
        ?>
     <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" role="search" action="search_produtc.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" autofocus/>
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                </div>
            </nav>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
      <th scope="col">Grupo</th>
      <th scope="col">Estoque</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        while($row = pg_fetch_assoc($data)){
            $id = $row["id"];
            $name = $row["name"];
            $price = $row["price"];
            $group = $row["group_product"];
            $stock = $row["stock"];
            print
            "     <tr> 
                    <th scope='row'>$name</th>
                    <td>$price</td>
                    <td>$group</td> 
                    <td>$stock</td>
                    <td>
                    <a class='btn btn-danger' href='#' role='button' data-bs-toggle='modal' data-bs-target='#confirm' onclick=\"pegarDados($id,'$name')\">Excluir</a>

                    <a class='btn btn-primary' href='./editProduct.php?id=$id role='button'>Editar</a>
                    </td>
                </tr>
            ";
        }
    
    ?>
    
  </tbody>
</table>

        <!-- Modal -->
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
        <p id=nameProduct></p>
      </div>
      <form style="margin-left: 5px; padding-bottom:5px" action="../scripts/deleteProduct_script.php" method="POST">
        <input type="hidden" name="id" id="id" value="">
        <button type="submit" class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </form>
    </div>
  </div>
</div>
         <script>
            const pegarDados = (id, name) => {
                document.getElementById("id").value = id;
                document.getElementById("nameProduct").textContent = `Deseja excluir ${name}?`;
            }
         </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>