// Função para mudar o foco automaticamente ao digitar ou apagar
function mudaFoco(campo, max, destino) {
    if (campo.value.length == max && destino) {
        destino.focus();
    } else if (campo.value.length == 0) {
        const campos = document.querySelectorAll('.input');
        const index = Array.from(campos).indexOf(campo);
        if (index > 0) {
            campos[index - 1].focus();
        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#form_codigo");
    const btn = document.querySelector("#btn_enviar");
    const msg = document.querySelector("#codigo_msg");

    const inputs = [
        document.querySelector("#input_1"),
        document.querySelector("#input_2"),
        document.querySelector("#input_3"),
        document.querySelector("#input_4"),
        document.querySelector("#input_5")
    ];

    // Impede envio se houver campos vazios
    form.addEventListener("submit", (event) => {
        let camposPreenchidos = inputs.every(input => input.value.trim() !== "");

        if (!camposPreenchidos) {
            event.preventDefault();
            msg.textContent = "Por favor, preencha todos os campos.";
            msg.style.display = "block";
        }
    });

    // Oculta a mensagem de erro ao digitar
    inputs.forEach(input => {
        input.addEventListener("input", (e) => {
            msg.style.display = "none";

            // Aceita apenas números
            e.target.value = e.target.value.replace(/\D/g, "");
        });
    });
});