
document.addEventListener('DOMContentLoaded', function(){
    async function buscarAtendimentos(){
        const tabela = document.querySelector('tbody')
        tabela.innerHTML='';
        const resposta = await fetch('../../app/actions/buscar_dados_atendimento.php')
        const json= await resposta.json();
        
        await json.forEach(elemento=>{
            tabela.innerHTML+=`<tr>
            <td>${elemento.nome_perfil_usuario}</td>
            <td>${elemento.id_usuario_atendente}</td>
            <td>${elemento.nome_servico}</td>
            <td>${elemento.identificador_ponto_atendimento}</td>
            <td class="disponivel-atendimento-do-dia">${elemento.status_fila_senha}</td>
        </tr>`
        })
    }
    
    const botao = document.querySelector('.reloading_atendimento_do_dia')
    botao.addEventListener('click',buscarAtendimentos)

})

// fazer com o tbody da tabela
