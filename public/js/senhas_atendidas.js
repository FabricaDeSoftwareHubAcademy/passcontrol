document.addEventListener('DOMContentLoaded', async function(){

    const resposta_usuario = await fetch('../../app/actions/get_usuario_logado.php');
    const dados_usuario = await resposta_usuario.json();
    const id_usuario_logado = dados_usuario.id_usuario;

    async function senhasAtendidas(){
        
        const tabela = document.getElementById('lista-senhas-atendidas-no-dia')
        tabela.innerHTML='';
        const resposta = await fetch('../../app/actions/senhas_atendidas.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id_usuario=${id_usuario_logado}`
        });
        const json= await resposta.json();
        
        await json.forEach((elemento, sequencial)=>{
            sequencial== 0;
            const prioridade = elemento.prioridade_fila_senha === 0 ? 'CM' : 'PR'; 

            const senhaFormatada = prioridade + String(elemento.id_fila_senha).padStart(3, '0');
            tabela.innerHTML+=`<tr>
            <td>${sequencial+1}</td>
            <td>${elemento.nome_fila_senha}</td>
            <td>${elemento.nome_servico}</td>
            <td>${senhaFormatada}</td>
            <td>${elemento.fila_senha_chamada_in ? elemento.fila_senha_chamada_in : ''}</td>
            <td>${elemento.fila_senha_encerrada_in ? elemento.fila_senha_encerrada_in : ''}</td>
            <td>${prioridade }</td>
        </tr>`
        })
    }
    senhasAtendidas();
    
    const botao_proxima_senha = document.getElementById('chamar-proxima-senha')
    botao_proxima_senha.addEventListener('click',senhasAtendidas)

    const botao_encerrar = document.querySelector('.botao-encerrar-atendimento open-encerrar-atendimento')
    botao_encerrar.addEventListener('click',senhasAtendidas)

})