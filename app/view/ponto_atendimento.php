<?php
require '../classes/PontoAtendimento.php';

$guiche = new Ponto_Atendimento();
$guiches = $guiche->buscar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- IMPORT DA FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- IMPORT DO CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/ponto_atendimento.css">
    <link rel="stylesheet" href="../../public/modais/ModalEdicaoPontoAtendimento/estilo.css">
    <link rel="stylesheet" href="../../public/modais/ModalInativacaoGuiche/cadastro.css">
    <link rel="stylesheet" href="../../public/modais/ModalConfirmaDados/estilo.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Cadastro_Ponto_Atendimento/cadastro_ponto_atendimento.css">
    


    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

<section class="Area-Util-Projeto">
    <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
    <div id="PontoAtendimentoCad">
        <div class="topo-tela-PontoAtendimentoCad">
            <div class="campo-busca">
                <input id="buscar-Ponto-atendimento" type="text" placeholder="Buscar Registro">
            </div>
            <div class="sev"><p id="Ponto-atendimento">Ponto de Atendimento</p></div>
            <div class="linha-divisoria-Ponto-atendimento"></div>
        </div>
        <div id="tela-branca-Ponto-atendimento"> 
            <div class="tabela-responsiva-Ponto-atendimento">
                <table id="table table-striped" class="tabela-Ponto-atendimento">
                    <thead class="cabecaTabelaPonto-atendimento">
                        <tr class="topo-tabela-servicos">
                            <th  class="cabecalho-tabela1">Tipo</th>
                            <th class="indentificador-menor"  class="cabecalho-tabela2">Identificador</th>
                            <th class="editar-menor"  class="cabecalho-tabela3">Editar</th>
                            <th class="inativar-menor"  class="cabecalho-tabela1">Status</th>
                        </tr>
                    </thead>
                    <tbody class="resto-tabela-Ponto-atendimento">
                            <?php
                                foreach($guiches as $guiche) {
                                    $estadoAtivo = ($guiche->ativo == 'ATIVO') ? 'active' : '';
                                    echo '
                                    <tr>
                                        <td>'.$guiche->nome_ponto_atendimento.'</td>
                                        <td class="indentificador-menor">'.$guiche->identificador_ponto_atendimento.'</td>
                                        <td class="editar-menor">
                                            <div class="editar">
                                                <button class="bot-editar" id="chamamodal" id_value ='.$guiche->id_ponto_atendimento.'>
                                                    <img id="icone-editar" src="../../public/img/icons/editar.png" alt="Editar">
                                                </button>
                                            </div>
                                        </td>
                                        <td class="inativar-menor">
                                            <button id="switch_status" id_value_switch="'.$guiche->id_ponto_atendimento.'"  class="toggle-btn '.$estadoAtivo.'">
                                                <div class="circulo"></div>
                                            </button>
                                        </td>
    
                                    </tr>';
                                }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
        <div class="botoesVoltar-Cadastrar">
            <button type="button" class="botao-voltar" onclick="window.location.href='menuadm_servicos.php';">Voltar</button>
            <!-- <button type="button" id="abrirModal" class="botao-cadastro">Cadastrar</button> -->
            <button type="button" id="btn_cadastrar_adm" class="botao-cadastro">Cadastrar</button>

        </div>

    </div>
</section>

<!-- ************************************   EDITAR PONTO DE ATENDIMENTO  ************************************ -->

<!-- Modal  EDITAR Ponto de Atendimento-->
<div class="modal-container">
        <section class="modal">
            <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="titulo">Editar Ponto de Atendimento</h1>
            <hr class="linha-horizontal">
            <form id="formulario_editar" method="POST">
                <div class="inf-modal">
                    <div class="container">
                        <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                        <input type="text" id="nome_ponto_atendimento" name="nome_ponto_atendimento" class="input-text" placeholder="">
                        <input type="hidden" id="id_ponto_atendimento" name="id_ponto_atendimento">
                    </div>
                </div>
                <div class="servico">
                    <label class="label"><b>Número / Letra</b></label>
                    <input type="text" id="identificador_ponto_atendimento" name="identificador_ponto_atendimento" class="input-text" placeholder="">
                </div>
                <div class="button-group">
                    <button class="botao-modal cancel">Voltar</button>
                    <button class="botao-modal save">Salvar</button>
                </div>

            </form>
        </section>
</div>


<!-- Modal Confirma EDITAR -->
    <div id="confirma_editar"  class="modal-confirma-container">
        <section class="modal">
            <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="modal-title">Confirmação</h1>
            <hr class="modal-divider">
            <p class="modal-message"><b>Ponto de Atendimento Atualizado com Sucesso!</b></p>
            <div class="button-group">
                <button id="btnOkEditar"class="botao-modal Okay">Ok</button>
            </div>
        </section>
    </div >

