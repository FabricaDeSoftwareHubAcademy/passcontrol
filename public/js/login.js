const togglePassword = document.querySelector("#toggle_password");
const password = document.querySelector("#input_password");
const btn_login = document.querySelector("#btn_login");
const msg = document.querySelector("#login_msg");

togglePassword.addEventListener("click", function(){
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});

btn_login.addEventListener("click", async function(event) {
    event.preventDefault();

    msg.style.display = "none";  // esconde mensagem antes

    let form_login = document.querySelector("#form_login");
    let formData = new FormData(form_login);

    let dados_php = await fetch("./app/actions/usuario_logar.php", {
        method: "POST",
        body: formData
    });

    let response = await dados_php.json();

    if(response.code == 200) {
            //redireciona para a página de atendimento
            window.location.href = "./app/view/atendimento.php";
    }

    else if (response.code == 201) {
        // console.log("CHAMANDO O MODAL DE PRIMEIRO ACESSO");
        // console.log(response.id_usuario);
        window.location.href = "./app/view/recuperar_senha_nova_senha.php?id=" + response.id_usuario;
    }  
    
    else if (response.code == 400) {
        msg.textContent = "Senha incorreta. Tente novamente.";
        msg.style.display = "block";
    } 
    
    else if (response.code == 404) {
        msg.textContent = "Usuário não cadastrado. Verifique o CPF informado.";
        msg.style.display = "block";
    }

    console.log(response);
});
     