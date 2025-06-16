const btnAbrirModalCadastro = document.getElementById("abrirModalCadastroPermissao");
const modalContainer_CadPermissao = document.querySelector(".fundo-container-cad-ponto-atendimento");
const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
const buttonSalvar_CadPermissao = document.querySelector(".save_CadPontoAtend");
const apareceMod = document.getElementById("confirma_cadastrar"); // Seu modal de confirmação, se houver

// Abrir Modal
btnAbrirModalCadastro.addEventListener("click", () => {
    modalContainer_CadPermissao.classList.add("show");
});

// Fechar Modal
buttonCancelar_CadPontoAtend.addEventListener("click", (event) => {
    event.preventDefault();
    modalContainer_CadPermissao.classList.remove("show");
});

// Salvar Formulário
buttonSalvar_CadPermissao.addEventListener("click", async function (event) {
    event.preventDefault();

    const myform = document.getElementById("formulario_cadastrar_permissao");
    const inputs = myform.querySelectorAll("input");
    let formularioValido = true;

    // Verifica se todos os campos estão preenchidos
    inputs.forEach(inputAtual => {
        if (inputAtual.value.trim() === "") {
            formularioValido = false;
        }
    });

    if (!formularioValido) {
        alert("Preencha todos os campos para continuar!");
        return;
    }

    // Enviar dados via fetch
    const formData = new FormData(myform);

    try {
        const responseFetch = await fetch("../../app/actions/permissao_cadastrar.php", {
            method: 'POST',
            body: formData
        });

        const response = await responseFetch.json();

        if (response.status === 'ok') {
            // Fecha modal cadastro
            modalContainer_CadPermissao.classList.remove("show");

            // Exibe modal confirmação, se existir
            if (apareceMod) {
                apareceMod.classList.add("show");
            }

            // Adiciona o novo checkbox na lista de permissões
            const newLabel = document.createElement('label');
            newLabel.className = 'customizado';

            const newCheckbox = document.createElement('input');
            newCheckbox.type = 'checkbox';
            newCheckbox.className = 'item';
            newCheckbox.name = 'permissoes_selecionadas[]';
            newCheckbox.value = response.id;

            const newSpan = document.createElement('span');
            newSpan.className = 'teste';

            const textNode = document.createTextNode(' ' + response.nome);

            newLabel.appendChild(newCheckbox);
            newLabel.appendChild(newSpan);
            newLabel.appendChild(textNode);

            const container = document.querySelector('.checkbox-container .column-1');
            const selectAllLabel = container.querySelector('label:last-child');
            container.insertBefore(newLabel, selectAllLabel);

           
            myform.reset();

            alert('Permissão cadastrada com sucesso!');
        } else {
            alert("Erro ao cadastrar: " + (response.message || "Erro desconhecido"));
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro de conexão com o servidor.");
    }
});

function toggleMenu() {
    document.getElementById("mobileMenu").classList.toggle("active");
}
