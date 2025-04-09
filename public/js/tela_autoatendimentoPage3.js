document.addEventListener("DOMContentLoaded", function () {
    const confirmarBtn = document.getElementById("confirmarBtn");

    confirmarBtn.addEventListener("click", function (event) {
        event.preventDefault();

        const nome = document.getElementById("nome").value;
        const sobrenome = document.getElementById("sobrenome").value;

        if (nome && sobrenome) {
            const nomeCompleto = nome + " " + sobrenome;

            let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};

            dadosUsuario.nomeCompleto = nomeCompleto;

            localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));

            window.location.href = "../../usuario/view/tela_autoatendimentoPage4.php";
        } else {
            alert("Por favor, preencha o nome e sobrenome.");
        }
    });
});