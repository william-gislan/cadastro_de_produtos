async function buscarProduto(nome, tabela, input, preco, buscarProduto) {
   let nomeProduto = document.getElementById(nome);
   const tabelaProduto = document.getElementById(tabela).getElementsByTagName("tbody")[0];
   const inputProduto = document.getElementById(input);
   const inputPreco = document.getElementById(preco);

    
    try {
        
        const response = await fetch(`../scripts/searchProduct.php?nomeProduto=${decodeURIComponent(nomeProduto.value)}`);
        const data = await response.json();
        sessionStorage.setItem('arrayProduto', JSON.stringify(data));
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
                inputPreco.value = produto.preco;
                modalBuscarProduto = bootstrap.Modal.getInstance(document.getElementById(buscarProduto));
                modalBuscarProduto.hide();
                tabelaProduto.innerHTML = "";
                nomeProduto.value = "";

               
            });
            
        });
        
        }
    } catch (error) {
        console.error(error.mensage);
    }
};