document.addEventListener("DOMContentLoaded", function () {
    const comumLink = document.querySelector("a[href='../../../app/usuario/view/tela_autoatendimentoPage3.php']:first-child");
    
    const preferencialLink = document.querySelector("a[href='../../../app/usuario/view/tela_autoatendimentoPage3.php']:last-child");

    function atualizarPrioridade(prioridade) {
        let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};
        
        dadosUsuario.prioridade = prioridade;

        localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));
    }

    comumLink.addEventListener("click", () => {
        atualizarPrioridade("CM");
    });

    preferencialLink.addEventListener("click", () => {
        atualizarPrioridade("PR");
    });
});