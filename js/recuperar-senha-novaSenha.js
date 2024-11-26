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