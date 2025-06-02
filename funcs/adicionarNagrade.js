

function adicionarNaGrade(cliente, produto, quantidade, preco, tabela){
   
    let inputCliente = document.getElementById(cliente);
    let inputProduto = document.getElementById(produto);
    let inputQuantidade = document.getElementById(quantidade);
    let inputPreco = document.getElementById(preco);
    const tabelaProdutos = document.getElementById(tabela).getElementsByTagName("tbody")[0];

    const novaLinha = document.createElement("tr");
    const btnExcluir = document.createElement("button");
    btnExcluir.className = "btn btn-danger";
    btnExcluir.textContent = "Excluir";
    
    

    //removendo a linha especifica
    btnExcluir.addEventListener("click", () => {
        tabelaProdutos.removeChild(novaLinha);
    });

    const celulaProduto = document.createElement("td");
    celulaProduto.textContent = inputProduto.value;

    
    const celulaQuantidade = document.createElement("td");

    const jsonProduto = sessionStorage.getItem("arrayProduto");
    const data = JSON.parse(jsonProduto);
    
    
    produtoSelecionado = data.find(produto => inputProduto.value === produto.nome );
    const quantidadeNumero = parseInt(produtoSelecionado.estoque);

    if(!produtoSelecionado){
        alert("Produto Não encontrado");
    } else {
        if(inputQuantidade.value > quantidadeNumero ){
        alert(`Há somente ${quantidadeNumero} unidades desse produto no estoque`);
    } else {
        celulaQuantidade.textContent = inputQuantidade.value;
        const celulaPreco = document.createElement("td");
        celulaPreco.textContent = inputPreco.value;

        const celulaTotalPreco = document.createElement("td");
        let valorQuantidade = parseInt(inputQuantidade.value);
        let valorPreco = parseInt(inputPreco.value);
        let totalProduto = valorPreco * valorQuantidade;
        celulaTotalPreco.textContent = totalProduto;

        novaLinha.appendChild(celulaProduto);
        novaLinha.appendChild(celulaQuantidade);
        novaLinha.appendChild(celulaPreco);
        novaLinha.appendChild(celulaTotalPreco);
        novaLinha.appendChild(btnExcluir);

        tabelaProdutos.appendChild(novaLinha);

   
        inputProduto.value = "";
        inputQuantidade.value = "";
        inputPreco.value = "";

        };
    };

};
