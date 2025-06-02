<?php 
    require_once "../connection/connection.php";
    header('Content-Type: application/json');

    $nome_produto = $_GET["nomeProduto"];

    $sql = "SELECT * FROM tbproducts WHERE name = $1";

    $parametros = [$nome_produto];

    $consulta = pg_query_params($conn, $sql, $parametros);

    $rows = pg_num_rows($consulta);

    if($rows == 0){
        $retorno_vazio = array(
            "mensagem" => "Nenhum produto encontrado"
        );
        $json_sem_produto = json_encode($retorno_vazio);
        echo $json_sem_produto;
    } else {
        while($row = pg_fetch_assoc($consulta)){
            $dados [] = array(
                "nome" => $row["name"],
                "preco" => $row["price"],
                "estoque" => $row["stock"]
            );

            $array_produto = json_encode($dados);
            echo $array_produto;
        }
    }
       

?>