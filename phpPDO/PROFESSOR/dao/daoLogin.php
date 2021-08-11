<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/bd/conecta.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';

class DaoLogin {
    
    public function validarLoginDAO($login, $senha) {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        $pessoa = new Pessoa();
        if ($conecta) {
            try {
                $st = $conecta->prepare("select * from pessoa where login = ? and senha = ? limit 1");
                $st->bindParam(1, $login);
                $st->bindParam(2, $senha);
                
                if ($st->execute()) {
                    if ($st->execute() > 0) {
                    while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                        $pessoa->setIdPessoa($linha->idPessoa);
                        $pessoa->setNome($linha->nome);
                        $pessoa->setLogin($linha->login);
                        $pessoa->setPerfil($linha->perfil);
                    }
                    return $pessoa;
                } else {
                    return "<p style='color: red;'>'Usuário não Encontrado'</p>";
                }
            }
              
            } catch (PDOException $ex) {
                $msg->setMsg($ex);
            }
            
        } else{           
            return "<p style='color: red;'>'Banco inoperante!'</p>";
        }
        
    }


}