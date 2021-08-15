<?php
ob_start();
session_start();

if((!isset($_SESSION['loginp']) || !isset($_SESSION['nomep'])) ||
        !isset($_SESSION['perfilp']) || !isset($_SESSION['nr']) ||
        ($_SESSION['nr'] != $_SESSION['confereNr'])) { 
    // Usuário não logado! Redireciona para a página de login 
    header("Location: sessionDestroy.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>AMD CADASTROS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Responsivos e Desing visual -->
    <link rel="stylesheet" href="../_css/UserPageStyle copy.css">
    <link rel="stylesheet" href="../_css/responsivoSeason3.css">
    <link rel="stylesheet" href="../_css/responsivoIMG.css">
    <link rel="stylesheet" href="../_css/responsivoForm.css">
    <link rel="sorcut icon" href="../img/logo-amd-black.png" type="../image/png" style="width: 16px; height: 16px;">
</head>

<body style="background-color:rgb(230, 230, 230) ;">

    <!-- MENU DO SITE -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 0px;">
        <div class="container-fluid">

          <a class="navbar-brand" href="#" style="font-size: 30px;"><img src="../img/amd-white-logo-1260x709.png" 
                style="width: 130px; height: 31px; margin-left: 10px; margin-top: -8px;"></a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
              <ul class="navbar-nav" style="margin-left: 10px;">
                <button type="button" class="btn btn-secondary" style="background-color: transparent; margin-left: 10px;">
                  <a href="#processor" style="text-decoration: none; color: white;">Processamento Engine</a></button>

                <button type="button" class="btn btn-secondary" style="background-color: transparent; margin-left: 10px;">
                  <a href="#graphics" style="text-decoration: none; color: white;">Diretório Gráfico</a></button>

                <button type="button" class="btn btn-secondary" style="background-color: transparent; margin-left: 10px;">
                  <a href="#servicos" style="text-decoration: none; color: white;">Nossos Serviços</a></button>

                </div>
              </ul>
          </div>
        </div>

        <!-- Menu User (Mostrando as informações básicas do usuário) -->

        
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false" style="padding: 0px; margin: 0px;">
                <span class="account-user-avatar"> 
                    <img src="../img/user.png" alt="user-image" class="rounded-circle" width="40px" height="40px" style="background-color: white; border: 1px solid white;">
                </span>
                <span>
                    <span class="account-user-name" style="color: white;">
                        <?php echo $_SESSION['nomep'];?>
                    </span>
                    <span class="account-position">
                        <?php
                            if($_SESSION['perfilp'] == "Cliente"){
                                echo "<span style='color: background-color:rgb(58, 96, 201)';>
                                CLIENT USER</span>";
                            }else{
                                echo "<span style='color: background-color:rgb(58, 96, 201)';>
                                EMPLOYEE</span>";
                            }
                        ?>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" style="height: 220px;">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit me-1"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lifebuoy me-1"></i>
                    <span>Support</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock-outline me-1"></i>
                    <span>Lock Screen</span>
                </a>

                <!-- item-->
                <div class="SairDiv">
                  <a href="./sessionDestroy.php" class="SairLogin">
                    <i class="mdi mdi-lock-outline me-1"></i> 
                    <span>Logout...&#8608;</span>
                  </a>
                </div>

            </div>
        </li>    
                          
      </nav>
        

      <!-- 2° SESSÃO DO SITE -->

        <section class="season2" style="background-color: #212529; margin-top: 60px; padding-top: 16px;">
            <p>&#9660; CADASTROS &#9660;</p>
        </section>

        <div class="container">

            <div class="row" style="background-color:rgb(230, 230, 230); padding-top: 50px; padding-bottom: 50px;">
                <div class="col-lg-4">
                    <img class="bd-placeholder-img" width="100" height="100" src="../img/users.png" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
            
                    <h2>Cadastro Pessoa</h2>
                    <p></p>
                    <p><a href="../view/cadastroPessoa.php" class="btn btn-secondary" 
                        style="padding: 10px 20px;">SAIBA MAIS &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <img class="bd-placeholder-img" width="100" height="100" src="../img/box.png" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
            
                    <h2>Cadastro Produto</h2>
                    <p></p>
                    <p><a href="../view/cadastroProduto.php" class="btn btn-secondary" 
                        style="padding: 10px 20px;">SAIBA MAIS &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <img class="bd-placeholder-img" width="100" height="100" src="../img/gear.png" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
            
                    <h2>Cadastro Fornecedor</h2>
                    <p></p>
                    <p><a href="../view/cadastroFornecedor.php" class="btn btn-secondary" 
                        style="padding: 10px 20px;">SAIBA MAIS &raquo;</a></p>
                </div>
            </div>       
        </div>

        <section class="season2" style="background-color: #212529; margin-top: 16px; padding-top: 16px; margin-bottom: 50px;">
            <p>&#9650; CADASTROS &#9650;</p>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>
</body>

</html>