// OLHINHO QUE MOSTRA A SENHA -- PAROU DE FUNCIONAR
const togglePasswordNv = document.querySelector("#toggle_password_novo");
const passwordNv = document.querySelector("#nova_senha");

togglePasswordNv.addEventListener("click", function () {
    const type = passwordNv.type === "password" ? "text" : "password";

    passwordNv.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});

// OLHINHO QUE MOSTRA A SENHA -- PAROU DE FUNCIONAR
const togglePassword = document.querySelector("#toggle_password");
const password = document.querySelector("#confirmar_senha");

togglePassword.addEventListener("click", function () {
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});

