<?php 
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/bd/conecta.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/fornecedor.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/endereco.php';


class DaoPessoa {
    
    public function inserirPessoaDAO(pessoa $ps){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $nome = $ps->getNome();
            $dtNasc = $ps->getDtNasc();
            $login = $ps->getLogin();
            $senha = $ps->getSenha();
            $perfil = $ps->getPerfil();
            $email = $ps->getEmail();
            $cpf = $ps->getCpf();
            $fkEndereco = $ps->getFkEndereco();
            try {
                $stmt = $conecta->prepare("START TRANSACTION; insert into "
                        . "endereco values (null, ?, ?, ?, ?, ?, ?); "
                        . "insert into pessoa values (null, ?, ?, ?, ?, ?, ?, ?, ?); COMMIT;");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $dtNasc);
                $stmt->bindParam(3, $login);
                $stmt->bindParam(4, $senha);
                $stmt->bindParam(5, $perfil);
                $stmt->bindParam(6, $email);
                $stmt->bindParam(7, $cpf);
                $stmt->bindParam(8, $fkEndereco); 
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


    public function listarPessoasDAO(){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try{
                $rs = $conecta->query("select * from pessoa");
                $lista = array();
                $a = 0;
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $pessoa = new Pessoa();
                            $pessoa->setIdPessoa($linha->idPessoa);
                            $pessoa->setNome($linha->nome);
                            $pessoa->setDtNasc($linha->dtNasc);
                            $pessoa->setLogin($linha->login);
                            $pessoa->setSenha($linha->senha);
                            $pessoa->setPerfil($linha->perfil);
                            $pessoa->setEmail($linha->email);
                            $pessoa->setCpf($linha->cpf);

                            $end = new Endereco();
                            $end->setIdEndereco($linha->idEndereco);
                            $end->setCep($linha->cep);
                            $end->setLogradouro($linha->logradouro);
                            $end->setComplemento($linha->complemento);
                            $end->setBairro($linha->bairro);
                            $end->setCidade($linha->cidade);
                            $end->setUf($linha->uf);

                            $pessoa->setFkEndereco($end);

                            $lista[$a] = $pessoa;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg = 'Lista Feita com primazia.';
                return $msg + $ex;
            }  
            $conn = null;
            return $lista;
        }
    
        /*
            Tabela pessoa 
            idPessoa - Int Primary key auto_increment
            nome - Varchar
            dtNasc - DATE
            login - varchar
            senha - varchar
            perfil - varchar
            email - varcahr
            cpf - varchar
            fkEndereco int

            Tabela endereco
            idEndereco - int
            cep - varchar
            logradouro - varchar
            complemento - varchar
            bairro - varchar
            cidade - varchar
            uf - varchar(2)

            START TRANSACTION; insert into endereco values (null, '71258385', 'kdsj02', 'naosei', 'teste', 'casadojõas', 'df'); insert into pessoa values (null, 'teste', '02-01-2001', 'tyest', 'logado12', 'umNada','Kabulozo005@gmail.com', '06845503184', '1'); COMMIT;
        */
    
    }

}