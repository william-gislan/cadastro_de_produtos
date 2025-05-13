<?php 
        require_once "../connection/connection.php";


        if(isset($_POST['product'])) {
          $product = $_POST['product'];

          $consult_group = "SELECT * FROM tbGroup WHERE name = $1";

          $params_group = [$product];

          $result_group = pg_query_params($conn, $consult_group, $params_group);
          
          $num_registers = pg_num_rows($result_group);

          if($num_registers == 1){
            echo "Já existe esse grupo";
          } else {
            $insert_product = "INSERT INTO tbGroup (name) VALUES ($1)";

            $create_group = pg_query_params($conn,$insert_product, $params_group);

            echo "Grupo cadastrado com sucesso";
          }

        }
      
      ?>