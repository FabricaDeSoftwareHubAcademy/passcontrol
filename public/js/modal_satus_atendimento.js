document.addEventListener("DOMContentLoaded", () => {
    const interrogacao = document.querySelector(".interrogacao_Tabela");
    const fundoStatus = document.querySelector(".fundo-status-atendimento");
    const fechaStatus = document.querySelector(".close_StatusAtendimento");
  
    if (interrogacao && fundoStatus && fechaStatus) {
      interrogacao.addEventListener("click", () => {
        fundoStatus.classList.add("show");
      });
  
      fechaStatus.addEventListener("click", () => {
        fundoStatus.classList.remove("show");
      });
    } else {
      console.warn("Um ou mais elementos não foram encontrados.");
      console.log("interrogacao =", interrogacao);
      console.log("fundoStatus =", fundoStatus);
      console.log("fechaStatus =", fechaStatus);
    }
  });
  