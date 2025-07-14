document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".modal-container-aviso-erro");
    const btnVoltar = document.querySelector(".voltar_AvisoErro");
  
    if (modal) {
      modal.classList.add("show");
    }
  
    if (btnVoltar) {
      btnVoltar.addEventListener("click", () => {
        modal.classList.remove("show");
        window.location.href = "../../index.php";
      });
    }
  });
  