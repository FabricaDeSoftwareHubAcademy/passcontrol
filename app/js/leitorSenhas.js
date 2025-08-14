// leitorSenhas.js
 
let ultimaSenhaChamada = null;
let leitorAtivo = true;
 
function verificarNovaSenha() {
    if (!leitorAtivo) return;
 
    fetch('../../app/actions/get_chamadas.php')
        .then(res => {
            if (!res.ok) throw new Error('Falha na rede');
            return res.json();
        })
        .then(data => {
            console.log('Dados recebidos:', data); // Para depuração
           
            if (data.principal) {
                const senhaAtual = data.principal.senha;
               
                if (senhaAtual !== ultimaSenhaChamada) {
                    console.log('Nova senha detectada:', senhaAtual); // Depuração
                    ultimaSenhaChamada = senhaAtual;
                    falarSenha(data.principal.nome, senhaAtual, data.principal.guiche);
                }
            }
        })
        .catch(err => {
            console.error('Erro ao verificar senhas:', err);
            setTimeout(verificarNovaSenha, 5000); // Tenta novamente após 5 segundos em caso de erro
        });
}
 
function falarSenha(nome, senha, guiche) {
    if (!('speechSynthesis' in window)) {
        console.error('API de síntese de voz não suportada');
        return;
    }
 
    const mensagem = new SpeechSynthesisUtterance();
    mensagem.text = `Senha ${senha}, ${nome}, ponto de atendimento ${guiche}`;
    mensagem.lang = 'pt-BR';
    mensagem.rate = 0.9;
   
    // Eventos para depuração
    mensagem.onstart = () => console.log('Leitura iniciada');
    mensagem.onend = () => console.log('Leitura concluída');
    mensagem.onerror = (e) => console.error('Erro na leitura:', e);
   
    window.speechSynthesis.cancel();
    window.speechSynthesis.speak(mensagem);
}
 
function iniciarLeitor() {
    // Verifica se a API de voz está disponível
    if (!('speechSynthesis' in window)) {
        console.error('Seu navegador não suporta síntese de voz');
        return;
    }
 
    // Carrega as vozes disponíveis (necessário em alguns navegadores)
    window.speechSynthesis.onvoiceschanged = function() {
        console.log('Vozes carregadas:', window.speechSynthesis.getVoices());
    };
 
    // Força o carregamento das vozes
    const voices = window.speechSynthesis.getVoices();
    console.log('Vozes disponíveis:', voices);
   
    // Inicia a verificação
    verificarNovaSenha();
    setInterval(verificarNovaSenha, 2000);
   
    console.log('Leitor de senhas iniciado');
}
 
// Exporta para uso global
window.iniciarLeitor = iniciarLeitor;