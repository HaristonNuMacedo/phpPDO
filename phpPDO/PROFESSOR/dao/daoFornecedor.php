<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/bd/conecta.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/fornecedor.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';

class DaoFornecedor {
    
    public function inserirFornecedorDAO(Fornecedor $forne){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $nomeFornecedor = $forne->getNomeFornecedor();
            $Logradouro = $forne->getLogradouro();
            $Complemento = $forne->getComplemneto();
            $Bairro = $forne->getBairro();
            $Cidade = $forne->getCidade();
            $Uf = $forne->getUf();
            $Cep = $forne->getCep();
            $Representante = $forne->getRepresentante();
            $Email = $forne->getEmail();
            $TelFixo = $forne->getTelFixo();
            $TelCel = $forne->getTelCel();
            try {
                $stmt = $conecta->prepare("insert into fornecedor values "
                        . "(null,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeFornecedor);
                $stmt->bindParam(2, $Logradouro);
                $stmt->bindParam(3, $Complemento);
                $stmt->bindParam(4, $Bairro);
                $stmt->bindParam(5, $Cidade);
                $stmt->bindParam(6, $Uf);
                $stmt->bindParam(7, $Cep);
                $stmt->bindParam(8, $Representante);
                $stmt->bindParam(9, $Email);
                $stmt->bindParam(10, $TelFixo);
                $stmt->bindParam(11, $TelCel);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
    //método para atualizar dados da tabela fornecedor
    public function atualizarFornecedorDAO(Fornecedor $forne){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $IdFornecedor = $forne->getIdFornecedor();
            $nomeFornecedor = $forne->getNomeFornecedor();
            $Logradouro = $forne->getLogradouro();
            $Complemento = $forne->getComplemneto();
            $Bairro = $forne->getBairro();
            $Cidade = $forne->getCidade();
            $Uf = $forne->getUf();
            $Cep = $forne->getCep();
            $Representante = $forne->getRepresentante();
            $Email = $forne->getEmail();
            $TelFixo = $forne->getTelFixo();
            $TelCel = $forne->getTelCel();
            try {
                $stmt = $conecta->prepare("update fornecedor set nomeFornecedor = ?, logradouro = ?, "
                        . "complemento = ?, bairro = ?, cidade = ?, uf = ?, cep = ?, representante = ?, email = ?, "
                        . "telFixo = ?, telCel = ? where idFornecedor = ?");
                $stmt->bindParam(1, $nomeFornecedor);
                $stmt->bindParam(2, $Logradouro);
                $stmt->bindParam(3, $Complemento);
                $stmt->bindParam(4, $Bairro);
                $stmt->bindParam(5, $Cidade);
                $stmt->bindParam(6, $Uf);
                $stmt->bindParam(7, $Cep);
                $stmt->bindParam(8, $Representante);
                $stmt->bindParam(9, $Email);
                $stmt->bindParam(10, $TelFixo);
                $stmt->bindParam(11, $TelCel);
                $stmt->bindParam(12, $IdFornecedor);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
    //método para carregar lista de fornecedors do banco de dados
    public function listarFornecedoresDAO(){
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if($conecta){
            try {
                $rs = $conecta->query("select * from fornecedor");
                $lista = array();
                $a = 0;
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $fornecedor = new Fornecedor();
                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setLogradouro($linha->logradouro);
                            $fornecedor->setComplemneto($linha->complemento);
                            $fornecedor->setBairro($linha->bairro);
                            $fornecedor->setCidade($linha->cidade);
                            $fornecedor->setUf($linha->uf);
                            $fornecedor->setCep($linha->cep);
                            $fornecedor->setRepresentante($linha->representante);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTelFixo($linha->telFixo);
                            $fornecedor->setTelCel($linha->telCel);
                            
                            $lista[$a] = $fornecedor;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;           
            return $lista;
        }
    }
    
    //método para excluir fornecedor na tabela fornecedor
    public function excluirFornecedorDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if($conecta){
             try {
                $stmt = $conecta->prepare("delete from fornecedor "
                        . "where idFornecedor = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                        . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
        }
        $conn = null;
        return $msg;
    }
    
    //método para os dados de fornecedor por id
    public function pesquisarFornecedorIdDAO($id){
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $fornecedor = new Fornecedor();
        if($conecta){
            try {
                $rs = $conecta->prepare("select * from fornecedor where "
                        . "idFornecedor = ?");
                $rs->bindParam(1, $id);
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setLogradouro($linha->logradouro);
                            $fornecedor->setComplemneto($linha->complemento);
                            $fornecedor->setBairro($linha->bairro);
                            $fornecedor->setCidade($linha->cidade);
                            $fornecedor->setUf($linha->uf);
                            $fornecedor->setCep($linha->cep);
                            $fornecedor->setRepresentante($linha->representante);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTelFixo($linha->telFixo);
                            $fornecedor->setTelCel($linha->telCel);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutino01/cadastroFornecedor.php'\">"; 
        }
        return $fornecedor;
    }  
}
