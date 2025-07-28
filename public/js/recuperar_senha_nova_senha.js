
function validarSenha(nova_senha) {
    const liDigito = document.getElementById('digito');
    const liMaiuscula = document.getElementById('maiuscula');
    const liNumero = document.getElementById('numero');
    const liCaractereEspecial = document.getElementById('caractere_especial');

    if (nova_senha.length >= 8) {
        liDigito.classList.add('requisitos_validos');
    } else {
        liDigito.classList.remove('requisitos_validos');
        liDigito.classList.add('requisitos_invalidos');
    }

    if (/[A-Z]/.test(nova_senha)) {
        liMaiuscula.classList.add('requisitos_validos');
    } else {
        liMaiuscula.classList.remove('requisitos_validos');
        liMaiuscula.classList.add('requisitos_invalidos');
    }

    if (/[0-9]/.test(nova_senha)) {
        liNumero.classList.add('requisitos_validos');
    } else {
        liNumero.classList.remove('requisitos_validos');
        liNumero.classList.add('requisitos_invalidos');
    }

    if (/[!@#$%^&*(),.?":{}|<>]/.test(nova_senha)) {
        liCaractereEspecial.classList.add('requisitos_validos');
    } else {
        liCaractereEspecial.classList.remove('requisitos_validos');
        liCaractereEspecial.classList.add('requisitos_invalidos');
    }
}

document.getElementById('nova_senha').addEventListener('input', function() {
    validarSenha(this.value);
});

const togglePassword = document.querySelector("#toggle_password");
const password = document.querySelector("#confirmar_senha");

togglePassword.addEventListener("click", function(){
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});



const togglePasswordNv = document.querySelector("#toggle_password_novo");
const passwordNv = document.querySelector("#nova_senha");

togglePasswordNv.addEventListener("click", function(){
    const type = passwordNv.type === "password" ? "text" : "password";

    passwordNv.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});



function validarConfirmacaoSenha() {
    const senha = document.getElementById("nova_senha").value.trim();
    const confSenha = document.getElementById("confirmar_senha").value.trim();

    if (senha === "" || confSenha === "") {
        alert("Preencha todos os campos");
        return false;
    } else if (senha !== confSenha) {
        alert("Senha e Confirmar Senha não conferem!");
        return false;
    }

    document.querySelector(".fundo-container-confirmacao-dados").classList.add("show");

    return false;
}

const form = document.getElementById("form_recuperar_senha");
const salvarBtn = document.getElementById("btn_nova_senha");
// const modalContainer = document.querySelector(".fundo-container-confirmacao-dados");
const botaoFecharModal = document.querySelector(".Okay_ConfDados");

// Função para verificar se todos os requisitos foram atingidos
function senhaAtendeTodosRequisitos(senha) {
    return (
        senha.length >= 8 &&
        /[A-Z]/.test(senha) &&
        /[0-9]/.test(senha) &&
        /[!@#$%^&*(),.?":{}|<>]/.test(senha)
    );
}

// Ao clicar no botão "Salvar"
salvarBtn.addEventListener("click", () => {
    const senha = document.getElementById("nova_senha").value.trim();
    const confSenha = document.getElementById("confirmar_senha").value.trim();

    if (!senha || !confSenha) {
        alert("Preencha todos os campos.");
        return;
    }

    if (senha !== confSenha) {
        alert("Senha e Confirmar Senha não conferem!");
        return;
    }

    if (!senhaAtendeTodosRequisitos(senha)) {
        alert("A senha não atende todos os requisitos.");
        return;
    }

    // Senha válida → exibir modal
    document.querySelector(".fundo-container-confirmacao-dados").classList.add("show");

    // Ao clicar no botão OK do modal
    botaoFecharModal.addEventListener("click", () => {
        document.querySelector(".fundo-container-confirmacao-dados").classList.remove("show");
        form.submit(); 
        location.href = "../../index.php";
    });
});



