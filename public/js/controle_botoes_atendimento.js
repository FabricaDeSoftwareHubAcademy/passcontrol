// /public/js/controle_botoes_atendimento.js
document.addEventListener("DOMContentLoaded", () => {
  const btnProxima   = document.querySelector(".botao-proxima-senha-atendimento");
  const btnEncerrar  = document.querySelector(".botao-encerrar-atendimento");
  const btnIntervalo = document.querySelector(".botao-intervalo-atendimento");

  if (!btnProxima || !btnEncerrar || !btnIntervalo) {
    console.error("[controle_botoes] Botões não encontrados na tela.");
    return;
  }

  const STATE = {
    LIVRE: "LIVRE",
    AGUARDANDO_PRESENCA: "AGUARDANDO_PRESENCA",
    INICIADO: "INICIADO"
  };

  let currentState = null;
  function applyState(newState) {
    if (newState === currentState) return;
    currentState = newState;

    switch (newState) {
      case STATE.AGUARDANDO_PRESENCA:
        btnProxima.disabled   = true;
        btnEncerrar.disabled  = true;
        btnIntervalo.disabled = true;
        break;
      case STATE.INICIADO:
        btnProxima.disabled   = true;
        btnEncerrar.disabled  = false;
        btnIntervalo.disabled = true;
        break;
      case STATE.LIVRE:
      default:
        btnProxima.disabled   = false;
        btnEncerrar.disabled  = true;
        btnIntervalo.disabled = false;
        break;
    }
  }

  function resolveIdSenha(atual) {
    if (atual && Number.isInteger(atual.id_senha)) return atual.id_senha;

    const idSessao = sessionStorage.getItem("idSenhaAtual");
    if (idSessao && /^\d+$/.test(idSessao)) return parseInt(idSessao, 10);

    if (atual && typeof atual.senha === "string") {
      const m = atual.senha.match(/(\d+)/);
      if (m) return parseInt(m[1], 10);
    }
    return null;
  }

  async function syncFromServer() {
    const str = sessionStorage.getItem("atendimento_atual");

    if (!str) {
      applyState(STATE.LIVRE);
      return;
    }

    let atual = null;
    try { atual = JSON.parse(str); } catch { applyState(STATE.LIVRE); return; }

    const id = resolveIdSenha(atual);
    if (!id) { applyState(STATE.LIVRE); return; }

    try {
      const resp = await fetch(`../actions/consultar_status_fila.php?id=${encodeURIComponent(id)}`);
      const data = await resp.json();
      if (!data || data.erro) return;

      const status = (data.status || "").toLowerCase();

      if (status === "pendente") {
        applyState(STATE.LIVRE);
      } else if (status === "em atendimento") {
        if (data.fila_senha_iniciada_in) {
          applyState(STATE.INICIADO);
        } else {
          applyState(STATE.AGUARDANDO_PRESENCA);
        }
      } else if (status === "atendido") {
        applyState(STATE.LIVRE);
        sessionStorage.removeItem("atendimento_atual");
        sessionStorage.removeItem("idSenhaAtual");
      } else {
        applyState(STATE.LIVRE);
      }
    } catch {
    }
  }

  function scheduleSync(delays = [400, 1200]) {
    delays.forEach(ms => setTimeout(syncFromServer, ms));
  }

  syncFromServer();

  btnProxima?.addEventListener("click", () => {
    applyState(STATE.AGUARDANDO_PRESENCA);
    scheduleSync();
  });

  document.addEventListener("click", (e) => {
    const t = e.target.closest(".presente_ChamarSenha, .ausente_ChamarSenha");
    if (!t) return;
    applyState(STATE.INICIADO);
    scheduleSync();
  });

  document.addEventListener("click", (e) => {
    const t = e.target.closest(
      ".confirmar-encerrar-atendimento, .btn-encerrar, .encerrar_atendimento, .confirm-encerrar, [data-action='encerrar']"
    );
    if (!t) return;

    let tries = 0;
    const maxTries = 12; // ~10s
    const int = setInterval(async () => {
      tries++;
      await syncFromServer();
      if (currentState === STATE.LIVRE || tries >= maxTries) {
        clearInterval(int);
      }
    }, 800);
  });

  window.addEventListener("focus", syncFromServer);

  document.addEventListener("visibilitychange", () => {
    if (!document.hidden) syncFromServer();
  });
});
 