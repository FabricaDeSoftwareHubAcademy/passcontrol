document.addEventListener("DOMContentLoaded", function () {
    const dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};
    let ultimaSenha = localStorage.getItem("ultimaSenha");

    let novaSenha = ultimaSenha ? parseInt(ultimaSenha) + 1 : 1;

    let senhaFormatada = String(novaSenha).padStart(3, "0");

    localStorage.setItem("ultimaSenha", novaSenha);

    dadosUsuario.senha = senhaFormatada;
    localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));

    const servicoSelecionado = dadosUsuario.servicoSelecionado || "Não selecionado";
    const tipoAtendimento = dadosUsuario.prioridade || "Não selecionado";
    let nomeCompleto = dadosUsuario.nomeCompleto || "Não selecionado";

    function formatarNome(nome) {
        return nome
            .toLowerCase()
            .split(" ")
            .map(palavra => palavra.charAt(0).toUpperCase() + palavra.slice(1))
            .join(" ");
    }

    nomeCompleto = formatarNome(nomeCompleto);

    const nomeElemento = document.querySelector(".variable-text div:nth-child(2)");
    const senhaElemento = document.querySelector(".variable-text div:nth-child(1)");
    const servicoElemento = document.querySelector(".variable-text div:nth-child(3)");

    nomeElemento.innerHTML = `<strong>NOME:</strong> ${nomeCompleto}`;
    senhaElemento.innerHTML = `<strong>SENHA:</strong> ${tipoAtendimento} ${senhaFormatada}`;
    servicoElemento.innerHTML = `<strong>SERVIÇO:</strong> ${servicoSelecionado}`;
});