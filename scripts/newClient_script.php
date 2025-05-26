<?php 

    require_once "../connection/connection.php";
    
    if(isset($_POST["cliente"])){
        $cliente = $_POST["cliente"];
        $tipo_pessoa = $_POST["tipoPessoa"];
        $email = $_POST["email"];
        $fone = $_POST["fone"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $bairro = $_POST["bairro"];
        $rua = $_POST["rua"];
        $numero_local = $_POST["numero"];
        $uf = $_POST["uf"];


        $vericando_cliente = "SELECT * FROM tbclientes WHERE nome = $1;";
        $parametro = [$cliente];
        $resultado_verificacao = pg_query_params($conn, $vericando_cliente, $parametro);

        $numero_registros = pg_num_rows($resultado_verificacao);

        if($numero_registros == 1){
            echo "Cliente já está cadastrado";
        } else {
            $inserindo_cliente =    "INSERT INTO tbclientes(nome, cpf, email, fone, cep, cidade, bairro, rua, numero_local, uf) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10);";

            $parametros_cliente = [$cliente, $tipo_pessoa, $email, $fone, $cep, $cidade, $bairro, $rua, $numero_local, $uf];

            $inserindo_cliente = pg_query_params($conn, $inserindo_cliente, $parametros_cliente);

            header("location: ../restrict/newClient.php");
        };

    };

?>