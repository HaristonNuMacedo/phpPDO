<?php

class Endereco {

    private $idEndereco;
    private $cep;
    private $logradouro;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;


    /**
     * Get the value of idEndereco
     */ 
    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

    /**
     * Set the value of idEndereco
     *
     * @return  self
     */ 
    public function setIdEndereco($idEndereco)
    {
        $this->idEndereco = $idEndereco;

        return $this;
    }

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of logradouro
     */ 
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set the value of logradouro
     *
     * @return  self
     */ 
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get the value of complemento
     */ 
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @return  self
     */ 
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of uf
     */ 
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */ 
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }
}