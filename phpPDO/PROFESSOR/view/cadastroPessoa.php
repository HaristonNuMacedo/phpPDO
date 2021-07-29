<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/PessoaController.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';

$msg = new Mensagem();
$ps = new Pessoa();

$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Pessoa</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            .btInput{
                padding: 10px 20px 10px 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .DivDados{
                border-top: 3px solid #353535;
                border-bottom: 3px solid #353535;
                height: 15px;
                margin: 15px 0px;
            }

            label{
                font-size: 1.1rem;
                font-weight: 600;
                margin-top: 10px;
            }
        </style>
    </head>
    <body style="background-color: rgb(212, 212, 212)">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row" style="margin-top: 30px;">
                <div class="col-8 offset-2">

                    <div class="card-header bg-dark text-center text-light"
                         style="padding-bottom: 15px; padding-top: 15px; font-size: 25px; border: 2px solid #252525;">
                        Cadastro de Cliente
                    </div>
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarPessoa'])) {
                        $nome = trim($_POST['nome']);
                        if ($nome != "") {
                            $dtNasc = $_POST['dtNasc'];
                            $login = $_POST['login'];
                            $senha = $_POST['senha'];
                            $perfil = $_POST['perfil'];
                            $cpf = $_POST['cpf'];
                            $email = $_POST['email'];
                            $fkEndereco = $_POST['Endereco'];

                            $pessoa = new PessoaController();
                                unset($_POST['cadastrarPessoa']);
                                $msg = $pessoa->inserirPessoa($nome, $dtNasc,
                                        $login, $perfil, $senha, $email, $cpf, $fkEndereco);
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroPessoa.php'\">";
                        }
                    }

                    ?>
                    <div class="card-body" style="border: 2px solid #252525;">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Código: </label> <br>
                                    <label>Nome Completo</label>  
                                    <input class="form-control" type="text" 
                                           name="nome" >
                                    <label>Data de Nascimento</label>  
                                    <input class="form-control" type="date" 
                                           name="dtNasc" >  
                                    <label>E-Mail</label>  
                                    <input class="form-control" type="email" 
                                           name="email" > 
                                    <label>CPF</label>  
                                    <input class="form-control" type="text" 
                                           name="cpf">
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <label>Login</label>  
                                    <input class="form-control" type="text" 
                                           name="login" >  
                                    <label>Senha</label>  
                                    <input class="form-control" type="password" 
                                           name="senha" > 
                                    <label>Conf. Senha</label>  
                                    <input class="form-control" type="password" 
                                           name="senha2"> 
                                    <label>Perfil</label>  
                                    <select name="perfil" class="form-control">
                                        <option>[--Selecione--]</option>
                                        <option >Cliente</option>
                                        <option >Funcionário</option>
                                    </select>
                                </div>
                            </div>

                            <div class="DivDados"></div>
                            <div class="card-header bg-dark text-center text-white border" 
                                style="padding-bottom: 15px; padding-top: 15px; font-size: 25px;">
                                    Endereço do cliente
                            </div>
                            <div class="col-12 ">
                                <div class="card-header text-start text-dark border">
                                    <label style="margin-top: 10px;">Código: </label><br>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <label>CEP</label><br>
                                            <input class="form-control" type="text" name="cep">
                                            <label>Logradouro</label>
                                            <input class="form-control" type="text" name="logradouro">
                                            <label>Complemento</label>
                                            <input class="form-control" type="text" name="complemento">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bairro</label>
                                            <input class="form-control" type="text" name="bairro">
                                            <label>Cidade</label>
                                            <input class="form-control" type="text" name="cidade">
                                            <label>UF</label>
                                            <input class="form-control" type="text" name="uf">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 offset-4">
                                <input type="submit" name="cadastrarPessoa"
                                       class="btn btn-success btInput" value="Enviar">
                                &nbsp;&nbsp;
                                <input type="reset" 
                                       class="btn btn-light btInput" value="Limpar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>