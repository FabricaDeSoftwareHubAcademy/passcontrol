
<?php

require_once '../classes/Usuario.php';

$objUser = new Usuario();

$id = addslashes($_POST['id_user']);

echo json_encode([
    'id' => $id,
    'status' => 'error',
    'message' => 'Acesso não autorizado.'
]);