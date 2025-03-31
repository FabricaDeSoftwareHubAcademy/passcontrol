<?php
require_once __DIR__ . '/../models/guiche.php'; 

class ControllerGuiche {
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num_guiche = $_POST['num_guiche'];
            $nome_guiche = $_POST['nome_guiche'];

            $guiche = new Guiche();
            $guiche->num_guiche = $num_guiche;
            $guiche->nome_guiche = $nome_guiche;

            if ($guiche->criar()) {
                header('Location: ../app/admin/view/PontoAtendimentoCad.php'); 
                exit;
            } else {
                echo "Erro ao cadastrar o guichê. Tente novamente.";
            }
        }
    }

    public function editar() {
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
            
            if ($resultado) {
                header("Location: app/admin/view/PontoAtendimentoCad.php?success=1");
                exit;
            } else {
                echo '<div class="alert alert-danger">Erro ao atualizar guichê. Tente novamente.</div>';
            }
        }

        return isset($dadosGuiche) ? $dadosGuiche : null;
    }

    public function alternarStatus() {
        if (isset($_GET['id_guiche']) && isset($_GET['status'])) {
            $id_guiche = $_GET['id_guiche'];
            $status = $_GET['status']; 

            $guiche = new Guiche();
            $guicheInfo = $guiche->buscar_por_id($id_guiche);

            $result = $guiche->alternar_ativo($id_guiche, $status);

            if ($result) {
                echo "Status alterado com sucesso."; 
            } else {
                echo "Erro ao alterar o status.";
            }
        } else {
            echo "Erro: Dados não enviados corretamente.";
        }
    }

    

}
