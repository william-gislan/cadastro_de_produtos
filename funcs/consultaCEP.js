 async function preencheEndereco(cep, rua, cidade, bairro, uf){
            var cep = document.getElementById(cep).value; 
            let url = `https://viacep.com.br/ws/${cep}/json/`;

            const dados = await fetch(url);
            const endereco = await dados.json();
             

            document.getElementById(rua).value = endereco.logradouro;
            document.getElementById(cidade ).value = endereco.localidade;
            document.getElementById(bairro).value = endereco.bairro;
            document.getElementById(uf).value = endereco.uf;
        };

