<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="../funcs/buscarCliente.js"></script>
    </head>
<body>
  
   
    <form class="row g-3">
  <div class="col-md-3">
    <label for="" class="form-label">Cliente</label>
    <input type="text" class="form-control" id="cliente">
    <div class="col-12">
     <a class='btn btn-primary' href='#' role='button' data-bs-toggle='modal' data-bs-target='#buscar_cliente'>Buscar</a>
  </div>
  </div>
  <div class="col-md-3">
    <label for="inputProduct" class="form-label">Produto</label>
    <input type="text" class="form-control" id="inputProduct">
  </div>
  <div class="col-2">
    <label for="inputAddress" class="form-label">Quantidade</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="">
  </div>
   <div class="col-2">
    <label for="inputAddress" class="form-label">Preço</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="">
  </div>
 
  
  <div class="col-12">
    <button type="button" class="btn btn-secondary">Adicionar</button>
  </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Preço</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      
    </tr>
 
  </tbody>
</table>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Finalizar</button>
  </div>
</form>

<!-- Modal -->
<div class="modal fade" id="buscar_cliente" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn_close"></button>
      </div>
      <div class="modal-body">
            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" id="nome_cliente" autofocus/>
            <button class="btn btn-secondary" type="button" onclick="buscarCliente('nome_cliente', 'tabela_cliente', 'cliente', 'btn_close', 'buscar_cliente')">Pesquisar</button>
 
          <table class="table" id="tabela_cliente">
          <thead>
            <tr>
              
              <th scope="col">Nome</th>
              <th scope="col">CPF/CNPJ</th>
              <th scope="col">Selecionar</th> 
             
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

  <script>
    /*async function buscarCliente(){
      const nomePessoa = document.getElementById("nome_cliente").value;
      const tabelaCliente = document.getElementById("tabela_cliente").getElementsByTagName("tbody")[0];
      const inputCliente = document.getElementById("cliente");
      
      
      const btnClose = document.getElementById("btn_close").addEventListener("click", () => {
        tabelaCliente.textContent = "" //ao clicar no botão de fechar, limpa a tabela o input do nome;
        nomePessoa.value = "";
      });
      
      try {
        const response = await fetch(`../scripts/buscaCPFCNPJ.php?nomePessoa=${decodeURIComponent(nomePessoa)}`);
        const data = await response.json();
        console.log(data);

        data.forEach(cliente => {
          let novaLinha = document.createElement("tr");
          let btnAcao = document.createElement("button");
          
          
          btnAcao.textContent = "Selecionar";
          btnAcao.className = "btn btn-primary";
          
          let celulaNome = document.createElement("td");
          celulaNome.textContent = cliente.nome;

          let celulaCPF = document.createElement("td");
          celulaCPF.textContent = cliente.cpf;

          novaLinha.appendChild(celulaNome);
          novaLinha.appendChild(celulaCPF);
          novaLinha.appendChild(btnAcao);

          tabelaCliente.appendChild(novaLinha);

           btnAcao.addEventListener("click", () => {
            inputCliente.value = cliente.nome;
            modalBuscarCliente = bootstrap.Modal.getInstance(document.getElementById("buscar_cliente"));
            modalBuscarCliente.hide();
          });
          
        });
          
      } catch (error) {
        console.error(error.mensagem);
      }

    }*/
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>