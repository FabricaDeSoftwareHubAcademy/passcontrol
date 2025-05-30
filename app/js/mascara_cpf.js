document.addEventListener('DOMContentLoaded', () => {
    const cpfInput = document.getElementById('cpf');

    function aplicarMascara() {
        let value = cpfInput.value.replace(/\D/g, '');

        if (value.length > 11) value = value.slice(0, 11);

        if (value.length > 9) {
            value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
        } else if (value.length > 6) {
            value = value.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
        } else if (value.length > 3) {
            value = value.replace(/(\d{3})(\d{1,3})/, '$1.$2');
        }

        cpfInput.value = value;
    }

    cpfInput.addEventListener('input', aplicarMascara);
    cpfInput.addEventListener('change', aplicarMascara);
});
