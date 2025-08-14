document.addEventListener('DOMContentLoaded', async () => {
    const dados = JSON.parse(localStorage.getItem('dadosSenha'));
  
    if (
      !dados ||
      !dados.nome ||
      dados.prioridade === undefined ||
      !dados.id_servico
    ) {
      alert('Informações incompletas.');
      return;
    }
  
    try {
      const resCriarSenha = await fetch('', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(dados),
      });
  
      const jsonSenha = await resCriarSenha.json();
  
      if (jsonSenha && jsonSenha.sucesso) {
        const divs = document.querySelectorAll('.variable-text > div');
        divs[0].innerHTML = `<strong>SENHA:</strong> ${jsonSenha.senha}`;
        divs[1].innerHTML = `<strong>NOME:</strong> ${jsonSenha.nome}`;
        divs[2].innerHTML = `<strong>SERVIÇO:</strong> ${jsonSenha.servico}`;
        
        console.log(dados);

        if (dados.telefone) {
          const tel = dados.telefone.replace(/\D/g, '');
          const r = await fetch('../../app/actions/enviar_mensagem.php', {
            method: 'POST',
            headers: {
              'Content-type': 'application/json',
            },
            body: JSON.stringify({
              tel: tel,
              mensagem: `Olá ${dados.nome}! Sua senha é ${jsonSenha.senha}. Aguarde ser chamado.`,
            }),
          });
        }
      } else {
        // alert("Não foi possível localizar a senha.");
      }
    } catch (error) {
      console.error('Erro:', error);
      alert('Erro ao buscar senha.');
    }
  });  