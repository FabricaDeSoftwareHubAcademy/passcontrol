document.addEventListener("DOMContentLoaded", function () {
    const botoes = document.querySelectorAll(".box");

    botoes.forEach(botao => {
        botao.addEventListener("click", function (e) {
            e.preventDefault();

            const prioridade = parseInt(botao.dataset.prioridade);
            let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};

            dadosUsuario.prioridade = prioridade;
            localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));

            window.location.href = "../../app/view/tela_autoatendimento_page3.php";
        });
    });
});