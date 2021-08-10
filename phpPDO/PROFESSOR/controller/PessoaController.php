<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/dao/daoPessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/endereco.php';

class PessoaController {

    public function inserirPessoa($cep, $logradouro, $comple, $bair, $cida, $uf, 
        $nome, $nasc, $lo, $se, $per, $email, $cpf){
        
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($nasc);
        $pessoa->setLogin($lo);
        $pessoa->setSenha($se);
        $pessoa->setPerfil($per);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);

        $end = new Endereco();
        $end->setCep($cep);
        $end->setLogradouro($logradouro);
        $end->setComplemento($comple);
        $end->setBairro($bair);
        $end->setCidade($cida);
        $end->setUf($uf);

        $pessoa->setFkEndereco($end);

        $daoP = new DaoPessoa();
        return $daoP->inserirPessoaDAO($pessoa);
    }

    public function listarPessoas(){
        $daoP = new DaoPessoa();
        return $daoP->listarPessoasDAO();
    }

    public function atualizarPessoa($cep, $logradouro, $comple, $bair, $cida, $uf, 
        $idPs, $nome, $nasc, $lo, $se, $per, $email, $cpf){
        
        $pessoa = new Pessoa();
        $pessoa->setIdpessoa($idPs);
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($nasc);
        $pessoa->setLogin($lo);
        $pessoa->setSenha($se);
        $pessoa->setPerfil($per);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);

        $end = new Endereco();
        $end->setCep($cep);
        $end->setLogradouro($logradouro);
        $end->setComplemento($comple);
        $end->setBairro($bair);
        $end->setCidade($cida);
        $end->setUf($uf);

        $pessoa->setFkEndereco($end);

        $daoP = new DaoPessoa();
        return $daoP->atualizarFornecedorDAO($pessoa);
    }

    public function pesquisarPessoaId($id){
        $daoPs = new DaoPessoa();
        return $daoPs->pesquisarPessoaIdDAO($id);
    }

    public function excluirPessoa($id){
        $daoP = new DaoPessoa();
        return $daoP->excluirPessoaDAO($id);
    }

    /*public function validarLogin($login, $senha){
        $daoP = new DaoPessoa();
        return $daoP->validarLoginDAO($login, $senha);
    }*/
}