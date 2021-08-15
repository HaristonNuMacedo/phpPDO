<?php
ob_start();
session_start();
if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
	//redireciona para a página inicial.
	header("Location: ../view/EscolherCadastro.php"); exit;
}
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/dao/daoLogin.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';

    if(isset($_POST)){
        $login = $_POST['login'];
        $senha = $_POST['senha'];
    }else{
        header("Location: ../view/EscolherCadastro.php"); exit;
    }

    $daoLogin = new DaoLogin();
    $resp = new Pessoa();
    $resp = $daoLogin->validarLoginDAO($login, $senha);

    //echo gettype($resp);
    if (gettype($resp) == "object") {
        if (!isset($_SESSION['login'])) {
            $_SESSION['loginp'] = $resp->getLogin();
            $_SESSION['idp'] = $resp->getIdpessoa();
            $_SESSION['nomep'] = $resp->getNome();
            $_SESSION['perfilp'] = $resp->getPerfil();

            $_SESSION['nr'] = rand(1,1000000);
            $_SESSION['confereNr'] = $_SESSION['nr'];
            //echo($_SESSION['nr'])."<br>";
            //echo($_SESSION['confereNr'])."<br>";
            header("location: ../view/EscolherCadastro.php");
            exit;
        }
    } else {
        $_SESSION['msg'] = $resp; 
        if(isset($_SESSION['loginp'])){
            $_SESSION['loginp'] = null;
            $_SESSION['idp'] = null;
            $_SESSION['nomep'] = null;
            $_SESSION['perfilp'] = null;
        }
        header("location: ../view/login.php");
        exit;
    }

