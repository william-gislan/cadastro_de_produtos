 <?php 

        require_once "../connection/connection.php";


       if(isset($_POST["produto"])){
        $product = $_POST["produto"];
        $price = $_POST["preco"]; 
        $group_product = $_POST["grupoProduto"];
        $stock = $_POST["estoque"];

       $verify_product = "SELECT id, name FROM tbProducts WHERE name = $1";

       $name_param = [$product];

       $result_product = pg_query_params($conn, $verify_product, $name_param);

       $num_registers = pg_num_rows($result_product);

       if($num_registers == 1){
            echo $produto_existente = json_encode(array("mensagem" => "Produto ja existe"));
       } else {
            $insert_product =   "INSERT INTO tbProducts (name, price, idgroup, stock) VALUES ($1, $2, $3, $4)";

            $params = [$product, $price, $group_product, $stock];

            $create_Product = pg_query_params($conn, $insert_product, $params);

            
            $json_sucesso = array(
               "mensagem" => "Produto Cadastrado com sucesso"
            );
            $json_retorno = json_encode($json_sucesso);
            echo $json_retorno;
            header("location:../restrict/newProduct.php");
           
          }
     };
       
    ?>