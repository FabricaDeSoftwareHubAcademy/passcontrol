document.addEventListener("DOMContentLoaded", async () => {

    async function carregar_senhas_monitor() {
        const dados_fila = await fetch("../actions/monitor_select.php");

        try {
            const resposta = await dados_fila.json();

            const senhas = resposta.senhas;

            // console.log(senhas); // DEBUG

            // PREENCHE SENHA PRINCIPAL
            document.getElementById("nome_senha_principal").innerHTML = senhas[0].nome_fila_senha;
            document.getElementById("senha_principal").innerText = senhas[0].senha_chamada;
            document.getElementById("guiche_senha_principal").innerText = senhas[0].nome_ponto_atendimento;
            document.getElementById("servico_senha_principal").innerText = senhas[0].nome_servico;

            // PREENCHE SENHAS JA CHAMADAS
            const ultimas_chamadas = senhas.slice(1);
            if (ultimas_chamadas.length > 0) {
                document.querySelector(".area-das-senhas").innerHTML = "";

                ultimas_chamadas.forEach((senha) => {
                    document.querySelector(".area-das-senhas").innerHTML += `
                    <div class="caixa-das-senhas">
                        <h2>${senha.nome_fila_senha}</h2>
                        <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA:</h3>
                                <h4>${senha.senha_chamada}</h4>
                            </div>
                            <br>
                            <div class="guiche">
                                <h3>GUICHÊ:</h3>
                                <h4>${senha.nome_ponto_atendimento}</h4>
                            </div>
                        </div>
                    </div>
                    `;
                });
            };
        } catch (erro) {
            console.log(erro);
        }
    }
    
    carregar_senhas_monitor();
    
    const socket = new WebSocket('ws://192.168.0.8:8080');

    socket.onmessage = event => {
        const data = JSON.parse(event.data);
        if (data.type === 'updateScreenB') {
            if(data.payload == 'chamar') {
                carregar_senhas_monitor();
            }
        }
    };

    // const res = await fetch('../../Env.php', {
    //     action: 'loadEnv("../../.env")'
    // });

    // try{
    //     const resposta = await res.json();
    
    //     console.log(resposta);

    // }catch(erro){
    //     console.warn(erro);
    // }
});