try{
let btn_cadastrar_guiche = document.getElementById("btn_cadastrar_adm");
const apareceMod = document.getElementById("confirma");

const modalContainer_CadPontoAtend = document.querySelector(".fundo-container-cad-ponto-atendimento");
// const buttonFechar_CadPontoAtend = document.querySelector(".close_CadPontoAtend");
const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
const buttonSalvar_CadPontoAtend = document.querySelector(".save_CadPontoAtend");

//Abrir Modal
btn_cadastrar_guiche.addEventListener("click", () => {

    modalContainer_CadPontoAtend.classList.add("show");

    //Fechar Modal
    buttonCancelar_CadPontoAtend.addEventListener("click", (event) => {
        event.preventDefault();
        modalContainer_CadPontoAtend.classList.remove("show");
    });

    //Salvar Formulário
    buttonSalvar_CadPontoAtend.addEventListener("click", function (event) {
        event.preventDefault();

        const myform = document.getElementById("formulario");
        const inputs = myform.querySelectorAll("input");
        let formularioValido = true;

        // Verifica se todos os campos estão preenchidos
        inputs.forEach(inputAtual => {

            if (inputAtual.value.trim() === "") { //trim para não aceitar espaço
                formularioValido = false;
            }
        });

        if (!formularioValido) {
            alert("Preencha todos os campos para continuar!");
            return;
        }

        modalContainer_CadPontoAtend.classList.remove("show");
        apareceMod.classList.add("show");

        //Envia para o PHP
        const formData = new FormData(myform);



        let btnOkCadastrar = document.getElementById("btnOkCadastrar");

        btnOkCadastrar.addEventListener("click", async function () {
            const myform = document.getElementById("formulario");
            const formData = new FormData(myform);


            /* let dados2_php = await fetch("../actions/ponto_atendimento_cadastrar.php", {
                method: 'POST',
                body: formData
            });
    
            let response = await dados2_php.json();
    
            if (response.status == 'ok') {
                window.location.href = "./ponto_atendimento.php";
            } */

            let dados2_php = await fetch("../actions/ponto_atendimento_cadastrar.php", {
                method: 'POST',
                body: formData
            });

            let text = await dados2_php.text();
            console.log(text); // Retorno do PHP te

            try {
                let response = JSON.parse(text);
                if (response.status == 'ok') {
                    window.location.href = "./ponto_atendimento.php";
                } else {
                    alert("Erro: " + response.mensagem);
                }
            } catch (e) {
                console.error("Resposta JSON inválida", e);
                alert("Erro na resposta do servidor.")
            }
        });
    });


    // function toggleMenu() {
    //     document.getElementById("mobileMenu").classList.toggle("active");
    // }
});
}catch{
    location.reload;
}