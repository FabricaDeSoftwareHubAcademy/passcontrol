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
                                            <button id="chamamodal" id_value ='.$guiche->id_guiche.'>
                                                <img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar">
                                            </button>
                                        </td>
                                        <td>
                                            <button href="../../../inativar_guiche.php?id_guiche='.$guiche->id_guiche.'">
                                            <div class="toggle-btn '.$estadoAtivo.'">
                                                <div class="circulo"></div>
                                            </div>
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
            <button type="button" class="botao-cadastro" onclick="abrirModalCadastro()">Cadastrar</button>
        </div>

    </div>
</section>
<!-- ModalGuiche Editar -->
<div class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="titulo">Edição Ponto de Atendimento</h1>
            <hr class="linha-horizontal">
            <form id="formulario" method="POST">
                <div class="inf-modal">
                    <div class="container">
                        <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                        <input type="text" id="nome_guiche" name="nome_guiche" class="input-text" placeholder="Guichê">
                        <input type="hidden" id="id_guiche" name="id_guiche" value="<?=$guiche->id_guiche?>" class="input-text" placeholder="Guichê">
                    </div>
                </div>
                <div class="servico">
                    <label class="label"><b>Número / Letra</b></label>
                    <input type="text" id="num_guiche" name="num_guiche" class="input-text" placeholder="1">
                </div>
                <div class="button-group">
                    <button class="botao-modal cancel">Voltar</button>
                    <button class="botao-modal save">Salvar</button>
                </div>

            </form>
        </section>
</div>

<!-- ModalGuicheInativar -->
<main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="titulo">Confirmação</h1>
            <hr class="linha">
            <p class="texto"><b>Deseja Inativar Esse Guichê?</b></p>
            <div class="button-group">
                <button class="botao-modal cancel">Não</button>
                <button class="botao-modal save">Sim</button>
            </div>
        </section>
    </main>


<script>

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#chamamodal").forEach(button => {

        button.addEventListener("click", async function(event) {
            
            let id_value = button.getAttribute("id_value");
            //console.log(id_value);

            const modalContainer = document.querySelector(".modal-container");
            const buttonFechar = document.querySelector(".close");
            const buttonCancelar = document.querySelector(".cancel");
            const buttonSalvar = document.querySelector(".save");

            event.preventDefault(); // impede o recarregamento da pagina


            // Fazer requisição AJAX para buscar os dados do usuário
            let dados_php = await fetch("../../classe/edit_guiche_modal.php?id_guiche="+id_value , {
                method: 'GET'
            });

            let response = await dados_php.json();

            console.log(response);

                  // Preenche os campos do modal com os dados do usuário
            document.getElementById("nome_guiche").value = response.nome_guiche;
            document.getElementById("num_guiche").value = response.num_guiche;

            modalContainer.classList.add("show");

            buttonCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
            });


            buttonSalvar.addEventListener("click", async(event) => {

                    event.preventDefault(); // impede o recarregamento da pagina

                    myform = document.getElementById("formulario");

                    const formData = new FormData(myform);

                    let dados2_php = await fetch("../../classe/edit_guiche_modal.php",{
                        method:'POST',
                        body:formData
                    })

                    let response2 = await dados2_php.json()

                    console.log(response2);  

                    modalContainer.classList.remove("show");
                });



        });

       });

    }); 
 
 
</script>


</html>


