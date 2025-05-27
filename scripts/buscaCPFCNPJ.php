<?php 
    header('Content-Type: application/json');
    require_once "../connection/connection.php";

        $tipo_pessoa = $_GET["tipoCPFCNPJ"] ?? "";
        $nome_pessoa = $_GET["nomePessoa"] ?? "";


        $sql = "SELECT * FROM tbclientes WHERE cpf = $1 OR nome  ILIKE $2";
        $parametros = [$tipo_pessoa, $nome_pessoa . '%' ];

        $consulta = pg_query_params($conn, $sql, $parametros);

        $rows = pg_num_rows($consulta);

        if($rows == 0) {
            $retorno_vazio = array(
                "mensagem" => "Nenhum cliente encontrado, por favor, cadastre-o"
            );
            $json_sem_cliente = json_encode($retorno_vazio);
            echo $json_sem_cliente;
        } else {
            while($row = pg_fetch_assoc($consulta)){
            $dados[] = array(
                "id" => $row["id"],
                "nome" => $row["nome"],
                "cpf" => $row["cpf"],
                "email" => $row["email"],
                "fone" => $row["fone"],
                "cep" => $row["cep"],
                "cidade" => $row["cidade"],
                "bairro" => $row["bairro"],
                "rua" =>    $row["rua"],
                "numero_local" => $row["numero_local"],
                "uf" => $row["uf"]
            );
          
        };
            $json_dados = json_encode($dados);
            echo $json_dados;
        };
?>