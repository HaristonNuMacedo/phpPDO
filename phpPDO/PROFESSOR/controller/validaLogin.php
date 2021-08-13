<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/dao/daoLogin.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';

    if (!empty($_POST) AND !isset($_POST) AND (empty($_POST['login']) 
        OR empty($_POST['senha']))) {
            //destroi as sessões e redireciona para a página inicial.
            header("Location: ../sessionDestroy.php"); exit;
    }

    $login = $_REQUEST['login'];
    $senha = $_REQUEST['senha'];

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
            header("location: ../view/EscolherCadastro.php");
        exit;
        }
    } else {
        $_SESSION['msg'] = $resp; 
        header("location: ../view/login.php");
        exit;
    }

