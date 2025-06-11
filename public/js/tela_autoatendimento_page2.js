document.addEventListener("DOMContentLoaded", function () {
    const comumLink = document.querySelector("a[href='../../app/view/tela_autoatendimento_page3.php']:first-child");
    const preferencialLink = document.querySelector("a[href='../../app/view/tela_autoatendimento_page3.php']:last-child");

    //pode trocar os valores conforme desejar
    const mapaPrioridade = {
        CM: 0, // Comum = 0
        PR: 1  // Preferencial = 1
    };

    function atualizarPrioridade(tipo) {
        let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};

        dadosUsuario.prioridade = mapaPrioridade[tipo];

        localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));
    }

    comumLink.addEventListener("click", () => {
        atualizarPrioridade("CM");
    });

    preferencialLink.addEventListener("click", () => {
        atualizarPrioridade("PR");
    });
});