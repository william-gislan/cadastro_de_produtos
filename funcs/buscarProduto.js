async function buscarProduto(nome, tabela, input,btnClose, buscarProduto) {
   const nomeProduto = document.getElementById(nome).value;
   const tabelaProduto = document.getElementById(tabela).getElementsByTagName("tbody")[0];
   const inputProduto = document.getElementById(input);
   
    
   const convertendoLetraMaiuscula = nomeProduto.toUpperCase();
   

    
    document.getElementById(btnClose).addEventListener("click", () => {
        //
    });


    try {
        
        const response = await fetch(`../scripts/searchProduct.php?nomeProduto=${decodeURIComponent(nomeProduto)}`);
        const data = await response.json();

        console.log(data);

        if(data.mensagem){
            alert("Nenhum produto encontrado");
            
        } else{
            data.forEach(produto => {
            let novaLinha = document.createElement("tr");
            let btnAcao = document.createElement("button");

            btnAcao.textContent = "Selecionar";
            btnAcao.className = "btn btn-primary";

            let celulaNome = document.createElement("td");
            celulaNome.textContent = produto.nome;

            let celulaPreco = document.createElement("td");
            celulaPreco.textContent = produto.preco;


            let celulaEstoque = document.createElement("td");
            celulaEstoque.textContent = produto.estoque;


            novaLinha.appendChild(celulaNome);
            novaLinha.appendChild(celulaPreco);
            novaLinha.appendChild(celulaEstoque);
            novaLinha.appendChild(btnAcao);

            tabelaProduto.appendChild(novaLinha);


            btnAcao.addEventListener("click", () => {
                inputProduto.value = produto.nome;
                modalBuscarProduto = bootstrap.Modal.getInstance(document.getElementById(buscarProduto));
                modalBuscarProduto.hide();
            });
        });
        }

        
    } catch (error) {
        console.error(error.mensage);
    }
};