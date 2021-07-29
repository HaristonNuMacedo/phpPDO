<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/dao/daoPessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';

class PessoaController {

    public function inserirPessoa($nome, $nasc, $lo, $se, $per, $email, $cpf, $fkEnd){
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($nasc);
        $pessoa->setLogin($lo);
        $pessoa->setSenha($se);
        $pessoa->setPerfil($per);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
        $pessoa->setFkEndereco($fkEnd);

        $daoP = new DaoPessoa();
        return $daoP->inserirPessoaDAO($pessoa);
    }

    public function listarPessoas(){
        $daoP = new DaoPessoa();
        return $daoP->listarPessoasDAO();
    }

}