const togglePassword = document.querySelector("#toggle_password");
const password = document.querySelector("#input_password");
const btn_login = document.querySelector("#btn_login");
const msg = document.querySelector("#login_msg");

togglePassword.addEventListener("click", function () {
    const type = password.type === "password" ? "text" : "password";
    password.type = type;
    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});

btn_login.addEventListener("click", async function (event) {
    event.preventDefault();
    msg.style.display = "none"; // esconde mensagem antes

    const cpf = document.querySelector("#cpf").value.trim();
    const senha = document.querySelector("#input_password").value.trim();

    if (!cpf || !senha) {
        msg.textContent = "Por favor, preencha todos os campos.";
        msg.style.display = "block";
        return; // não envia se algum campo estiver vazio
    }

    let form_login = document.querySelector("#form_login");
    let formData = new FormData(form_login);

    let dados_php = await fetch("./app/actions/usuario_logar.php", {
        method: "POST",
        body: formData
    });

    let response = await dados_php.json();

    console.log(response);

    if (response.code == 200 && response.redirect) {
        sessionStorage.setItem('usuario', response.usuario)
        // redireciona para a URL retornada pelo PHP conforme perfil (menuadm_fluxo, menusup_fluxo, menuatend_fluxo)
        window.location.href = response.redirect;
    } 
    else if (response.code == 201) {
        // redireciona para redefinição de senha no primeiro acesso
        window.location.href = "./app/view/recuperar_senha_nova_senha.php?id=" + response.usuario.id;
    } 
    else if (response.code == 400) {
        msg.textContent = "Senha incorreta. Tente novamente.";
        msg.style.display = "block";
    } 
    else if (response.code == 403) {
        msg.textContent = "Usuário inativo. Entre em contato com o administrador.";
        msg.style.display = "block";
    } 
    else if (response.code == 404) {
        msg.textContent = "Usuário não cadastrado. Verifique o CPF informado.";
        msg.style.display = "block";
    }

    console.log(response);
});

// Esconde a mensagem de erro ao começar a digitar novamente
document.querySelector("#cpf").addEventListener("input", () => {
    msg.style.display = "none";
});

document.querySelector("#input_password").addEventListener("input", () => {
    msg.style.display = "none";
});
