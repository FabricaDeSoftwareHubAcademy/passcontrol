export default function modalConfirmacaoDados() {
    const buttonAbrir_ConfDados = document.querySelector(".open-confirmacao-dados");
    const modalContainer_ConfDados = document.querySelector(".fundo-container-confirmacao-dados");
    const buttonFechar_ConfDados = document.querySelector(".Okay_ConfDados");
    const formRecuperarSenha = document.querySelector("#form_recuperar_senha");
    let btn_ok = document.querySelector(".Okay_ConfDados");


    function getIdFromURL() {
        const params = new URLSearchParams(window.location.search);
        return params.get("id_user"); // ou 'id_usuario', conforme estiver na URL
    }

    // Função para validar se as senhas coincidem
    function validarSenhas() {
        const novaSenha = document.querySelector("#nova_senha").value;
        const confirmarSenha = document.querySelector("#confirmar_senha").value;

        if (novaSenha === "" || confirmarSenha === "") {
            alert("Por favor, preencha todos os campos.");
            return false;
        }

        if (novaSenha !== confirmarSenha) {
            alert("As senhas não coincidem. Tente novamente.");
            return false;
        }

        return true;
    }

    // Abrir o modal após validação
    buttonAbrir_ConfDados.addEventListener("click", () => {
        if (validarSenhas()) {
            modalContainer_ConfDados.classList.add("show");

        }
    });

    // Fechar o modal e enviar os dados ao banco
    buttonFechar_ConfDados.addEventListener("click",async (e) => {
        e.preventDefault();
        
        
        let form_rec_senha = document.querySelector("#form_recuperar_senha");
        let formulario = new FormData(form_rec_senha);

        let idUsuario = getIdFromURL();
        let recuperar_senha = 1;

        // Adiciona ao formulário
        if (idUsuario) {
            formulario.append("id_user", idUsuario);
            formulario.append("recuperar_senha", recuperar_senha);
        }

        let dados_php = await fetch("../actions/alterar_senha.php", {
            method: "POST",
            body: formulario
        });

        let response = await dados_php.json();

        console.log("Resposta do PHP:", response);

        if (response.status === 200) {
            // Exibe o modal de confirmação
            modalContainer_ConfDados.classList.add("show");

            btn_ok.addEventListener("click", () => {
                modalContainer_ConfDados.classList.remove("show");
                window.location.href = "../../index.php";
            }, { once: true });
        } else {
            alert("Erro ao alterar a senha. Tente novamente.");
        }
    });
            
    //         btn_ok.addEventListener("click", () => {
    //             modalContainer_ConfDados.classList.remove("show");
    //             window.location.href = "../../index.php";
    //         });
    //     }


    // });
}