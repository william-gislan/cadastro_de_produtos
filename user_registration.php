<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1 style="text-align: center;;">Cadastro de Usuário</h1>
            <form action="user_registration.php" method="POST">
            <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="index.php">Voltar</a>
            </form>
        </div>
      <?php 

        require_once "./connection/connection.php";
        //essa primeira parte verifica se já existe um usuário com o mesmo email

        if(isset($_POST["email"])) {
            $name  = $_POST["name"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


            $consult_user = "SELECT * FROM usuarios WHERE email  = $1";

            $user = [$email];

            $result_users = pg_query_params($conn, $consult_user, $user);

            $num_registers = pg_num_rows($result_users);

            if($num_registers == 1){
                echo "Usuário já existe";
                
            }  else {

                $insert_user = "INSERT INTO usuarios ( name,  email, password) VALUES ($1, $2, $3)";

                $params_users = [$name, $email, $password];

                $create_user = pg_query_params($conn, $insert_user, $params_users);

                print "Usuário cadastrado com sucesso";
            };
        }
      ?>
    </div>
</body>
</html>