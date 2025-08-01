//VALIDA REQUERIMENTOS DA SENHA NO PRIMEIRO CAMPO DE INPUT

document.getElementById('nova_senha').addEventListener('input', function () {
    const nova_senha = this.value;

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
});