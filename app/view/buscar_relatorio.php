<?php
require '../../app/db/conexao.php';

$data_inicio = $_GET['inicio'];
$data_fim = $_GET['fim'];
$local = $_GET['local'];

$sql = "
    SELECT fs.id_fila_senha, fs.nome_fila_senha, fs.prioridade_fila_senha, 
           fs.fila_senha_created_in, s.nome_servico, pa.nome_ponto_atendimento
    FROM fila_senha fs
    JOIN servico s ON fs.id_servico_fk = s.id_servico
    JOIN ponto_atendimento pa ON s.codigo_servico = pa.identificador_ponto_atendimento
    WHERE DATE(fs.fila_senha_created_in) BETWEEN ? AND ?
      AND pa.nome_ponto_atendimento = ?
    ORDER BY fs.fila_senha_created_in DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $data_inicio, $data_fim, $local);
$stmt->execute();
$result = $stmt->get_result();

$dados = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($dados);