<!-- JS Modal Editar e Confirma EDITAR-->
<script>

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#chamamodal").forEach(button => {

        button.addEventListener("click", async function(event) {
            
            let id_value = button.getAttribute("id_value");

            const modalContainer = document.querySelector(".modal-container");
            const buttonFechar = document.querySelector(".close");
            const buttonCancelar = document.querySelector(".cancel");
            const buttonSalvar = document.querySelector(".save");
            const apareceMod = document.getElementById("confirma_editar");

            event.preventDefault(); // impede o recarregamento da pagina


            // Fazer requisição para buscar os dados do ponto de atendimento
            let dados_php = await fetch("../actions/ponto_atendimento_editar.php?id_ponto_atendimento="+id_value , {
                method: 'GET'
            });

            let response = await dados_php.json();

            console.log(response);
    
            document.getElementById("nome_ponto_atendimento").value = response.nome_ponto_atendimento;
            document.getElementById("identificador_ponto_atendimento").value = response.identificador_ponto_atendimento;
            document.getElementById("id_ponto_atendimento").value = response.id_ponto_atendimento; 
            
            modalContainer.classList.add("show");

            buttonCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
            });


            buttonSalvar.addEventListener("click", async(event) => {

                    event.preventDefault(); // impede o recarregamento da pagina

                    myform = document.getElementById("formulario_editar");

                    const formData = new FormData(myform);

                    let dados2_php = await fetch("../actions/ponto_atendimento_cadastrar.php",{
                        method:'POST',
                        body:formData
                    })

                    let response2 = await dados2_php.json();
                if (response) {
                    apareceMod.classList.add("show");
                    modalContainer.classList.remove("show");
                }

                console.log(response);
            });

            buttonCancelar.addEventListener("click", function() {
                modalContainer.classList.remove("show");
            });
        });
    });

    const buttonOkEditar = document.getElementById("btnOkEditar");
    buttonOkEditar.addEventListener("click", function() {
        const apareceMod = document.getElementById("confirma_editar");
        apareceMod.classList.remove("show");
        location.reload();
    });
});
</script>

<!-- ************************************   CADASTRAR PONTO DE ATENDIMENTO   ************************************ -->

    <!-- MODAL DE CADASTRO DE PONTO DE ATENDIMENTO -->
    <div class="fundo-container-cad-ponto-atendimento">
        <section class="modal-ponto-atendimento">
            <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-ponto-atendimento">
            <h1 class="titulo-ponto-atendimento">Cadastrar Ponto de Atendimento</h1>

            <hr class="linha-horizontal-ponto-atendimento">

            <form id="formulario_cadastrar" method="POST">
            
                <div class="inf-modal-ponto-atendimento">
                    <div class="container-ponto-atendimento">
                        <label class="label-ponto-atendimento"><b>Nome do Ponto de Atendimento</b></label>
                        <input type="text" id="nome_ponto_atendimento_cadastrar" name="nome_ponto_atendimento_cadastrar" class="input-text-ponto-atendimento" placeholder="Ex: Guichê, Caixa, IPTU...">
                    </div>
                </div>
                <div class="servico-ponto-atendimento">
                    <label class="label-ponto-atendimento"><b>Número / Letra</b></label>
                    <input type="text" id="identificador_ponto_atendimento_cadastrar" name="identificador_ponto_atendimento_cadastrar" class="input-text-ponto-atendimento" placeholder="Ex: 01, 02...">
                </div>
                <div class="button-group-ponto-atendimento">
                    <button class="botao-modal-ponto-atendimento cancel_CadPontoAtend">Voltar</button>
                    <button type="submit" class="botao-modal-ponto-atendimento save_CadPontoAtend">Salvar</button>
                </div>

            </form>
        </section>
    </div>


    <!-- Modal Confirma CADASTRAR -->
    <div id="confirma_cadastrar"  class="modal-confirma-container">
        <section class="modal">
            <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="modal-title">Confirmação</h1>
            <hr class="modal-divider">
            <p class="modal-message"><b>Ponto de Atendimento Cadastrado com Sucesso!</b></p>
            <div class="button-group">
                <button id="btnOkCadastrar"class="botao-modal Okay">Ok</button>
            </div>
        </section>
    </div >

