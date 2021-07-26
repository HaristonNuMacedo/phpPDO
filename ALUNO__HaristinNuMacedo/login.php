<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teste</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">

    <style>
        .espaco
        {
            padding: 10px;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="row espaco ">
            <div class="col-xl-4 col-mb-6 offset-md-4  "
                style="margin-top: 12%;">
                <div class="card-header bg-primary">Validação de Login</div>
                <div class="card-body border">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-mb-8 offset-md-2">
                                <label>Usuário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-mb-8 offset-md-2">
                                <input class="text" name="login"></input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-mb-8 offset-md-2">
                                <label>Senha</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-mb-8 offset-md-2">
                                <input class="text" name="senha"></input>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-mb-8 offset-md-2">
                                <input class="btn btn-success" type="submit" name="enviar" value="Enviar"></input>
                                <input class="btn btn-light" type="reset" name="enviar" value="Cancelar"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>