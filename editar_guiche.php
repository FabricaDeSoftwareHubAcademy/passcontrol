<?php
require_once './app/CLASSE/guiche.php';

if (isset($_GET['id_guiche'])) {
    $id_guiche = $_GET['id_guiche'];
    $guiche = new Guiche();
    $dadosGuiche = $guiche->buscar_por_id($id_guiche);
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guiche->id_guiche = $_POST['id_guiche'];
    $guiche->nome_guiche = $_POST['nome_guiche'];
    $guiche->num_guiche = $_POST['num_guiche'];
    $resultado = $guiche->editar();
    var_dump($resultado);
    
    if ($resultado) {
        header("Location: app/admin/view/PontoAtendimentoCad.php?success=1");
        exit;


    } else {
        echo '<div class="alert alert-danger">Erro ao atualizar guichê. Tente novamente.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Guichê</title>
    <link rel="stylesheet" href="./estilo.css">
</head>
<body class="pagina">
    <main class="modal-container">
        <section class="modal">
            <h1 class="titulo">Edição Ponto de Atendimento</h1>
            <hr class="linha-horizontal">
            
            <?php if (isset($dadosGuiche)): ?>
                <form action="editar_guiche.php?id_guiche=<?php echo htmlspecialchars($dadosGuiche->id_guiche); ?>" method="POST">
                    <input type="hidden" name="id_guiche" value="<?php echo htmlspecialchars($dadosGuiche->id_guiche); ?>">

                    <div class="inf-modal">
                        <div class="container">
                            <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                            <input type="text" class="input-text" name="nome_guiche" value="<?php echo htmlspecialchars($dadosGuiche->nome_guiche); ?>" required>
                        </div>
                    </div>

                    <div class="servico">
                        <label class="label"><b>Número / Letra</b></label>
                        <input type="text" class="input-text" name="num_guiche" value="<?php echo htmlspecialchars($dadosGuiche->num_guiche); ?>" required>
                    </div>

                    <div class="button-group">
                        <button type="button" class="botao-modal cancel" onclick="window.history.back();">Voltar</button>
                        <button type="submit" class="botao-modal save">Salvar</button>
                    </div>
                </form>
            <?php else: ?>
                <div class="alert alert-danger">Guichê não encontrado.</div>
            <?php endif; ?>
        </section>
    </main>
    <script src="./modal.js"></script>
</body>
</html>
