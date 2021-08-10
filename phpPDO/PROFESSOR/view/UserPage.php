<php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>AMD ACADEMIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Responsivos e Desing visual -->
    <link rel="stylesheet" href="../_css/UserPageStyle.css">
    <link rel="stylesheet" href="../_css/responsivoSeason3.css">
    <link rel="stylesheet" href="../_css/responsivoIMG.css">
    <link rel="stylesheet" href="../_css/responsivoForm.css">
    <link rel="sorcut icon" href="../img/logo-amd-black.png" type="../image/png" style="width: 16px; height: 16px;">
</head>

<body style="background-color: rgb(206, 206, 206);">

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
                    <span class="account-user-name" style="color: white;">Hariston AMD</span>
                    <span class="account-position">Founder</span>
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
                  <a href="index.html" class="SairLogin">
                    <i class="mdi mdi-lock-outline me-1"></i> 
                    <span>Logout...&#8608;</span>
                  </a>
                </div>

            </div>
        </li>    
                          
      </nav>


      <!-- 1° SESSÃO DO SITE APENAS COM IMAGENS -->
      <section class="season1"> 

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../img/ryzen-chip-copper-circuit-board-1260x709.webp" class="d-block w-100" alt="...">
              </div>

              <div class="carousel-item">
                <img src="../img/AMD-Radeon-RX-6800-XT-Black-Edition-Graphics-Card-1.jpg" class="d-block w-100" alt="...">
              </div> 

              <div class="carousel-item">
                <img src="../img/diferentes-tipos-de-processadores-amd-1-.jpg" class="d-block w-100" alt="...">
              </div>

              <div class="carousel-item">
                <img src="../img/369110-radeon-rx5500xt-1920x800.webp" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          
      </section>
        

      <!-- 2° SESSÃO DO SITE -->

        <section class="season2">
            <p>Veja mais Informações</p>
        </section>

        <div class="container">

            <div class="row" style="background-color: rgb(206, 206, 206);">
                <div class="col-lg-4">
                    <img class="bd-placeholder-img" width="100" height="100" src="../img/dumbbel.png" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
            
                    <h2>Heading</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <p><a class="btn btn-secondary" href="#">SAIBA MAIS &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <img class="bd-placeholder-img" width="100" height="100" src="../img/weight-lifting-levantamento.png" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
            
                    <h2>Heading</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                    <p><a class="btn btn-secondary" href="#">SAIBA MAIS &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <img class="bd-placeholder-img" width="100" height="100" src="../img/weight-plates.png" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
            
                    <h2>Heading</h2>
                    <p>And lastly this, the third column of representative placeholder content. We've moved on to the second column.</p>
                    <p><a class="btn btn-secondary" href="#">SAIBA MAIS &raquo;</a></p>
                </div>
            </div>       
        </div>



        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->

        <section class="mediumSeason">

          <hr class="featurette-divider" id="processor">

            <div class="row featurette" >
              <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, Processamento do melhor de sua máquina corporal. <span class="text-muted">Ryzen 5000.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
              </div>
              <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="../img/lisa-su-ceo-amd-youtube.jpg" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em"></text></img>
        
              </div>
            </div>
        
          <hr class="featurette-divider" id="graphics">
        
            <div class="row featurette" >
              <div class="col-md-7">
                <h2 class="featurette-heading">Best Graphic Body, o seu diretório corporal gráfico em ótimos sistemas. <span class="text-muted">Radeon RX6000.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
              </div>
              <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="../img/lisa-su-radeon-vii.jpg" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em"></text></img>
        
              </div>
            </div>
        
          <hr class="featurette-divider">
      </section>

        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->



        <!-- 3° SESSÃO DO SITE -->

        <section class="season3" id="servicos">
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Iniciante</h4>
                    </div>

                    <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$50<small class="text-muted fw-light">/reais</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>10 users included</li>
                        <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                    </div>
                </div>
                </div>

                <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$75<small class="text-muted fw-light">/reais</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>20 users included</li>
                        <li>10 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                    </div>
                </div>
                </div>

                <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm2 border-primary">
                    <div class="card-header2 py-3 text-white bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Master</h4>
                    </div>
                    <div class="card-body2">
                    <h1 class="card-title pricing-card-title" style="color: white;">R$115<small class="text-muted fw-light">/reais</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>30 users included</li>
                        <li>15 GB of storage</li>
                        <li>Phone and email support</li>
                        <li>Help center access</li>
                    </ul>
                    
                    <section class="buttons"><button class="draw meet">Master Purchase</button></section>
                    
                    <!--<button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>-->
                    </div>
                </div>
                </div>
            </div>

        </section>



        <!-- Formulário Teste -->

      <section class="formSeason">

        <h2>Formulário de Comentário, Feedbacks ou dúvidas!</h2>
        <form>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" style="width: 500px;" placeholder="name@example.com">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Comente aqui a sua dúvida ou feedback e mande para nós!</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 650px; height: 120px;"></textarea>
            </div>

            <input class="btn btn-primary" type="submit" name="btn-enviar" value="Enviar">
        </form>
      </section>



      <!-- RODAPÉ DO SITE -->
    <footer id="contatos">
        
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>
</body>

</html>
