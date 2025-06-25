<?php
class Permissao {
    private $db;

    public function __construct() {
        // Ajuste a conexão PDO conforme seu ambiente
        $this->db = new PDO('mysql:host=localhost;dbname=seu_banco;charset=utf8', 'usuario', 'senha');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Método para verificar se o usuário tem determinada permissão
    public function temPermissao(int $id_usuario, string $nome_permissao): bool {
        $sql = "SELECT 1 FROM usuario u
                INNER JOIN perfil_usuario pu ON u.id_perfil_usuario_fk = pu.id_perfil_usuario
                INNER JOIN perfil_usuario_permissao pup ON pu.id_perfil_usuario = pup.id_perfil_usuario_fk
                INNER JOIN permissao p ON pup.id_permissoes_fk = p.id_permissao
                WHERE u.id_usuario = :id_usuario 
                  AND p.nome_permissao = :nome_permissao 
                  AND u.status_usuario = 1
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(':nome_permissao', $nome_permissao, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() !== false;
    }
}
