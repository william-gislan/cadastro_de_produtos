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
        <form action="index.php" method="POST">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
        <a href="user_registration.php" class="btn btn-primary">Cadastrar</a>
      </form>

      <?php 
        if(isset($_POST['email'])){
          $email = $_POST['email'];
          $password = $_POST['password'];

          require_once "./connection/connection.php";
          
          $sql = "SELECT * FROM usuarios WHERE email = $1";

          $param = [$email];

          $result = pg_query_params($conn, $sql, $param);

          $_num_registers = pg_num_rows($result);

          if($_num_registers == 1){
            $line = pg_fetch_assoc($result);
            $passsword_verify = password_verify($password, $line['password']);
            if($email == $line['email'] and $passsword_verify){
              session_start();
              $_SESSION['email'] = $line['email'];
              header("location:restrict");
            } else {
              echo "Login inválido";
            }
          } else {
            echo "Login inválido";
          }
        }
      ?>
        </div>
    </div>
</body>
</html>