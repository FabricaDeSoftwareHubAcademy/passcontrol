const togglePassword = document.querySelector("#toggle_password");
const password = document.querySelector("#input_password");

togglePassword.addEventListener("click", function(){
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});


let btn_login = document.querySelector("#btn_login");

btn_login.addEventListener("click", async function(e) {

    e.preventDefault();

    let form_login = document.querySelector("#form_login");

    let formData = new FormData(form_login);

    let dados_php = await fetch("./app/actions/usuario_logar.php", {
        method: "POST",
        body: formData
    })

    let response = await dados_php.json();

    if (response.code == 201) {
        console.log("CHAMANDO O MODAL DE PRIMEIRO ACESSO");
    }
    else if (response.code == 200) {
        //redireciona para a página de atendimento
        window.location.href = "./app/view/atendimento.php";
    }else{
        //redireciona para o index
        window.location.href = "./app/view/atendimento.php";

    }

})
