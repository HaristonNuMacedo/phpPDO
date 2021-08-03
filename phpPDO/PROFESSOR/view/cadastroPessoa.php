<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/PessoaController.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/pessoa.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/endereco.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';

$msg = new Mensagem();
$ps = new Pessoa();
$en = new Endereco();

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

        <!-- SweetAlert -->
        <script src="sweetalert2.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                        Endereço do cliente
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

                            $cep = $_POST['Cep'];
                            $logra = $_POST['Logradouro'];
                            $comple = $_POST['Complemento'];
                            $bairro = $_POST['Bairro'];             
                            $cidade = $_POST['Cidade'];
                            $uf = $_POST['Uf'];

                            $pessoa = new PessoaController();
                                unset($_POST['cadastrarPessoa']);
                                $msg = $pessoa->inserirPessoa($nome, $dtNasc,
                                        $login, $senha, $perfil,  $email, $cpf, 
                                        $cep, $logra, $comple, $bairro, $cidade, $uf);
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
                                    URL='cadastroPessoa.php'\">";

                                echo "<script>
                                    Swal.fire({
                                        title: 'Dados Cadastrados!',
                                        text: 'Os dados foram PROCESSADOS com sucesso.',
                                        icon: 'sucess',
                                        confirmButtonText: 'Ok'
                                    })
                                </script>";
                        }
                    }


                    ?>
                    <div class="card-body" style="border: 2px solid #252525;">
                        <form method="post" action="">
                            <div class="row">
                            <div class="col-md-6 ">  
                            <label>Código: </label> <br>
                                            <label>CEP</label><br>
                                            <input class="form-control" type="text" name="Cep" id="cep">
                                            <label>Logradouro/Rua</label>
                                            <input class="form-control" type="text" name="Logradouro" id="rua">
                                            <label>Complemento</label>
                                            <input class="form-control" type="text" name="Complemento" id="complemento">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bairro</label>
                                            <input class="form-control" type="text" name="Bairro" id="bairro">
                                            <label>Cidade</label>
                                            <input class="form-control" type="text" name="Cidade" id="cidade">
                                            <label>UF</label>
                                            <input class="form-control" type="text" name="Uf" id="uf">
                                        </div>
                                
                            </div>

                            <div class="DivDados"></div>
                            <div class="card-header bg-dark text-center text-white border" 
                                style="padding-bottom: 15px; padding-top: 15px; font-size: 25px;">
                                    Cadastro de Cliente
                            </div>
                            <div class="col-12 ">
                                <div class="card-header text-start text-dark border">
                                    <label style="margin-top: 10px;">Código: </label><br>
                                    <div class="row">
                                    <div class="col-md-6">
                                    
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
                    <div class="col-10 offset-1">
                        <table class="table table-striped table-responsive"
                               style="border-radius: 3px; overflow:hidden;">
                            <thead class="table-dark">
                                <tr><th>Código</th>
                                    <th>Nome</th>
                                    <th>data de Nasc.</th>
                                    <th>Perfil</th>
                                    <th>E-mail</th>
                                    <th>cpf</th>
                                    <th>UF</th>
                                    <th>CEP</th>
                                    <th colspan="2">Ações</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                $fcTable = new PessoaController();
                                $listaP = $fcTable->listarPessoas();
                                $a = 0;
                                if ($listaP != null) {
                                    foreach ($listaP as $lf) {
                                        $a++;
                                        ?>
                                        <tr>
                                            <td><?php print_r($lf->getIdpessoa()); ?></td>
                                            <td><?php print_r($lf->getNome()); ?></td>
                                            <td><?php print_r($lf->getDtNasc()); ?></td>
                                            <td><?php print_r($lf->getPerfil()); ?></td>
                                            <td><?php print_r($lf->getEmail()); ?></td>
                                            <td><?php print_r($lf->getCpf()); ?></td>
                                            <td><?php print_r($lf->getFkEndereco()->getUf()); ?></td>
                                            <td><?php print_r($lf->getFkEndereco()->getCep()); ?></td>
                                            <td><a href="cadastroFornecedor.php?id=<?php echo $lf->getIdpessoa(); ?>"
                                                   class="btn btn-light">
                                                    <img src="../img/edita.png" width="24"></a>
                                                </form>
                                                <button type="button" 
                                                        class="btn btn-light" data-bs-toggle="modal" 
                                                        data-bs-target="#exampleModal<?php echo $a; ?>">
                                                    <img src="../img/delete.png" width="24"></button></td>
                                        </tr>
                                        <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" 
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir o fornecedor 
                                                                <?php echo $lf->getNome(); ?>?</strong></label>
                                                        <input type="hidden" name="ide" 
                                                               value="<?php echo $lf->getIdpessoa(); ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                            <button type="reset" class="btn btn-secondary" 
                                                                    data-bs-dismiss="modal">Não</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                        </table>
                    </div>


    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jQuery.js"></script>
    <script src="../js/jQuery.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script> 
    <!-- controle de endereço (ViaCep) -->
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                Swal.fire({
                                    title: 'CEP não encontrado.',
                                    text: 'Digite o CEP corretamente!',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        Swal.fire({
                                    title: 'CEP não encontrado.',
                                    text: 'Digite o CEP corretamente!',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })

                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });            
        </script>
    </body>
</html>