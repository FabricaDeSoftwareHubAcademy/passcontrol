const modal_monitor = document.getElementById("modalMonitor");
const openModalMonitorBtn = document.getElementById("openMonitorModal");
var openModalMonitorBtnGestao = document.getElementById("visualisarMonitor");
const botaofecharmonitor = document.getElementById("fecharMonitor");

function carregarSenhasModal() {
    fetch('../../app/actions/monitor_modal_select.php')
        .then(res => res.json())
        .then(data => {
            // Principal
            if (data.principal) {
                document.querySelector('.caixa-senha-principal .nome-pessoa h1').textContent = data.principal.nome_fila_senha;
                const infos = document.querySelector('.infos-detalhes-direita');
                infos.children[0].textContent = data.principal.servico;
                infos.children[1].textContent = data.principal.senha_chamada;
                infos.children[2].textContent = data.principal.nome_ponto_atendimento;
            }

            // Últimas chamadas
            const ultimasDiv = document.querySelector('.area-das-senhas');
            ultimasDiv.innerHTML = '';
            if (data.ultimas && data.ultimas.length > 0) {
                data.ultimas.forEach(s => {
                    const div = document.createElement('div');
                    div.classList.add('caixa-das-senhas');
                    div.innerHTML = `<h2>${s.nome_fila_senha}</h2>
                        <div class="conjunto-senhas">
                            <div class="senha"><h3>SENHA</h3><h4>${s.senha_chamada}</h4></div>
                            <div class="guiche"><h5>GUICHÊ</h5><h6>${s.nome_ponto_atendimento}</h6></div>
                        </div>`;
                    ultimasDiv.appendChild(div);
                });
            } else {
                ultimasDiv.innerHTML = '<div class="caixa-das-senhas"><h2>SEM INFORMAÇÕES</h2></div>';
            }
        })
        .catch(err => console.error(err));
}

openModalMonitorBtn.onclick = function() {
    modal_monitor.classList.add("visualizar");
    carregarSenhasModal();
}

try {
    openModalMonitorBtnGestao.onclick = function() {
        modal_monitor.classList.add("visualizar");
        carregarSenhasModal();
    }
} catch {
    openModalMonitorBtnGestao = null;
}

botaofecharmonitor.onclick = function() {
    modal_monitor.classList.remove("visualizar");
}

window.onclick = function(event) {
    if (event.target === modal_monitor) {
        modal_monitor.classList.remove("visualizar");
    }
}
