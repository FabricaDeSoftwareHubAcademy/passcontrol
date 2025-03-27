document.addEventListener("DOMContentLoaded", function () {
    const dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario"));

    const servicoSelecionado = dadosUsuario ? dadosUsuario.servicoSelecionado : null;
    const tipoAtendimento = dadosUsuario ? dadosUsuario.prioridade : null;
    const nomeCompleto = dadosUsuario ? dadosUsuario.nomeCompleto : null;

    const nomeElemento = document.querySelector(".variable-text div:nth-child(2)");
    const senhaElemento = document.querySelector(".variable-text div:nth-child(1)");
    const servicoElemento = document.querySelector(".variable-text div:nth-child(3)");

    if (nomeCompleto) {
        nomeElemento.innerHTML = `<strong>NOME:</strong> ${nomeCompleto}`;
    }

    if (tipoAtendimento) {
        senhaElemento.innerHTML = `<strong>SENHA:</strong> ${tipoAtendimento}`;
    }

    if (servicoSelecionado) {
        servicoElemento.innerHTML = `<strong>SERVIÇO:</strong> ${servicoSelecionado}`;
    }
});