document.addEventListener('DOMContentLoaded', function(){
    async function buscarAtendimentos(){
        const tabela = document.querySelector('tbody')
        tabela.innerHTML='';
        const resposta = await fetch('../../app/actions/buscar_dados_atendimento.php')
        const json= await resposta.json();
        
        await json.forEach(elemento=>{
            let status;
            if (elemento.disponivel_ponto_atendimento == 1) { 
                status = 'Em Atendimento';
            } else if (elemento.disponivel_ponto_atendimento == 0) {
                status = 'Disponível';
            } else if (elemento.id_expediente != null) { 
                status = 'Intervalo';
            } else {
                status = '';
            }
            tabela.innerHTML+=`<tr>
                <td>${elemento.nome_usuario}</td>
                <td>${elemento.nome_perfil_usuario}</td>
                <td>${elemento.nome_servico?elemento.nome_servico:''}</td>
                <td>${elemento.identificador_ponto_atendimento?elemento.identificador_ponto_atendimento:''}</td>
                <td class="disponivel-atendimento-do-dia">${status}</td>
            </tr>`
        })
    }
    buscarAtendimentos();
    
    const botao = document.querySelector('.reloading_atendimento_do_dia')
    botao.addEventListener('click',buscarAtendimentos)
})