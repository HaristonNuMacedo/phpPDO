<?php

class Fornecedor {
    private $idFornecedor;
    private $nomeFornecedor;
    private $logradouro;
    private $numero;
    private $complemneto;
    private $bairro;
    private $cidade;
    private $uf;
    private $cep;
    private $representante;
    private $email;
    private $telFixo;
    private $telCel;


    /**
     * Get the value of idFornecedor
     */ 
    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    /**
     * Set the value of idFornecedor
     *
     * @return  self
     */ 
    public function setIdFornecedor($idFornecedor)
    {
        $this->idFornecedor = $idFornecedor;

        return $this;
    }

    /**
     * Get the value of nomeFornecedor
     */ 
    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    /**
     * Set the value of nomeFornecedor
     *
     * @return  self
     */ 
    public function setNomeFornecedor($nomeFornecedor)
    {
        $this->nomeFornecedor = $nomeFornecedor;

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
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of complemneto
     */ 
    public function getComplemneto()
    {
        return $this->complemneto;
    }

    /**
     * Set the value of complemneto
     *
     * @return  self
     */ 
    public function setComplemneto($complemneto)
    {
        $this->complemneto = $complemneto;

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
     * Get the value of representante
     */ 
    public function getRepresentante()
    {
        return $this->representante;
    }

    /**
     * Set the value of representante
     *
     * @return  self
     */ 
    public function setRepresentante($representante)
    {
        $this->representante = $representante;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telFixo
     */ 
    public function getTelFixo()
    {
        return $this->telFixo;
    }

    /**
     * Set the value of telFixo
     *
     * @return  self
     */ 
    public function setTelFixo($telFixo)
    {
        $this->telFixo = $telFixo;

        return $this;
    }

    /**
     * Get the value of telCel
     */ 
    public function getTelCel()
    {
        return $this->telCel;
    }

    /**
     * Set the value of telCel
     *
     * @return  self
     */ 
    public function setTelCel($telCel)
    {
        $this->telCel = $telCel;

        return $this;
    }
}

?>