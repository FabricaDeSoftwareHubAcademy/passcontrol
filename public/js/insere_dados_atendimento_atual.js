document.addEventListener('DOMContentLoaded', function () {
    async function carregar_dados_atendimento(){
        const dados_atendimento_atual = sessionStorage.getItem("atendimento_atual");
        const dados_atendimento_atual_obj = JSON.parse(dados_atendimento_atual)
        
        // console.log(dados_atendimento_atual_obj);

        document.getElementById("nome-atendido-atual").innerText = dados_atendimento_atual_obj.nome;
        document.getElementById("senha-atendido-atual").innerText = dados_atendimento_atual_obj.senha;
        document.getElementById("servico-atendido-atual").innerText = dados_atendimento_atual_obj.servico;
    }


    carregar_dados_atendimento();
});
