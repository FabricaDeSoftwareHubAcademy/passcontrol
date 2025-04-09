<?php
require '../../../app/classe/guiche.php';

$guiche = new Guiche();
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
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/PontoAtendimentoCad.css">
    <link rel="stylesheet" href="../../../public/modais/ModalEdicaoPontoAtendimento/estilo.css">
    <link rel="stylesheet" href="../../../public/modais/ModalInativacaoGuiche/estilo.css">
    <link rel="stylesheet" href="../../../public/modais/ModalInativacaoGuiche/cadatro.css">

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>
<body class="control-body-navegacao">
    <?php include "./navegacao.php"; ?>

    <section class="Area-Util-Projeto">
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
                                <th scope="col" class="cabecalho-tabela1">Tipo</th>
                                <th scope="col" class="cabecalho-tabela2">Identificador</th>
                                <th scope="col" class="cabecalho-tabela3">Editar</th>
                                <th scope="col" class="cabecalho-tabela1">Desativar/Ativar</th>
                            </tr>
                        </thead>
                        <tbody class="resto-tabela-Ponto-atendimento">
                            <?php
                            foreach($guiches as $guiche) {
                                $estadoAtivo = ($guiche->ativo == 'ATIVO') ? 'active' : '';
                                echo '
                                <tr>
                                    <td>'.$guiche->nome_guiche.'</td>
                                    <td>'.$guiche->num_guiche.'</td>
                                    <td>
                                        <button class="bot-editar" id="chamamodal" id_value="'.$guiche->id_guiche.'">
                                            <img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar">
                                        </button>
                                    </td>
                                    <td>
                                        <button id="switch_status" id_value_switch="'.$guiche->id_guiche.'" class="toggle-btn '.$estadoAtivo.'">
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
                <button type="button" id="btn_cadastrar_adm" class="botao-cadastro">Cadastrar</button>
            </div>
        </div>
    </section>

    <!-- ModalGuiche Editar -->
    <div class="modal-container">
            <section class="modal">
                <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
                <h1 class="titulo">Cadastrar Ponto de Atendimento</h1>
                <hr class="linha-horizontal">
                
                <form id="formulario-cadastro" method="POST" action="../../CLASSE/cadastrar_guiche.php">
                
                    <div class="inf-modal">
                        <div class="container">
                            <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                            <input type="text" id="nome_guiche_cad" name="nome_guiche" class="input-text" placeholder="Guichê">
                        </div>
                    </div>
                    <div class="servico">
                        <label class="label"><b>Número / Letra</b></label>
                        <input type="text" id="num_guiche_cad" name="num_guiche" class="input-text" placeholder="1">
                    </div>
                    <div class="button-group">
                        <button class="botao-modal cancel">Voltar</button>
                        <button type="submit" class="botao-modal save">Salvar</button>
                    </div>
                </form>
            </section>
        </div>

    <!-- ModalGuicheInativar -->
    <div class="modal-inativar-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="titulo">Confirmação</h1>
            <hr class="linha">
            <p class="texto"><b>Deseja Alterar Esse Guichê?</b></p>
            <div class="button-group">
                <button class="botao-modal cancel">Não</button>
                <button id="salvar" class="botao-modal save">Sim</button>
            </div>
        </section>
    </div>

    <!-- Modal Cadastro via Web Component -->
    <main-cadastro-cadastro-adm></main-cadastro-cadastro-adm>

    <!-- Scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("#chamamodal").forEach(button => {
                button.addEventListener("click", async function(event) {
                    let id_value = button.getAttribute("id_value");
                    const modalContainer = document.querySelector(".modal-container");
                    const buttonCancelar = document.querySelector(".cancel");
                    const buttonSalvar = document.querySelector(".save");
                    event.preventDefault();
                    let dados_php = await fetch("../../classe/edit_guiche_modal.php?id_guiche=" + id_value, {
                        method: 'GET'
                    });
                    let response = await dados_php.json();
                    document.getElementById("nome_guiche").value = response.nome_guiche;
                    document.getElementById("num_guiche").value = response.num_guiche;
                    document.getElementById("id_guiche").value = response.id_guiche;
                    modalContainer.classList.add("show");

                    buttonCancelar.addEventListener("click", () => {
                        modalContainer.classList.remove("show");
                    });

                    buttonSalvar.addEventListener("click", async (event) => {
                        event.preventDefault();
                        const formData = new FormData(document.getElementById("formulario"));
                        await fetch("../../classe/edit_guiche_modal.php", {
                            method: 'POST',
                            body: formData
                        });
                        location.reload();
                        modalContainer.classList.remove("show");
                    });
                });
            });

            document.querySelectorAll("#switch_status").forEach(button => {
                button.addEventListener("click", function() {
                    let id_value_switch = button.getAttribute("id_value_switch");
                    const modalContainer = document.querySelector(".modal-inativar-container");
                    modalContainer.classList.add("show");

                    const buttonSalvar = document.querySelector("#salvar");
                    const buttonCancelar = document.querySelector(".modal-inativar-container .cancel");

                    buttonCancelar.addEventListener("click", () => {
                        modalContainer.classList.remove("show");
                    });

                    buttonSalvar.addEventListener("click", async function() {
                        await fetch("../../classe/inativar_guiche.php?id_guiche=" + id_value_switch, {
                            method: 'GET'
                        });
                        location.reload();
                    });
                });
            });
        });
    </script>

    <!-- Script do Modal de Cadastro -->
    <script>
        class Modal_Cadastro_Guiche_Adm extends HTMLElement {
            connectedCallback() {
                this.innerHTML = `
                <div class="modal-container">
                    <section class="modal">
                        <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
                        <h1 class="titulo">Cadastrar Ponto de Atendimento</h1>
                        <hr class="linha-horizontal">
                        <form id="formulario-cadastro" method="POST" action="../../CLASSE/cadastrar_guiche.php">
                            <div class="inf-modal">
                                <div class="container">
                                    <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                                    <input type="text" id="nome_guiche_cad" name="nome_guiche" class="input-text" placeholder="Guichê">
                                </div>
                            </div>
                            <div class="servico">
                                <label class="label"><b>Número / Letra</b></label>
                                <input type="text" id="num_guiche_cad" name="num_guiche" class="input-text" placeholder="1">
                            </div>
                            <div class="button-group">
                                <button class="botao-modal cancel">Voltar</button>
                                <button class="botao-modal save" type="submit">Salvar</button>
                            </div>
                        </form>
                    </section>
                </div>`;
            }
        }

        customElements.define('main-cadastro-cadastro-adm', Modal_Cadastro_Guiche_Adm);

        document.addEventListener("DOMContentLoaded", function () {
            const modalCheckInterval = setInterval(() => {
                const modalContainer = document.querySelector("main-cadastro-cadastro-adm");
                if (modalContainer && modalContainer.querySelector(".modal-container")) {
                    clearInterval(modalCheckInterval);
                    const buttonAbrir = document.querySelector("#btn_cadastrar_adm");
                    const modal = modalContainer.querySelector(".modal-container");
                    const formulario = modal.querySelector("#formulario-cadastro");
                    const buttonCancelar = modal.querySelector(".cancel");
                    const buttonSim = modal.querySelector(".save");

                    const abrirModal = (e) => {
                        e.preventDefault();
                        modal.classList.add("show");
                    };

                    buttonAbrir?.addEventListener("click", abrirModal);
                    buttonCancelar?.addEventListener("click", () => {
                        modal.classList.remove("show");
                    });

                    buttonSim?.addEventListener("click", () => {
                        formulario.submit();
                        modal.classList.remove("show");
                    });
                }
            }, 50);
        });
    </script>

</body>
</html>
