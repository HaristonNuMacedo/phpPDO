<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/dao/daoPessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/endereco.php';

class PessoaController {

    public function inserirPessoa($nome, $nasc, $lo, $se, $per, $email, $cpf, 
                $cep, $logradouro, $comple, $bair, $cida, $uf){
        
        $end = new Endereco();
        $end->setCep($cep);
        $end->setLogradouro($logradouro);
        $end->setComplemento($comple);
        $end->setBairro($bair);
        $end->setCidade($cida);
        $end->setUf($uf);

        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($nasc);
        $pessoa->setLogin($lo);
        $pessoa->setSenha($se);
        $pessoa->setPerfil($per);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);

        $pessoa->setFkEndereco($end);

        $daoP = new DaoPessoa();
        return $daoP->inserirPessoaDAO($pessoa);
    }

    public function listarPessoas(){
        $daoP = new DaoPessoa();
        return $daoP->listarPessoasDAO();
    }

}