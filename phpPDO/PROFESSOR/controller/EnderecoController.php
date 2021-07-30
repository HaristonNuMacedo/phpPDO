<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/dao/daoEndereco.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/endereco.php';

class EnderecoController {

    public function inserirEndereco($cep, $logra, $comple, $bairro, $cida, $uf){

        $end = new Endereco();
        $end->setCep($cep);
        $end->setLogradouro($logra);
        $end->setComplemento($comple);
        $end->setBairro($bairro);
        $end->setCidade($cida);
        $end->setUf($uf);

        $daoEnd = new DaoEndereco();
        return $daoEnd->inserirEndereco($end);

    }

    public function listarPessoas(){
        $daoEnd = new DaoEndereco();
        return $daoEnd->listarEnderecoDAO();
    }

}