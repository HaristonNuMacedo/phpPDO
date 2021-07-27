<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/dao/daoFornecedor.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/fornecedor.php';

class FornecedorController {
    
    public function inserirFornecedor($nomeFornecedor, $logradouro, $numero, $complemneto,
                $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel){

        $forne = new Fornecedor();
        $forne->setNomeFornecedor($nomeFornecedor);
        $forne->setLogradouro($logradouro);
        $forne->setNumero($numero);
        $forne->setComplemneto($complemneto);
        $forne->setBairro($bairro);
        $forne->setCidade($cidade);
        $forne->setUf($uf);
        $forne->setCep($cep);
        $forne->setRepresentante($representante);
        $forne->setEmail($email);
        $forne->setTelFixo($telFixo);
        $forne->setTelCel($telCel);
        
        $daofORNE = new DaoFornecedor();
        return $daofORNE->inserirFornecedorDAO($forne);
    }

    //método para carregar a lista de produtos que vem da DAO
    public function listarFornecedores(){
        $daofORNE = new DaoFornecedor();
        return $daofORNE->listarFornecedoresDAO();
    }

    //método para retornar objeto produto com os dados do BD
    public function pesquisarFornecedorId($id){
        $daofORNE = new DaoFornecedor();
        return $daofORNE->pesquisarFornecedorIdDAO($id);
    }

    public function atualizarFornecedor($nomeFornecedor, $logradouro, $numero, $complemneto,
                $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel, $id){

        $forne = new Fornecedor();
        $forne->setNomeFornecedor($nomeFornecedor);
        $forne->setLogradouro($logradouro);
        $forne->setNumero($numero);
        $forne->setComplemneto($complemneto);
        $forne->setBairro($bairro);
        $forne->setCidade($cidade);
        $forne->setUf($uf);
        $forne->setCep($cep);
        $forne->setRepresentante($representante);
        $forne->setEmail($email);
        $forne->setTelFixo($telFixo);
        $forne->setTelCel($telCel);
        $forne->setIdFornecedor($id);
        
        $daoForne= new DaoFornecedor();
        return $daoForne->atualizarFornecedorDAO($forne);
    }

    //método para excluir produto
    public function excluirProduto($id){
        $daoForne = new DaoFornecedor();
        return $daoForne->excluirFornecedorDAO($id);
    }
}