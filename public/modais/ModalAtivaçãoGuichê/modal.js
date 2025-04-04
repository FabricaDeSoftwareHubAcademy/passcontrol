

document.addEventListener("DOMContentLoaded", function () {
    const toggleLinks = document.querySelectorAll(".openInativarAtivar");
    const modalInativar = document.querySelector("#modalInativar");
    const cancelarBtn = document.querySelector(".cancel-atv-inatv");
    const confirmarInativacao = document.querySelector("#confirmarInativacao");

    if (toggleLinks.length === 0) {
        console.warn("❌ Nenhum botão .openInativarAtivar foi encontrado!");
        return;
    }

    console.log("🔍 Botões encontrados:", toggleLinks.length);

    toggleLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            console.log("✅ Clique detectado!");

            const idServico = link.getAttribute("data-id");
            confirmarInativacao.setAttribute("data-id", idServico);

            // Armazena o botão clicado para aplicar a classe depois
            confirmarInativacao.setAttribute("data-toggle-ref", link.dataset.id);

            // Exibe o modal
            modalInativar.classList.add("show");
        });
    });

    cancelarBtn.addEventListener("click", () => {
        modalInativar.classList.remove("show");
        confirmarInativacao.removeAttribute("data-id");
        confirmarInativacao.removeAttribute("data-toggle-ref");
        console.log("❌ Modal cancelado.");
    });

    confirmarInativacao.addEventListener("click", () => {
        const idServico = confirmarInativacao.getAttribute("data-id");
        const toggleId = confirmarInativacao.getAttribute("data-toggle-ref");

        if (!idServico || !toggleId) {
            console.warn("⚠️ Dados incompletos.");
            return;
        }

        // Agora sim: aplica a classe active ao toggle
        const toggleItem = document.querySelector(`.toggle-btn[data-id='${toggleId}']`);
        if (toggleItem) {
            toggleItem.classList.toggle("active"); // Alterna visualmente (opcional)
        }

        // Redireciona para o backend
        window.location.href = `../../modal/atualizar_servico.php?id_servico=${idServico}`;
    });
});

