<?php

// require_once "config/Database.php";
// $pdo = Database::getConnection();

// Função para organizar a fila de senhas (2 comuns para 1 preferencial)
// function organizarFila($pdo) {
//     // Buscar todas as senhas comuns e preferenciais ordenadas por ID
//     $stmtComum = $pdo->query("SELECT * FROM senhas WHERE tipo = 'comum' ORDER BY id ASC");
//     $stmtPreferencial = $pdo->query("SELECT * FROM senhas WHERE tipo = 'preferencial' ORDER BY id ASC");

//     $senhasComuns = $stmtComum->fetchAll(PDO::FETCH_ASSOC);
//     $senhasPreferenciais = $stmtPreferencial->fetchAll(PDO::FETCH_ASSOC);

//     $filaOrganizada = [];
//     $indexComum = 0;
//     $indexPreferencial = 0;

//     // Organizar no formato 2 comuns para 1 preferencial
//     while ($indexComum < count($senhasComuns) || $indexPreferencial < count($senhasPreferenciais)) {
//         if ($indexComum < count($senhasComuns)) $filaOrganizada[] = $senhasComuns[$indexComum++];
//         if ($indexComum < count($senhasComuns)) $filaOrganizada[] = $senhasComuns[$indexComum++];
//         if ($indexPreferencial < count($senhasPreferenciais)) $filaOrganizada[] = $senhasPreferenciais[$indexPreferencial++];
//     }

//     return $filaOrganizada;
// }

// // Função para exibir a fila na tela como tabela
// function exibirTabelaFila($filaOrganizada) {
//     echo "<table border='1'>
//             <thead>
//                 <tr>
//                     <th>Senha</th>
//                     <th>Tipo</th>
//                     <th>Posição</th>
//                     <th>Data e Hora</th>
//                     <th>Tipo de Serviço</th>
//                     <th>Nome da Pessoa</th>
//                     <th>Código da Senha</th>
//                 </tr>
//             </thead>
//             <tbody>";

//     foreach ($filaOrganizada as $senha) {
//         echo "<tr class='" . ($senha['tipo'] == 'preferencial' ? 'preferencial' : 'comum') . "'>
//                 <td>" . $senha['id'] . "</td>
//                 <td>" . $senha['tipo'] . "</td>
//                 <td>" . ($senha['posicao'] ?? 'Não definida') . "</td>
//                 <td>" . $senha['data_hora'] . "</td>
//                 <td>" . $senha['tipo_servico'] . "</td>
//                 <td>" . $senha['nome_pessoa'] . "</td>
//                 <td>" . $senha['codigo_senha'] . "</td>  <!-- Exibir o código da senha -->
//             </tr>";
//     }

//     echo "</tbody></table>";
// }

// // Obter a fila organizada
// $filaOrganizada = organizarFila($pdo);

// // Exibir a tabela com as senhas organizadas
// exibirTabelaFila($filaOrganizada);







?>