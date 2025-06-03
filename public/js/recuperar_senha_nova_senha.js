function validarSenha(novaSenha) {
    const liDigito = document.getElementById('digito');
    const liMaiuscula = document.getElementById('maiusca');
    const liNumero = document.getElementById('numero');
    const liCaracEspec = document.getElementById('caracEspec');

    if (novaSenha.length >= 8) {
        liDigito.classList.add('requisitosValidos');
    } else {
        liDigito.classList.remove('requisitosValidos');
        liDigito.classList.add('requisitosInvalidos');
    }

    if (/[A-Z]/.test(novaSenha)) {
        liMaiuscula.classList.add('requisitosValidos');
    } else {
        liMaiuscula.classList.remove('requisitosValidos');
        liMaiuscula.classList.add('requisitosInvalidos');
    }

    if (/[0-9]/.test(novaSenha)) {
        liNumero.classList.add('requisitosValidos');
    } else {
        liNumero.classList.remove('requisitosValidos');
        liNumero.classList.add('requisitosInvalidos');
    }

    if (/[!@#$%^&*(),.?":{}|<>]/.test(novaSenha)) {
        liCaracEspec.classList.add('requisitosValidos');
    } else {
        liCaracEspec.classList.remove('requisitosValidos');
        liCaracEspec.classList.add('requisitosInvalidos');
    }
}

document.getElementById('novaSenha').addEventListener('input', function() {
    validarSenha(this.value);
});



const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#confirmSenha");

togglePassword.addEventListener("click", function(){
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});



const togglePasswordNv = document.querySelector("#togglePasswordNv");
const passwordNv = document.querySelector("#novaSenha");

togglePasswordNv.addEventListener("click", function(){
    const type = passwordNv.type === "password" ? "text" : "password";

    passwordNv.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});



function validarConfSenha() {
    const senha = document.getElementById("novaSenha").value.trim();
    const confSenha = document.getElementById("confirmSenha").value.trim();

    if (senha === "" || confSenha === "") {
        alert("Preencha todos os campos");
        return false;
    } else if (senha !== confSenha) {
        alert("Senha e Confirmar Senha não conferem!");
        return false;
    }
    window.location.replace('../../index.php');
    return false;  
}
