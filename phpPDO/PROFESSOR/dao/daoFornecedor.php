<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/bd/conecta.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/fornecedor.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';

class DaoFornecedor {
    
    public function inserirFornecedorDAO(Fornecedor $forne){
        $conn = new Conecta();
        $msg = new Mensagem();
        if($conn->conectadb()){
            $nomeFornecedor = $forne->getNomeFornecedor();
            $logradouro = $forne->getLogradouro();
            $numero = $forne->getNumero();
            $complemneto = $forne->getComplemneto();
            $bairro = $forne->getBairro();
            $cidade = $forne->getCidade();
            $uf = $forne->getUf();
            $cep = $forne->getCep();
            $representante = $forne->getRepresentante();
            $email = $forne->getEmail();
            $telFixo = $forne->getTelFixo();
            $telCel = $forne->getTelCel();

            $sql = "insert into fornecedor values (null, '$nomeFornecedor',"
                    . "'$logradouro', '$numero','$complemneto', '$bairro', '$cidade', "
                    . "'$uf', '$cep', '$representante', '$email', '$telFixo', '$telCel')";
            $resp = mysqli_query($conn->conectadb(), $sql) or 
                    die($conn->conectadb());
            if($resp){
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            }else{
                $msg->setMsg($resp);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }

    //método para carregar lista de produtos do banco de dados
    public function listarFornecedoresDAO(){
        $conn = new Conecta();
        if($conn->conectadb()){
            $sql = "select * from fornecedor";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            if ($result) {
                do {
                    $forne = new Fornecedor();
                    $forne->setIdFornecedor($result['idFornecedor']);
                    $forne->setNomeFornecedor($result['nomeFornecedor']);
                    $forne->setLogradouro($result['logradouro']);
                    $forne->setNumero($result['numero']);
                    $forne->setComplemneto($result['complemento']);
                    $forne->setBairro($result['bairro']);
                    $forne->setCidade($result['cidade']);
                    $forne->setUf($result['uf']);
                    $forne->setCep($result['cep']);
                    $forne->setRepresentante($result['representante']);
                    $forne->setEmail($result['email']);
                    $forne->setTelFixo($result['telFixo']);
                    $forne->setTelCel($result['telCel']);

                    $lista[$a] = $forne;
                    $a++;
                } while ($result = mysqli_fetch_array($query));
            }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }   

}
