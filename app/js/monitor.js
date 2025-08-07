document.addEventListener("DOMContentLoaded", async () => {

    const dados_fila = await fetch("../actions/monitor_select.php");    

    try{
        const resposta = await dados_fila.json();
        
        console.log(resposta);
    }catch(erro){
        console.log(erro.message);
    }
});