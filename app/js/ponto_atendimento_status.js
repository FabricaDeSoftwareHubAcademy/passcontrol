
document.addEventListener("DOMContentLoaded", () => {
  // btn switch de status
  const botao_alterar_status_PA = document.querySelectorAll(".switch_status");
  // modal alt status
  const modal_alterar_status_PA = document.querySelector(".fundo_AltStatusUsu");
  const botao_cancelar_switch_PA = document.querySelector(".cancel-atv-inatv");
  const botao_confirmar_switch_PA = document.querySelector(".save-atv-inatv");
  const modal_sucesso_PA = document.querySelector(".fundo-container-confirmacao-dados");
  const botao_ok_PA = document.querySelector(".Okay_ConfDados");
  
  botao_alterar_status_PA.forEach((button) => {
    button.addEventListener("click", () => {
      let id = button.getAttribute("id_value_switch");

      modal_alterar_status_PA.classList.add("show");
      
      botao_cancelar_switch_PA.addEventListener("click", () => {
        modal_alterar_status_PA.classList.remove("show");
        if (id !== null && id !== "") {
          id = null;
        }
        botao_cancelar_switch_PA.removeEventListener("click", ()=>{});
      });

      botao_confirmar_switch_PA.addEventListener("click", async function () {
        try {
          let response = await fetch(
            "../actions/ponto_atendimento_alterar_status.php?id_ponto_atendimento= " + id,
            {
              method: "GET",
            }
          );

          let resultado = await response.json();

          if (resultado.status == "OK") {
            modal_alterar_status_PA.classList.remove("show");
            modal_sucesso_PA.classList.add("show");

          } else {
            // modal_alterar_status_PA.classList.remove("show");
            // document.querySelector(".modal-title-confirmacao-dados").innerHTML ="Aviso";
            // document.querySelector(".modal-message-confirmacao-dados").innerHTML = "Status do ponto de atendimento não alterado!";
            // modal_sucesso_PA.classList.add("show");
            console.log(resultado);
          }

          botao_ok_PA.addEventListener("click", () => {
            modal_alterar_status_PA.classList.remove("show");
            location.reload();
          });
        } catch (error) {
          console.error("Erro na requisição: ", error);
        }
        // finally {
        //     botao_confirmar_switch_PA.removeEventListener("click", confirmarHandler);
        // }
      });
    });
  });
});