<!-- JS Modal CADASTRAR e Confirma CADASTRAR-->
<script>
    let btn_cadastrar_guiche = document.getElementById("btn_cadastrar_adm");
    const apareceMod = document.getElementById("confirma_cadastrar");

    const modalContainer_CadPontoAtend = document.querySelector(".fundo-container-cad-ponto-atendimento");
    const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
    const buttonSalvar_CadPontoAtend = document.querySelector(".save_CadPontoAtend");

    // Abrir Modal
    btn_cadastrar_guiche.addEventListener("click", () => {
        modalContainer_CadPontoAtend.classList.add("show");
    });

    // Fechar Modal
    buttonCancelar_CadPontoAtend.addEventListener("click", (event) => {
        event.preventDefault();
        modalContainer_CadPontoAtend.classList.remove("show");
    });

    // Salvar Formulário
    buttonSalvar_CadPontoAtend.addEventListener("click", function (event) {
        event.preventDefault();

        const myform = document.getElementById("formulario_cadastrar");
        const inputs = myform.querySelectorAll("input");
        let formularioValido = true;

        // Verifica se todos os campos estão preenchidos
        inputs.forEach(inputAtual => {
            if (inputAtual.value.trim() === "") {
                formularioValido = false;
            }
        });

        if (!formularioValido) {
            alert("Preencha todos os campos para continuar!");
            return;
        }

        modalContainer_CadPontoAtend.classList.remove("show");
        apareceMod.classList.add("show");

        // Adiciona o evento no botão "OK" após exibir o modal de confirmação
        const btnOkCadastrar = document.getElementById("btnOkCadastrar");

        if (btnOkCadastrar) {
            btnOkCadastrar.addEventListener("click", async function handleClick() {
                console.log("ENTROU AQUI");

                const formData = new FormData(myform);

                try {
                    const dados2_php = await fetch("../actions/ponto_atendimento_cadastrar.php", {
                        method: 'POST',
                        body: formData
                    });

                    const response = await dados2_php.json();

                    if (response.status === 'ok') {
                        window.location.href = "../";
                    } else {
                        alert("Erro ao cadastrar: " + (response.message || "Erro desconhecido"));
                    }
                } catch (error) {
                    console.error("Erro na requisição:", error);
                    alert("Erro de conexão com o servidor.");
                }

                // Remove o listener após execução para evitar múltiplos envios
                btnOkCadastrar.removeEventListener("click", handleClick);
            }, { once: true });
        } else {
            console.warn("Botão btnOkCadastrar não encontrado.");
        }
    });

    function toggleMenu() {
        document.getElementById("mobileMenu").classList.toggle("active");
    }
</script>

<!-- ************************************   STATUS PONTO DE ATENDIMENTO   ************************************ -->




<!-- Modal STATUS Ponto de Atendimento -->

<div class="modal-inativar-container">
    <section class="modal">
        <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
        <h1 class="titulo">Confirmação</h1>
        <hr class="linha">
        <p class="texto"><b>Deseja Alterar o Status do Ponto de Atendimento?</b></p>
        <div class="button-group">
            <button id="btn-cancelar" class="botao-modal cancel">Não</button>
            <button id="salvar" class="botao-modal save">Sim</button>
        </div>
    </section>
</div>

<!-- Confirmar STATUS Ponto de Atendimento -->
<div id="confirma_status"  class="modal-confirma-container">
        <section class="modal">
            <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="modal-title">Confirmação</h1>
            <hr class="modal-divider">
            <p class="modal-message"><b>Salvo com sucesso!</b></p>
            <div class="button-group">
                <button id="btnOkStatus"class="botao-modal Okay">Ok</button>
            </div>
        </section>
    </div >
</html>


<!-- JS Modal STATUS e Confirma STATUS Ponto de Atendimento -->

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#switch_status").forEach(button => {
        button.addEventListener("click", function(event) {
            let id_value_switch = button.getAttribute("id_value_switch");
            const modalContainer = document.querySelector(".modal-inativar-container");
            // const buttonCancelar = document.querySelector(".cancel");
            const buttonCancelar = document.querySelector("#btn-cancelar");
            const apareceMod = document.getElementById("confirma_status");

            modalContainer.classList.add("show");

            const buttonSalvar = document.querySelector("#salvar");

            buttonSalvar.addEventListener("click", async function(event) {
                let dados_php = await fetch("../actions/ponto_atendimento_inativar.php?id_ponto_atendimento=" + id_value_switch, {
                    method: 'GET'
                });

                let response = await dados_php.json();
                if (response) {
                    apareceMod.classList.add("show");
                    modalContainer.classList.remove("show");
                }

            });

            buttonCancelar.addEventListener("click", function() {
                console.log("Modal fechado");
                modalContainer.classList.remove("show");
            });
        });
    });

    const buttonOkStatus = document.getElementById("btnOkStatus");
    buttonOkStatus.addEventListener("click", function() {
        const apareceMod = document.getElementById("confirma_status");
        apareceMod.classList.remove("show");
        location.reload();
    });
});
</script>

<?php
include "./monitor_modal.php";
?>

</body>