<?php

class Produto {
    
    private $idProduto;
    private $nomeProduto;
    private $vlrCompra;
    private $vlrVenda;
    private $qtdEstoque;
    
    function getIdProduto() {
        return $this->idProduto;
    }

    function getNomeProduto() {
        return $this->nomeProduto;
    }

    function getVlrCompra() {
        return $this->vlrCompra;
    }

    function getVlrVenda() {
        return $this->vlrVenda;
    }

    function getQtdEstoque() {
        return $this->qtdEstoque;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }

    function setVlrCompra($vlrCompra) {
        $this->vlrCompra = $vlrCompra;
    }

    function setVlrVenda($vlrVenda) {
        $this->vlrVenda = $vlrVenda;
    }

    function setQtdEstoque($qtdEstoque) {
        $this->qtdEstoque = $qtdEstoque;
    }
}
