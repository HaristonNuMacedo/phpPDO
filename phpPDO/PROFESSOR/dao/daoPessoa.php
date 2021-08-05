<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/bd/conecta.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/fornecedor.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/endereco.php';


class DaoPessoa
{

    public function inserirPessoaDAO(Pessoa $pessoa)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {

            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getLogin();
            $senha = $pessoa->getSenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();

            $cep = $pessoa->getFkEndereco()->getCep();
            $logradouro = $pessoa->getFkEndereco()->getLogradouro();
            $complemento = $pessoa->getFkEndereco()->getComplemento();
            $bairro = $pessoa->getFkEndereco()->getBairro();
            $cidade = $pessoa->getFkEndereco()->getCidade();
            $uf = $pessoa->getFkEndereco()->getUf();

            try {
                //processo para pegar o idendereco da tabela endereco, conforme 
                //o cep, o logradouro e o complemento informado.
                $st = $conecta->prepare("select idEndereco "
                    . "from endereco where cep = ? and "
                    . "logradouro = ? and complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);
                if ($st->execute()) {
                    if ($st->rowCount() > 0) {
                        //$msg->setMsg("".$st->rowCount());
                        while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                            $fkEnd = $linha->idEndereco;
                        }
                        //$msg->setMsg("$fkEnd");
                    } else {
                        $st2 = $conecta->prepare("insert into "
                            . "endereco values (null,?,?,?,?,?,?)");
                            //TEM QUE ESTAR NA MESMA ORDEM DO BANCO DE DADOS
                        $st2->bindParam(1, $cep);
                        $st2->bindParam(2, $logradouro);
                        $st2->bindParam(3, $complemento);
                        $st2->bindParam(4, $bairro);
                        $st2->bindParam(5, $cidade);       
                        $st2->bindParam(6, $uf);
                        $st2->execute();

                        $st3 = $conecta->prepare("select idEndereco "
                            . "from endereco where cep = ? and "
                            . "logradouro = ? and complemento = ? limit 1");
                        $st3->bindParam(1, $cep);
                        $st3->bindParam(2, $logradouro);
                        $st3->bindParam(3, $complemento);
                        if ($st3->execute()) {
                            if ($st3->rowCount() > 0) {
                                $msg->setMsg("" . $st3->rowCount());
                                while ($linha = $st3->fetch(PDO::FETCH_OBJ)) {
                                    $fkEnd = $linha->idEndereco;
                                }
                                //$msg->setMsg("$fkEnd");
                            }
                        }
                    }

                    //processo para inserir dados de pessoa
                    $stmt = $conecta->prepare("insert into pessoa values "
                        . "(null,?,?,?,?,?,?,?,?)");

                    $stmt->bindParam(1, $nome);
                    $stmt->bindParam(2, $dtNasc);
                    $stmt->bindParam(3, $login);
                    $stmt->bindParam(4, $senha);
                    $stmt->bindParam(5, $perfil);
                    $stmt->bindParam(6, $email);
                    $stmt->bindParam(7, $cpf);
                    $stmt->bindParam(8, $fkEnd);
                    $stmt->execute();
                }

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


    public function listarPessoasDAO()
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("select * from pessoa inner join endereco "
                    . "on pessoa.fkEndereco = endereco.idEndereco "
                    . "order by pessoa.idPessoa");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
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


    }


    public function atualizarFornecedorDAO(Pessoa $pessoa)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idPessoa = $pessoa->getIdpessoa();
            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getLogin();
            $senha = $pessoa->getSenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();

            $cep = $pessoa->getFkEndereco()->getCep();
            $logradouro = $pessoa->getFkEndereco()->getLogradouro();
            $complemento = $pessoa->getFkEndereco()->getComplemento();
            $bairro = $pessoa->getFkEndereco()->getBairro();
            $cidade = $pessoa->getFkEndereco()->getCidade();
            $uf = $pessoa->getFkEndereco()->getUf();

            try {
                //processo para pegar o idendereco da tabela endereco, conforme 
                //o cep, o logradouro e o complemento informado.
                $st = $conecta->prepare("select idEndereco "
                    . "from endereco where cep = ? and "
                    . "logradouro = ? and complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);
                if ($st->execute()) {
                    if ($st->rowCount() > 0) {
                        //$msg->setMsg("".$st->rowCount());
                        while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                            $fkEnd = $linha->idEndereco;
                        }
                        //$msg->setMsg("$fkEnd");
                    } else {
                        $st2 = $conecta->prepare("insert into "
                            . "endereco values (null,?,?,?,?,?,?)");
                            //TEM QUE ESTAR NA MESMA ORDEM DO BANCO DE DADOS
                        $st2->bindParam(1, $cep);
                        $st2->bindParam(2, $logradouro);
                        $st2->bindParam(3, $complemento);
                        $st2->bindParam(4, $bairro);
                        $st2->bindParam(5, $cidade);       
                        $st2->bindParam(6, $uf);
                        $st2->execute();    
                        $st3 = $conecta->prepare("select idEndereco "
                            . "from endereco where cep = ? and "
                            . "logradouro = ? and complemento = ? limit 1");
                        $st3->bindParam(1, $cep);
                        $st3->bindParam(2, $logradouro);
                        $st3->bindParam(3, $complemento);
                        if ($st3->execute()) {
                            if ($st3->rowCount() > 0) {
                                $msg->setMsg("" . $st3->rowCount());
                                while ($linha = $st3->fetch(PDO::FETCH_OBJ)) {
                                    $fkEnd = $linha->idEndereco;
                                }
                                //$msg->setMsg("$fkEnd");
                            }
                        }
                    }
                    $stmt = $conecta->prepare("update pessoa set "
                        . "nome = ?, dtNasc = ?, login = ?, senha = ?, "
                        . "perfil = ?, email = ?, cpf = ?, fkEndreco = ? "
                        . "where idPessoa = ?");

                    $stmt->bindParam(1, $nome);
                    $stmt->bindParam(2, $dtNasc);
                    $stmt->bindParam(3, $login);
                    $stmt->bindParam(4, $senha);
                    $stmt->bindParam(5, $perfil);
                    $stmt->bindParam(6, $email);
                    $stmt->bindParam(7, $cpf);
                    $stmt->bindParam(8, $fkEnd);
                    $stmt->bindParam(9, $idPessoa);

                    $stmt->execute();
                } 

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

        public function pesquisarPessoaIdDAO($id)
        {
            $conn = new Conecta();
            $conecta = $conn->conectadb();
            $msg = new Mensagem();
            if ($conecta) { 
                try {
                    $rs = $conecta->prepare("select * from pessoa inner join endereco "
                        . " on pessoa.fkEndereco = endereco.idEndereco "
                        . " where pessoa.idPessoa = ? limit 1");
                    $rs->bindParam(1, $id);
                    if ($rs->execute()) {
                        if ($rs->rowCount() > 0) {
                            while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
    
                                $endereco = new Endereco();
                                $endereco->setCep($linha->idEndereco);
                                $endereco->setCep($linha->cep);
                                $endereco->setLogradouro($linha->logradouro);
                                $endereco->setComplemento($linha->complemento);
                                $endereco->setBairro($linha->bairro);
                                $endereco->setCidade($linha->cidade);
                                $endereco->setUf($linha->uf);
    
                                $pessoa = new Pessoa();
                                $pessoa->setIdpessoa($linha->idPessoa);
                                $pessoa->setNome($linha->nome);
                                $pessoa->setDtNasc($linha->dtNasc);
                                $pessoa->setLogin($linha->login);
                                $pessoa->setSenha($linha->senha);
                                $pessoa->setPerfil($linha->perfil);
                                $pessoa->setEmail($linha->email);
                                $pessoa->setCpf($linha->cpf);

                                $pessoa->setFkEndereco($endereco);
                            }
                        }
                    }
                } catch (Exception $ex) {
                    $msg->setMsg($ex);
                }
                $conn = null;
            } else {
                echo "<script>alert('Banco inoperante!')</script>";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                URL='http://localhost/phpPDO/phpPDO/PROFESSOR/view/cadastroPessoa.php\">";
        }
            return $pessoa;
        }
                
}

