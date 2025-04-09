document.addEventListener('DOMContentLoaded', () => {
    const modalCadastro = document.querySelector('.modal-container');
    const modalConfirmacao = document.querySelector('#modalConfirmacao');
    const modalSucesso = document.querySelector('#modalSucesso');

    const btnAbrirCadastro = document.querySelector('#abrirModalCadastro');
    const btnSalvar = modalCadastro.querySelector('.save');
    const btnCancelarCadastro = modalCadastro.querySelector('.cancel');

    const btnNaoConfirmar = document.querySelector('#cancelarConfirmacao');
    const btnSimConfirmar = document.querySelector('#confirmarSalvar');
    const btnFecharSucesso = document.querySelector('#fecharSucesso');

    const tituloModal = modalCadastro.querySelector('.title');

    const abrirModal = (modal) => modal.style.display = 'flex';
    const fecharModal = (modal) => modal.style.display = 'none';

    btnAbrirCadastro.addEventListener('click', () => {
        limparFormulario();
        tituloModal.textContent = 'Cadastrar Serviços';
        btnSalvar.textContent = 'Salvar';
        abrirModal(modalCadastro);
    });

    btnCancelarCadastro.addEventListener('click', () => fecharModal(modalCadastro));

    btnSalvar.addEventListener('click', () => {
        abrirModal(modalConfirmacao);
    });

    btnNaoConfirmar.addEventListener('click', () => {
        fecharModal(modalConfirmacao);
    });

    btnSimConfirmar.addEventListener('click', () => {
        const formData = new FormData();
        const codigo = modalCadastro.querySelector('.input-number').value;
        const nome = modalCadastro.querySelector('.input-text').value;
        const file = modalCadastro.querySelector('#fileInput').files[0];
        const inputHidden = modalCadastro.querySelector('#id_servico');

        formData.append('codigo', codigo);
        formData.append('nome', nome);
        if (file) formData.append('icone', file);

        if (inputHidden) {
            formData.append('id', inputHidden.value);
            formData.append('acao', 'editar');
        } else {
            formData.append('acao', 'cadastrar');
        }

        fetch('../../../app/controller/ServicoController.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(response => {
            fecharModal(modalCadastro);
            fecharModal(modalConfirmacao);
            abrirModal(modalSucesso);
            setTimeout(() => location.reload(), 1000);
        });
    });

    btnFecharSucesso.addEventListener('click', () => fecharModal(modalSucesso));

    function limparFormulario() {
        modalCadastro.querySelector('.input-number').value = '';
        modalCadastro.querySelector('.input-text').value = '';
        modalCadastro.querySelector('#fileInput').value = '';
        const preview = modalCadastro.querySelector('.file-preview');
        preview.src = '';

        const inputHidden = modalCadastro.querySelector('#id_servico');
        if (inputHidden) {
            inputHidden.remove();
        }
    }
});

function abrirModalEdicao(elemento) {
    const modal = document.querySelector('.modal-container');
    const inputCodigo = modal.querySelector('.input-number');
    const inputNome = modal.querySelector('.input-text');
    const tituloModal = modal.querySelector('.title');
    const btnSalvar = modal.querySelector('.save');

    const id = elemento.dataset.id;
    const codigo = elemento.dataset.codigo;
    const nome = elemento.dataset.nome;

    inputCodigo.value = codigo;
    inputNome.value = nome;

    tituloModal.textContent = 'Editar Serviço';
    btnSalvar.textContent = 'Atualizar';

    let inputHidden = modal.querySelector('#id_servico');
    if (!inputHidden) {
        inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.id = 'id_servico';
        modal.querySelector('section.modal').appendChild(inputHidden);
    }
    inputHidden.value = id;

    modal.style.display = 'flex';
}
