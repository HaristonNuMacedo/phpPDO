<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Faça seu Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    
    <link rel='stylesheet' href='../_css/LoginAcademy.css'>
    <link rel="sorcut icon" href="../img/logo-amd-black.png" type="image/png" style="width: 16px; height: 16px;">
</head>
<body>
    <?php
        if (isset($_POST['enviar'])){
            include_once '../dao/daoPessoa.php';
            
            $login = trim($_POST['login']);
            $senha = $_POST['senha'];
            //$senha = md5($senhaSemCriptografia);
            //echo "Senha:".$senha."<br>";
            
            $dp = new DaoPessoa();
            $check = $dp->procurarsenha($login, $senha);
            if ($check == 1){
                
                header("Location: UserPage.html");
                
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

        }
    ?>

    <!-- Menu de Volta -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 70px;">
        <div class="container-fluid">

          <a class="navbar-brand" href="index.html" style="font-size: 30px;"><img src="../img/amd-white-logo-1260x709.png" 
                style="width: 130px; height: auto; margin-left: 10px; margin-top: -15px;"></a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        </div>
        <div class="LoginForm">

            <label style="color: white; text-decoration: none; font-size: 20px; margin-top: 4px;">Caso não tenha efetuado o seu cadastro e acesse aqui! <span>&#10174;</span></label>
            <button type="button" class="btn btn-secondary" style="background-color: transparent; margin-left: 10px;">
            <a href="../view/cadastroPessoa.php" style="text-decoration: none; color: white;">CADASTRE</a></button>

          </div>
      </nav>

    <img src="../img/diferentes-tipos-de-processadores-amd-1-.jpg" class="d-block w-100" alt="...">


    <form class="formLogin">
        <h3></h3>
        <label class="titulo">LOGIN</label>
        <h4></h4>

        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="login" style="padding-left: 40px;">
            <img src="../img/userLogin.png" class="imgUser">
            <label for="floatingInput" class="EmalAdd">Login</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="senha" style="padding-left: 40px;">
            <img src="../img/padlock.png" class="imgPudle">
            <label for="floatingPassword" class="PassWord">Password</label>
        </div>

        <input type="checkbox" class="OTest" onclick="mostrarSenha()"><label class="text002">Mostrar Senha.</label>

            <script src="../js/MostrarSenha.js"></script>

        <h5></h5>
        <section class="buttons"><button class="draw">
            <input class="btn" type="submit" name="enviar" value="Acessar" style="font-size: 26px;"> </button>
    </form>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>

</body>
</html>