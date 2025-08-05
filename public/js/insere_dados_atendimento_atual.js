document.addEventListener('DOMContentLoaded', function () {
    async function carregar_dados_atendimento(){
        try{
            const guicheSelected = sessionStorage.getItem("guicheSelected");
            
            document.getElementById("guiche-exibir").innerText = "Guichê: " + guicheSelected;
            if (guicheSelected === '' || guicheSelected === null){
                document.getElementById("guiche-exibir").innerText = "Nada Selecionado";
            }
            
            const dados_atendimento_atual = sessionStorage.getItem("atendimento_atual");
            const dados_atendimento_atual_obj = JSON.parse(dados_atendimento_atual);

            if(dados_atendimento_atual_obj != "" && dados_atendimento_atual_obj != null){
                document.getElementById("nome-atendido-atual").innerText = dados_atendimento_atual_obj.nome;
                document.getElementById("senha-atendido-atual").innerText = dados_atendimento_atual_obj.senha;
                document.getElementById("servico-atendido-atual").innerText = dados_atendimento_atual_obj.servico;
            }

        }catch{
            console.warn("Sem atendimento atual.");
            document.getElementById("guiche-exibir").innerText = "Erro ao carregar guichê";
        }
    }

    carregar_dados_atendimento();
});
