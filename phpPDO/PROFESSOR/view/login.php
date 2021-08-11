<?php
session_start();
if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = "";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            .espaco{
                padding: 10px;
            }
        </style>

        <!-- SweetAlert -->
        <script src="sweetalert2.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">

    </head>
    <body>

    <?php
        /*if (isset($_POST['enviar'])){
            include_once '../dao/daoPessoa.php';
            
            $login = trim($_POST['login']);
            $senha = $_POST['senha'];
            //$senha = md5($senhaSemCriptografia);
            //echo "Senha:".$senha."<br>";
            
            $dp = new DaoPessoa();
            $check = $dp->procurarsenha($login, $senha);
            if ($check == 1){
                
                header("Location: EscolherCadastro.php");
                
            }else{
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                    URL='http://localhost/phpPDO/phpPDO/PROFESSOR/view/login.php'\">";
                
                echo "<script>
                    Swal.fire({
                            title: 'Login ou senha não encontrados!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    </script>";
            }

        }*/
        
        
        ?>
        <div class="container">
            <div class="row espaco">
                <div class=" col-md-6 offset-md-3"
                     style="margin-top: 10%;">
                    <div class="card-header bg-primary border espaco
                         text-white text-center">Validação de Login</div>
                    <div class="card-body border">
                        <form method="post" action="../controller/validaLogin.php">
                            <div class="row espaco">
                            <?php 
                            if ($_SESSION['msg'] != "") {
                            echo $_SESSION['msg'];
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='login.php'\">"; 
                                $_SESSION['msg'] = "";
                            }
                            ?>
                                <div class="col-md-8 offset-md-2 ">
                                    <label>Usuário</label>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-8 offset-md-2 ">
                                    <input class="form-control" type="text" name="login">
                                </div>    
                            </div>
                            <div class="row espaco">
                                <div class="col-md-8 offset-md-2 ">
                                    <label>Senha</label>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-8 offset-md-2 ">
                                    <input class="form-control" type="text" name="senha">
                                </div>    
                            </div>
                            <div class="row espaco" style="margin-top: 20px;">
                                <div class="col-md-8 offset-md-2 ">
                                    <input class="btn btn-success" type="submit" name="enviar" value="Enviar"> 
                                    <input class="btn btn-light" type="reset" value="Limpar">
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
