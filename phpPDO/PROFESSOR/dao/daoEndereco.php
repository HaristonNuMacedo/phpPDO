<?php

include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/bd/conecta.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/endereco.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';

class DaoEndereco {

    public function inserirEndereco(Endereco $end){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $cep = $end->getCep();
            $logradouro = $end->getLogradouro();
            $complemento = $end->getComplemento();
            $bairro = $end->getBairro();
            $cidade = $end->getCidade();
            $uf = $end->getUf();
            try {
                $stmt = $conecta->prepare("insert into endereco values "
                    ."(null, ?, ?, ?, ?, ?, ?");
                $stmt->bindParam(1, $cep);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $complemento);
                $stmt->bindParam(4, $bairro);
                $stmt->bindParam(5, $cidade);
                $stmt->bindParam(6, $uf);
                $stmt->execute();

                $msg->setMsg("<p style='color: green;'>"
                    . "Dados Cadastrados com sucesso</p>");

            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }

        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }


    public function listarEnderecoDAO(){
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("select * from pessoa");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $end = new Endereco();
                            $end->setIdEndereco($linha->idEndereco);
                            $end->setCep($linha->cep);
                            $end->setLogradouro($linha->logradouro);
                            $end->setComplemento($linha->complemento);
                            $end->setBairro($linha->bairro);
                            $end->setCidade($linha->cidade);
                            $end->setUf($linha->uf);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } 
        
    }
}
