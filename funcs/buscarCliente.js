
//busca o cliente pelo nome dentro da tela de venda
async function buscarCliente(nome_cliente, tabela_cliente, cliente, btn_close, buscar_cliente) {
    const nomePessoa = document.getElementById(nome_cliente).value;
    const tabelaCliente = document.getElementById(tabela_cliente).getElementsByTagName("tbody")[0];
    const inputCliente = document.getElementById(cliente);
      
    document.getElementById(btn_close).addEventListener("click", () => {
        tabelaCliente.textContent = "";
        nomePessoa.value = "";
    });
      
    try {
        //faz um requisição para o backend no arquivo buscarCPFCNPJ.php e tem um json de retorno
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
                modalBuscarCliente = bootstrap.Modal.getInstance(document.getElementById(buscar_cliente));
                modalBuscarCliente.hide();
            });
        });
          
    } catch (error) {
        console.error(error.mensagem);
    }
}


//busca o cliente pelo CPF/CNPJ mas dentro do cadastro de clientes
async function buscarCpfCnpj(tipoPessoa, input, cliente, email, fone, cep, cidade, bairro, rua, numero, uf){
                const tipoCPFCNPJ = document.getElementById(tipoPessoa).value;
                if(tipoCPFCNPJ === "") {
                        alert("Insira o CPF/CNPJ");
                        
                } else {
                        //enviando o valor do CPF para o backend e obtendo o retorno
                        try {
                                //faz uma requisição para o backend com o numero do CPF/CNPJ
                                const response = await fetch(`../scripts/buscaCPFCNPJ.php?tipoCPFCNPJ=${decodeURIComponent(tipoCPFCNPJ)}`);
                                const data = await response.json();
                                console.log(data);

                                if(data.mensagem) { //caso não tem nenhum cliente, vai retornar um json com a mensagem
                                       alert("Nenhum cliente encontrado");
                                        let inputs = document.getElementsByTagName(input);

                                        inputs.foreach(input => {
                                                input.value = "";
                                        });
                                } else {
                                        document.getElementById(cliente).value = data.nome;
                                        document.getElementById(email).value = data.email;
                                        document.getElementById(fone).value = data.fone
                                        document.getElementById(cep).value = data.cep;
                                        document.getElementById(cidade).value = data.cidade;
                                        document.getElementById(bairro).value = data.bairro;
                                        document.getElementById(rua).value = data.rua;
                                        document.getElementById(numero).value = data.numero_local;
                                        document.getElementById(uf).value = data.uf;
                                }

                                
                        } catch (error) {
                               console.error(error.menssage); 
                };
            };      
        };