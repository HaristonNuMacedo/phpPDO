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
                        . "perfil = ?, email = ?, cpf = ?, fkEndereco = ? "
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
            $pessoa = new Pessoa();
            $end = new Endereco();
            if ($conecta) { 
                try {
                    $rs = $conecta->prepare("select * from pessoa inner join endereco "
                        . " on pessoa.fkEndereco = endereco.idEndereco "
                        . " where pessoa.idPessoa = ? limit 1");
                    $rs->bindParam(1, $id);
                    if ($rs->execute()) {
                        if ($rs->rowCount() > 0) {
                            while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
    
                                $pessoa->setIdPessoa($linha->idPessoa);
                                $pessoa->setNome($linha->nome);
                                $pessoa->setDtNasc($linha->dtNasc);
                                $pessoa->setLogin($linha->login);
                                $pessoa->setSenha($linha->senha);
                                $pessoa->setPerfil($linha->perfil);
                                $pessoa->setEmail($linha->email);
                                $pessoa->setCpf($linha->cpf);

                                $end->setIdEndereco($linha->idEndereco);
                                $end->setCep($linha->cep);
                                $end->setLogradouro($linha->logradouro);
                                $end->setComplemento($linha->complemento);
                                $end->setBairro($linha->bairro);
                                $end->setCidade($linha->cidade);
                                $end->setUf($linha->uf);

                                $pessoa->setFkEndereco($end);
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


        public function excluirPessoaDAO($id){
            $conn = new Conecta();
            $conecta = $conn->conectadb();
            $msg = new Mensagem();
            if($conecta){
                try {
                    $stmt = $conecta->prepare("delete from pessoa "
                            . "where idPessoa = ?");
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
           
        /*public function procurarsenha($login, $senha) {
        $pessoa = new Pessoa();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $check = null;
        echo $senha;
        if ($conecta) {
            try {
                $st = $conecta->prepare("select idPessoa from pessoa where " . "login = ? and senha = ? ");
                $st->bindParam(1, $login);
                $st->bindParam(2, $senha);
                if ($st->execute()) {

                    if ($st->rowCount() > 0) {
                        echo $st->rowCount();
                        $check =  true;
                    } else {
                        $check =  false;
                    }
                }
            } catch (Exception $ex) {
                echo $ex;
            }
            return $check;
            $conn = null;
        } else {


            echo "Sem conexão com o banco";
        }
    }*/


    /* PROCEDURE <EXEMPLO> 

    delimiter $$
    drop procedure if existes insCadastroPessoa

    create procedure insCadastroPessoa
    (nomeP varchar(100), dtNascP date, loginP varchar(100), senhaP varchar(100),
        perfilP varchar(50), emailP varchar(100), cpfP varchar(20),
        cepP varchar(10), logradouroP varchar(100), complementoP varchar(100), 
        bairroP varchar(50), cidadeP varchar(50), ufP(2), out msg text);
    
    begin

        declare idx int(11) default -1;
        declare idp int(11) default 0;

        select idPessoa into idp from pessoa where cpf = cpfP;
        if(idp > 0) then
            set msg = "Usuário já Cadastrado anteriormente!"
        else
        select idEndereco into idx from endereco where logradouro = logradouroP
        and complemento = complementoP and cep = cepP;
        if(idx = -1) then
            insert into endereco values (null, cepP, logradouroP, complementoP, bairroP,
                cidadeP, ufP);
            select idEndereco into idx from endereco where logradouro = logradouroP
                and complemento = complementoP and cep = cepP;
        end if

        insert into pessoa values (null, nomeP, dtNascP, loginP, md5(senhaP), perfilP,
            emailP, cpfP, idx);
        set msg = "Dados galados com sucesso!!";
        select msg;
        select * from pessoa inner join endereco on fkEndereco = idEndereco;

    end if
        select msg;
    end $$
    delimiter ;

    call insCadastroPessoa ("HaristinNuMacedo", "2001-01-02", "testiado", "12345", "cliente",
        "joãozinhoteste2001@gmail.com", "068.455.031-84", 
        "71258-385", "quadra 04 conjunto 07", "casa 11", "Setor Norte(Estrutural)", "Brasília", "DF", out msg);
    */
}

