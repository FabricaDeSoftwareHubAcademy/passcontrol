<?php

require __DIR__."../../DB/Database.php";

class Usuario{
    
    public int $id_usuario;
    public string $nome;
    // public string $cpf;
    public string $email;
    public string $senha;
    public string $id_perfil;
    // public string $foto;
    public string $status_usuario;
    // public string $ultimo_login;

    // private function __construct(){
    // }
    
    public function cadastrar(): bool{
        $db = new Database("usuario");

        $db->insert(
            [
                "nome"=> $this->nome,
                "email"=> $this->email,
                "senha"=> $this->senha,
                "id_perfil"=> $this->id_perfil
            ]
        );
        return true;
    }

    public function buscar($where=null,$order=null,$limit=null){
        return (new Database("usuario"))->select_pdostmt($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public function buscar_id_usu($id_usuario){
         $res = new Database("usuario");
         $data = $res->select("id_usuario =".$id_usuario);
         
         return $data;
    }

    public function logar($email,$senha){
        $checalogin = (new Database("usuario"))->execute("SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha';");
        // $checalogin->bindValue(":e", $email);
        // $checalogin->bindValue(":s", $senha);
        // $checalogin->execute();
        
        if($checalogin->rowCount()>0){
            $dados = $checalogin->fetch();
            session_start();
            $_SESSION["id_usuario"] = $dados["id_usuario"];
            return true;
        }
        else{
            return false;
        }
    }
    
    public function update($id_usuario){
        return(new Database("usuario"))->update("id_usuario =".$id_usuario,
            [
                "nome"=> $this->nome,
                // "cpf"=> $this->cpf,
                // "foto"=> $this->foto,
                "email"=> $this->email,
                "id_perfil" => $this->id_perfil
            ]
        );
    }

    public function gerarSenha($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*+-&@!#$.';
        $charactersLength = strlen($characters);
        $randomPw = '';

        for ($i = 0; $i < $length; $i++){
            $randomPw .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomPw;
    }

    public function listar_nome_perfil($id_perfil){
        $db = new Database('perfil');
        $data = $db->select("id_perfil =".$id_perfil);
        
        return $data;
    }

    public function alternar_status($id_usuario, $status_usuario){
        $db = new Database('usuario');
        $status_alternar = ($status_usuario == 'ativo') ? 'inativo' : 'ativo';
        $res = $db->update('id_usuario =' .$id_usuario, ['status_usuario' => $status_alternar]);
        return $res; 
    }
}   
?>