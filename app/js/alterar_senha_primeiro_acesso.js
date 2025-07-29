import modalConfirmacaoDados from './modal_confirmacao_dados.js';
let btn_nova_senha = document.getElementById("btn_nova_senha");

btn_nova_senha.addEventListener("click",  async function(e) {

    e.preventDefault();

    const url_id = new URLSearchParams(window.location.search);
    const id_user = url_id.get('id');
 

    let form_recuperar_senha = document.getElementById("form_recuperar_senha");

    console.log(form_recuperar_senha);

    let form_data = new FormData(form_recuperar_senha);

    console.log(form_data);

    let dados_php = await fetch('../actions/alterar_senha.php?id_user='+id_user,{
        method:"POST",
        body:form_data
    })

    document.querySelector(".fundo-modal-envio-email").classList.add("show");

    let response = await dados_php.json();

    if(response.status == 200){
        ///CHAMA O MODAL COM A MENSAGEM DE SUCESSO
        //redireciona para a página de atendimento
       modalConfirmacaoDados();


    }else{

        // MODAL DE ERROOO
    }
    
    //console.log(response);
})

