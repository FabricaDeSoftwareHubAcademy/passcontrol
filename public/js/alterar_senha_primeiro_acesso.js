
let btn_alterar_senha = document.getElementById("btn_alterar_senha");

btn_alterar_senha.addEventListener("click", async function(e) {

    e.preventDefault();

    let form_senha = document.querySelector("#formRecuperar");

    let formData = new FormData(form_senha);

    let dados_php = await fetch("../app/actions/alterar_senha.php", {
        method: "POST",
        body: formData
    })

    let response = await dados_php.json();
    
    console.log(response);
})