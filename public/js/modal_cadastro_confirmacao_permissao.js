const btnAbrirModalCadastro = document.getElementById("abrirModalCadastroPermissao");
const modalContainer_CadPermissao = document.querySelector(".fundo-container-cad-ponto-atendimento");
const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
const buttonSalvar_CadPermissao = document.querySelector(".save_CadPontoAtend");
const apareceMod = document.getElementById("confirma_cadastrar"); // Modal confirmação (se houver)

// Abrir modal ao clicar no botão
btnAbrirModalCadastro.addEventListener("click", () => {
    modalContainer_CadPermissao.classList.add("show");
});

// Fechar modal ao clicar em "Voltar"
buttonCancelar_CadPontoAtend.addEventListener("click", (event) => {
    event.preventDefault();
    modalContainer_CadPermissao.classList.remove("show");
});

// Ao clicar em "Salvar"
buttonSalvar_CadPermissao.addEventListener("click", async (event) => {
    event.preventDefault();

    const myform = document.getElementById("formulario_cadastrar_permissao");
    const inputs = myform.querySelectorAll("input");
    let formularioValido = true;

    // Verificar se todos os campos têm valor preenchido
    inputs.forEach(inputAtual => {
        if (inputAtual.value.trim() === "") {
            formularioValido = false;
        }
    });

    if (!formularioValido) {
        alert("Preencha todos os campos para continuar!");
        return;
    }

    // Preparar dados para envio
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

            // Exibe modal de confirmação, se existir
            if (apareceMod) {
                apareceMod.classList.add("show");
            }

            // Cria novo checkbox da permissão cadastrada e insere na lista
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

            // Reseta formulário para novo cadastro
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

// Função toggle para menu mobile (preservada)
function toggleMenu() {
    document.getElementById("mobileMenu").classList.toggle("active");
}
