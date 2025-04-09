document.addEventListener("DOMContentLoaded", function () {
    const toggleLinks = document.querySelectorAll(".openInativarAtivar");
    const modalInativar = document.querySelector("#modalInativar");
    const modalAtivar = document.querySelector("#modalAtivar");
    const cancelarInativar = document.querySelector(".cancel-inativar");
    const cancelarAtivar = document.querySelector(".cancel-ativar");
    const confirmarInativacao = document.querySelector("#confirmarInativacao");
    const confirmarAtivacao = document.querySelector("#confirmarAtivacao");

    toggleLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();

            const idServico = link.getAttribute("data-id");
            const toggle = link.querySelector(".toggle-btn");

            if (!toggle) return;

            const isAtivo = toggle.classList.contains("active");

            if (isAtivo) {
                confirmarInativacao.setAttribute("data-id", idServico);
                modalInativar.classList.add("show");
            } else {
                confirmarAtivacao.setAttribute("data-id", idServico);
                modalAtivar.classList.add("show");
            }
        });
    });

    cancelarInativar?.addEventListener("click", () => {
        modalInativar.classList.remove("show");
        confirmarInativacao.removeAttribute("data-id");
    });

    cancelarAtivar?.addEventListener("click", () => {
        modalAtivar.classList.remove("show");
        confirmarAtivacao.removeAttribute("data-id");
    });

    confirmarInativacao?.addEventListener("click", () => {
        const id = confirmarInativacao.getAttribute("data-id");
        window.location.href = `../../../app/controller/ServicoController.php?id_servico=${id}&acao=inativar`;
    });

    confirmarAtivacao?.addEventListener("click", () => {
        const id = confirmarAtivacao.getAttribute("data-id");
        window.location.href = `../../../app/controller/ServicoController.php?id_servico=${id}&acao=ativar`;
    });
});
