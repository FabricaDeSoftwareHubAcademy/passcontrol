document.addEventListener("DOMContentLoaded", () => {
    const modalContainer = document.querySelector(".fundo-editar-ponto-atendimento");
    const buttonFechar = document.querySelector(".close");
    const buttonCancelar = document.querySelector(".cancel_EdicaoPontoAtendimento");
    const buttonSalvar = document.querySelector(".save_EdicaoPontoAtendimento");
    const apareceMod = document.getElementById("confirma_editar");

    // Abre o modal e carrega os dados do servidor
    async function abrirModalEditar(id_value) {
        console.log(id_value)
        try {
            let response = await fetch(`../actions/ponto_atendimento_editar.php?id_ponto_atendimento=${id_value}`, {
                method: 'GET'
            });

            let text = await response.text();
            console.log("Resposta do PHP:", text);

            /* let data = await response.json(); */
            let data = JSON.parse(text); // Retorna o erro se o JSON não for válido

            document.getElementById("nome_ponto_atendimento").value = data.nome_ponto_atendimento || "";
            document.getElementById("identificador_ponto_atendimento").value = data.identificador_ponto_atendimento || "";
            document.getElementById("id_ponto_atendimento").value = data.id_ponto_atendimento || "";

            modalContainer.classList.add("show");
        } catch (error) {
            alert("Erro ao carregar os dados.");
            console.error(error);
        }
    }

    // Adiciona o evento para abrir o modal em todos os botões
    document.querySelectorAll(".bot-editar").forEach(button => {
        button.addEventListener("click", event => {
            event.preventDefault();
            const id_value = button.getAttribute("data-id");
            abrirModalEditar(id_value);
        });
    });

    // Fechar modal (botão fechar e cancelar)
    /* buttonFechar.addEventListener("click", () => modalContainer.classList.remove("show"));
    buttonCancelar.addEventListener("click", () => modalContainer.classList.remove("show")); */

    // Salvar formulário
    buttonSalvar.addEventListener("click", async (event) => {
        event.preventDefault();

        const myform = document.getElementById("formulario_editar");
        const formData = new FormData(myform);

        try {
            let response = await fetch("../actions/ponto_atendimento_cadastrar.php", {
                method: 'POST',
                body: formData
            });

            let data = await response.json();

            if (data.status === 'ok') {
                modalContainer.classList.remove("show");
                apareceMod.classList.add("show");
            } else {
                alert("Erro: " + (data.mensagem || "Erro ao salvar"));
            }
        } catch (error) {
            alert("Erro na requisição.");
            console.error(error);
        }
    });

    // Botão Ok da confirmação
    const buttonOkEditar = document.getElementById("btnOkEditar");
    buttonOkEditar.addEventListener("click", () => {
        apareceMod.classList.remove("show");
        location.reload(); // ou redirecione para a página desejada
    });
});
