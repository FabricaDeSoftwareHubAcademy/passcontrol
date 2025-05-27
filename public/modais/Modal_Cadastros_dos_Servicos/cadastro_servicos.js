document.addEventListener('DOMContentLoaded', () => {
    const modalCadastro = document.querySelector('.modal-container');
    const modalConfirmacao = document.querySelector('#modalConfirmacao');
    const modalSucesso = document.querySelector('#modalSucesso');
    const modalEditar = document.querySelector('#modalEditar');

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
        btnSalvar.disabled = true;
        abrirModal(modalConfirmacao);
    });

    btnNaoConfirmar.addEventListener('click', () => {
        fecharModal(modalConfirmacao);
        btnSalvar.disabled = false;
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
            // setTimeout(() => location.reload(), 1000);
        })
        .catch(error => {
            console.error('Erro ao salvar o serviço:', error);
            btnSalvar.disabled = false;
        });
    });

    btnFecharSucesso.addEventListener('click', () => fecharModal(modalSucesso));

    function limparFormulario() {
        modalCadastro.querySelector('.input-number').value = '';
        modalCadastro.querySelector('.input-text').value = '';
        modalCadastro.querySelector('#fileInput').value = '';
        const preview = modalCadastro.querySelector('.file-preview');
        preview.src = '';
        preview.style.display = 'none';

        const inputHidden = modalCadastro.querySelector('#id_servico');
        if (inputHidden) {
            inputHidden.remove();
        }
    }

    document.querySelectorAll('.openEditarServ').forEach(button => {
        button.addEventListener('click', (event) => {
            abrirModalEdicao(event.currentTarget);
        });
    });

    function abrirModalEdicao(elemento) {
        const inputCodigo = modalEditar.querySelector('.input-number');
        const inputNome = modalEditar.querySelector('.input-text');
        const tituloModal = modalEditar.querySelector('.title');
        const btnSalvar = modalEditar.querySelector('.save');

        const id = elemento.dataset.id;
        const codigo = elemento.dataset.codigo;
        const nome = elemento.dataset.nome;

        inputCodigo.value = codigo;
        inputNome.value = nome;

        tituloModal.textContent = 'Editar Serviço';
        btnSalvar.textContent = 'Atualizar';

        let inputHidden = modalEditar.querySelector('#edit-id');
        if (!inputHidden) {
            inputHidden = document.createElement('input');
            inputHidden.type = 'hidden';
            inputHidden.id = 'edit-id';
            modalEditar.querySelector('section.modal').appendChild(inputHidden);
        }
        inputHidden.value = id;

        modalEditar.style.display = 'flex';
    }

    modalEditar.querySelector('.save').addEventListener('click', () => {
        const formData = new FormData();
        const codigo = modalEditar.querySelector('.input-number').value;
        const nome = modalEditar.querySelector('.input-text').value;
        const file = modalEditar.querySelector('#fileInput').files[0];
        const id = modalEditar.querySelector('#edit-id').value;

        formData.append('codigo', codigo);
        formData.append('nome', nome);
        if (file) formData.append('icone', file);
        formData.append('id', id);
        formData.append('acao', 'editar');

        const btnSalvarEditar = modalEditar.querySelector('.save');
        btnSalvarEditar.disabled = true;

        fetch('../../../app/actions/ServicoController.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(response => {
            fecharModal(modalEditar);
            // setTimeout(() => location.reload(), 1000);
        })
        .catch(error => {
            console.error('Erro ao editar o serviço:', error);
            btnSalvarEditar.disabled = false;
        });
    });
});