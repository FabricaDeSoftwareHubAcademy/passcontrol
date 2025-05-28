document.addEventListener("DOMContentLoaded", function () {
    const comumLink = document.querySelector("a[href='../../app/view/tela_autoatendimento_page3.php']:first-child"); // ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas )
    
    const preferencialLink = document.querySelector("a[href='../../app/view/tela_autoatendimento_page3.php']:last-child"); // ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas )

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