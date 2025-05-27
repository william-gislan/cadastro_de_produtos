<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/clientStyles/newClient.css">
    <script src="../funcs/consultaCEP.js"></script>
    <script src="../funcs/buscarCliente.js"></script>
    </head>

     <?php 
        require_once "../connection/connection.php";
       
        $sql = "SELECT id, name FROM tbproducts";

        $dados = pg_query($conn, $sql);
    ?>
        

    <header>
       
        <a class="nav-link active" aria-current="page" href="index.php">Ínicio</a>
        
    </header>
<body>
    <div class="container">
        
      <form class="row gx-3 gy-2 align-items-center" action="../scripts/newClient_script.php" method="POST" style="flex-direction: column;">

        <!-- Nome do Produto -->
        <div class="col-sm-3">
            <input type="text" class="form-control" id="cliente" placeholder="Nome do Cliente" name="cliente" required>
        </div>

        <!-- Preço -->
        <div class="col-sm-3">
                <input type="text" step="0.01" class="form-control" placeholder="CPF/CNPJ" name="tipoPessoa" id="tipoPessoa" required>
        </div>

        <div class="col-sm-3">
                <button type="button" class="btn btn-secondary" onclick="buscarCpfCnpj('tipoPessoa', 'input', 'cliente', 'email', 'fone', 'cep', 'cidade', 'bairro', 'rua', 'numero', 'uf')">Buscar Cliente</a>
        </div>

        <div class="col-sm-3">
                <input type="email" step="0.01" id="email" class="form-control" placeholder="Email" name="email" required>
        </div>

        <div class="col-sm-3">
                <input type="tel" step="0.01" id="fone" class="form-control" placeholder="Fone" name="fone" required>
        </div>

        <div class="col-sm-3">
                <input type="text" step="0.01" id="cep" class="form-control" placeholder="#####-###" name="cep" required>
        </div>
         
        <div class="col-sm-3">
                <button type="button" class="btn btn-secondary" id="mostrar" onclick="preencheEndereco('cep', 'rua', 'cidade', 'bairro', 'uf')">Buscar CEP</button>
        </div>

        <div class="col-sm-3">
                <input type="text" step="0.01" id="cidade" class="form-control" placeholder="Cidade" name="cidade" required>
        </div>

         <div class="col-sm-3">
                <input type="text" step="0.01" id="bairro" class="form-control" placeholder="Bairro" name="bairro" required>
        </div>

        <div class="col-sm-3">
                <input type="text" step="0.01" id="rua" class="form-control" placeholder="Rua" name="rua" required>
        </div>

        <div class="col-sm-3">
                <input type="text" step="0.01" id="numero" class="form-control" placeholder="Número" name="numero">
        </div>

        <div class="col-sm-3">
                <input type="text" step="0.01" id="uf" class="form-control" placeholder="UF" name="uf" required>
        </div>
       

      
      
        <!-- Botão -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        <div class="col-sm-3">

        </div>

    </form>

    </div>
    
    <script>

      /*async function buscarCliente(){
                let tipoPessoa = document.getElementById("tipoPessoa").value;
                if(tipoPessoa === "") {
                        alert("Insira o CPF/CNPJ");
                        
                } else {
                        //enviando o valor do CPF para o backend e obtendo o retorno
                        try {
                                const response = await fetch(`../scripts/buscaCPFCNPJ.php?tipoPessoa=${decodeURIComponent(tipoPessoa)}`);
                                const data = await response.json();
                                console.log(data);

                                if(data.mensagem) { //caso não tem nenhum cliente, vai retornar um json com a mensagem
                                       alert("Nenhum cliente encontrado");
                                        let inputs = document.getElementsByClassName("form-control");

                                        inputs.foreach(input => {
                                                input.value = "";
                                        })
                                } else {
                                        document.getElementById("cliente").value = data.nome;
                                        document.getElementById("email").value = data.email;
                                        document.getElementById("fone").value = data.fone
                                        document.getElementById("cep").value = data.cep;
                                        document.getElementById("cidade").value = data.cidade;
                                        document.getElementById("bairro").value = data.bairro;
                                        document.getElementById("rua").value = data.rua;
                                        document.getElementById("numero").value = data.numero_local;
                                        document.getElementById("uf").value = data.uf;
                                }

                                
                        } catch (error) {
                               console.error(error.menssage); 
                        };
                };      
        }
    
       

       */
        
    </script>


      
</body>
</html>