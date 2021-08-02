<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/FornecedorController.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/fornecedor.php';
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/model/Mensagem.php';

$msg = new Mensagem();
$fr = new Fornecedor();

$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Casa de Produtos - Fornecedores</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- CSS only -->

    <link rel="sorcut icon" href="../img/book.png" type="image/png" style="width: 16px; height: 16px;">
    <link rel="stylesheet" href="../css/DivBord.css">

    <!-- SweetAlert -->
    <script src="sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <style>
        .espaco {
            padding: 24px;
        }

        .btInput {
            margin-top: 20px;
            padding-left: 10px;
            padding-right: 10px;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            text-align: center;

        }

        .StyleFornecedor01{
            position: absolute;
            top: 450px;
            left: 75px;
            font-size: 50px;
            transform: rotate(90deg);
            letter-spacing: .4rem;

        }

        .StyleFornecedor02{
            position: absolute;
            top: 450px;
            right: 75px;
            font-size: 50px;
            transform: rotate(90deg);
            letter-spacing: .4rem;
            
        }
    </style>

    <script>
    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i)
        if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
        }
    }
 </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="BordaForm100" class="border-dark"></div> <div id="BordaForm10" class="border-dark"></div> 
    <div id="BordaForm200" class="border-dark"></div> <div id="BordaForm20" class="border-dark"></div>
    <div id="BordaForm300" class="border-dark"></div> <div id="BordaForm30" class="border-dark"></div>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card-header bg-dark text-center text-light" style="font-size: 35px; border-top: 3px solid white">
                    Cadastro de Fornecedor
                </div>
                <div class="card-body border">
                    <?php
                    //include_once('../controller/FornecedorController.php');
                    //envio dos dados para o banco
                    if (isset($_POST['cadastrarFornecedor'])) {
                        $nomeFornecedor = ($_POST['NomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $logradouro = $_POST['Logradouro'];
                            
                            $complemneto = $_POST['Complemento'];
                            $bairro = $_POST['Bairro'];
                            $cidade = $_POST['Cidade'];
                            $uf = $_POST['Uf'];
                            $cep = $_POST['Cep'];
                            $representante = $_POST['Representante'];
                            $email = $_POST['Email'];
                            $telFixo = $_POST['TelFixo'];
                            $telCel = $_POST['TelCel'];

                            $fc = new FornecedorController();
                            unset($_POST['cadastrarLivro']);
                            $msg = $fc->inserirFornecedor($nomeFornecedor, $logradouro, $complemneto,
                            $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel);
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
                                URL='http://localhost/phpPDO/phpPDO/PROFESSOR/view/cadastroFornecedor.php'\">";
                            
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

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarFornecedor'])) {
                        $nomeFornecedor = ($_POST['NomeFornecedor']);
                        if ($nomeFornecedor != "") {     
                            $id = $_POST['IdFornecedor'];
                            $logradouro = $_POST['Logradouro'];
                            
                            $complemneto = $_POST['Complemento'];
                            $bairro = $_POST['Bairro'];
                            $cidade = $_POST['Cidade'];
                            $uf = $_POST['Uf'];
                            $cep = $_POST['Cep'];
                            $representante = $_POST['Representante'];
                            $email = $_POST['Email'];
                            $telFixo = $_POST['TelFixo'];
                            $telCel = $_POST['TelCel'];

                            $fc = new FornecedorController();
                            unset($_POST['atualizarFornecedor']);
                            $fc->atualizarFornecedor($id, $nomeFornecedor, $logradouro, $complemneto,
                                $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel);
                                $msg->setMsg("<p style='color: green;'>"
                                . "Dados Atualizados com sucesso</p>");
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
                                URL='http://localhost/phpPDO/phpPDO/PROFESSOR/view/cadastroFornecedor.php'\">";
                            
                            echo "<script>
                            Swal.fire({
                                title: 'Dados Atualizados!',
                                text: 'Os dados foram REPROCESSADOS com sucesso.',
                                icon: 'sucess',
                                confirmButtonText: 'Ok'
                            })
                            </script>";
                        }

                        
                    }

                    if (isset($_POST['excluir'])) {
                        if ($fr != null) {
                            $id = $_POST['ide'];
                            
                            $fc = new FornecedorController();
                            unset($_POST['excluir']);
                            $msg = $fc->excluirFornecedor($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\" 3;
                                URL='cadastroFornecedor.php'\">";
                            
                            echo "<script>
                            Swal.fire({
                                title: 'Dados Excluídos!',
                                text: 'Os dados foram DELETADOS com sucesso.',
                                icon: 'sucess',
                                confirmButtonText: 'Ok'
                            })
                            </script>";
                        }
                    }

                    if (isset($_POST['excluirFornecedor'])) {
                        if ($fr != null) {
                            $id = $_POST['IdFornecedor']; 
                            $fc = new FornecedorController();
                            $fc->excluirFornecedor($id);                          
                            #$id = $pr->getIdLivro();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
                                URL='cadastroFornecedor.php'\">";

                            echo "<script>
                            Swal.fire({
                                title: 'Dados Excluídos!',
                                text: 'Os dados foram DELETADOS com sucesso.',
                                icon: 'sucess',
                                confirmButtonText: 'Ok'
                            })
                            </script>";
                        }
                    }

                    if (isset($_POST['limpar'])) {
                        $fr = null;
                        unset($_GET['idFornecedor']);
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                                URL='cadastroFornecedor.php'\">";
                    }

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $btEnviar = TRUE;
                        $btAtualizar = TRUE;
                        $btExcluir = TRUE;
                        $fc = new FornecedorController();
                        $fr = $fc->pesquisarFornecedorId($id);
                    }
                    ?>

                    <form method="post" action="">
                        <div class="row g-8">
                            <div class="col-md-8 offset-md-2">
                                <div class="StyleFornecedor01">
                                    <label><strong>FORNECEDOR</strong></label>
                                </div>
                                <div class="StyleFornecedor02">
                                    <label><strong>FORNECEDOR</strong></label>
                                </div>

                                <strong>Código: <label>
                                        <?php
                                        if ($fr != null) {
                                            echo $fr->getIdFornecedor();
                                        }
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="IdFornecedor" value="<?php echo $fr->getIdFornecedor(); ?>">
                                <br>
                                <label>Nome do Fornecedor</label>
                                <input type="text" class="form-control" name="NomeFornecedor" value="<?php echo $fr->getNomeFornecedor(); ?>">
                                <!-- COLOCAR O VALUE AI EM CIMA value=""-->
                                 
                                <label>Logradouro/Rua</label>
                                <input type="text" class="form-control" name="Logradouro" id="rua" value="<?php echo $fr->getLogradouro(); ?>">
                                
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="Complemento" id="complemento" value="<?php echo $fr->getComplemneto(); ?>">
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="Bairro" id="bairro" value="<?php echo $fr->getBairro(); ?>">
                                <label>Cidade</label>
                                <input type="text" class="form-control" name="Cidade" id="cidade" value="<?php echo $fr->getCidade(); ?>">
                                <label>Uf</label>
                                <input type="text" class="form-control" name="Uf" id="uf" value="<?php echo $fr->getUf(); ?>" maxlength="2">
                                <label>Cep</label>
                                <input type="text" class="form-control" name="Cep" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?php echo $fr->getCep(); ?>">
                                    
                                <label>Representante</label>
                                <input type="text" class="form-control" name="Representante" value="<?php echo $fr->getRepresentante(); ?>">
                                <label>Email</label>
                                <input type="text" class="form-control" name="Email" value="<?php echo $fr->getEmail(); ?>">
                                <label>TelFixo</label>
                                <input type="text" class="form-control" name="TelFixo" onkeypress="mascara(this, '####-####')" maxlength="9" value="<?php echo $fr->getTelFixo(); ?>">
                                <label>TelCel</label>
                                <input type="text" class="form-control" name="TelCel" onkeypress="mascara(this, '## #####-####')" maxlength="13" value="<?php echo $fr->getTelCel(); ?>">

                                <div class="offset-md-2">
                                    <input type="submit" name="cadastrarFornecedor" class="btn btn-success btInput px-md-4" value="Enviar" 
                                            <?php if($btEnviar == TRUE) echo "disabled"; ?>style="margin-right: 25px;">
                                    <input type="submit" name="atualizarFornecedor" class="btn btn-dark btInput px-md-4" value="Atualizar" 
                                            <?php if($btAtualizar == FALSE) echo "disabled"; ?> style="margin-right: 25px;">
                                            
                                    <button type="button" class="btn btn-warning btInput" 
                                            data-bs-toggle="modal" data-bs-target="#ModalExcluir"
                                            <?php if($btExcluir == FALSE) echo "disabled"; ?> style="margin-right: 25px;">
                                        Excluir 
                                    </button>

                                    <!-- Modal para excluir -->
                                    <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" 
                                                        id="exampleModalLabel">
                                                        Confirmar Exclusão</h5>
                                                    <button type="button" 
                                                            class="btn-close" 
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Deseja Excluir?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="excluirFornecedor"
                                                           class="btn btn-success "
                                                           value="Sim">
                                                    <input type="submit" 
                                                        class="btn btn-light btInput" 
                                                        name="limpar" value="Não">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim do modal para excluir -->

                                    <input type="submit" 
                                           class="btn btn-light btInput" 
                                           name="limpar" value="Limpar">
                                </div>
                            </div>
                        </div>
                    </form>
                                      
                </div>
                <table class="table">
                    <thead class="thead-light bg-dark text-white">
                        <tr>
                            <th scope="col">idFornecedor</th>
                            <th scope="col">nomeFornecedor</th>
                            <!--<th scope="col">logradouro</th>
                            <th scope="col">complemento</th>
                            <th scope="col">bairro</th>
                            <th scope="col">cidade</th>
                            <th scope="col">uf</th>
                            <th scope="col">cep</th>-->
                            <th scope="col">representante</th>
                            <th scope="col">email</th>
                            <th scope="col">telFixo</th>
                            <th scope="col">telCel</th>
                            <th scope="col text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //echo var_dump($fr);
                        $lcTable = new FornecedorController();
                        $listaLivros = $lcTable->listarFornecedores();
                        $a = 0;
                        if ($listaLivros != null) {
                            foreach ($listaLivros as $ff) {
                                $a++;
                        ?>
                                <tr>
                                    <td><?php print_r($ff->getIdFornecedor()); ?></td>
                                    <td><?php print_r($ff->getNomeFornecedor()); ?></td>
                                    <!--
                                    <td><?php print_r($ff->getLogradouro()); ?></td>
                                    <td><?php print_r($ff->getComplemneto()); ?></td>
                                    <td><?php print_r($ff->getBairro()); ?></td>
                                    <td><?php print_r($ff->getCidade()); ?></td>
                                    <td><?php print_r($ff->getUf()); ?></td>
                                    <td><?php print_r($ff->getCep()); ?></td>--> 

                                    <td><?php print_r($ff->getRepresentante()); ?></td>
                                    <td><?php print_r($ff->getEmail()); ?></td>
                                    <td><?php print_r($ff->getTelFixo()); ?></td>
                                    <td><?php print_r($ff->getTelCel()); ?></td>
                                    <td>
                                        <a class="btn btn-outline-dark" name ="" href="http://localhost/phpPDO/phpPDO/PROFESSOR/view/cadastroFornecedor.php?id=<?php echo $ff->getIdFornecedor(); ?>">Editar</a>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="">
                                                    <label><strong>Deseja excluir o Fornecedor <?php echo $ff->getNomeFornecedor(); ?>?</strong></label>
                                                    <input type="hidden" name="ide" value="<?php echo $ff->getIdFornecedor(); ?>">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
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
        </div>
    </div>

    <br>
    
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/JQuery.js"></script>
    <script src="../js/JQuery.min.js"></script>

    <!-- CONTROLE DE ENDEREÇO (ViaCep)-->
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
                            title: 'CEP não encontrado!',
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

<!-- 
Máscaras
https://www.vivaolinux.com.br/script/Mascara-JavaScript-para-Campos-de-Telefone-Celular-e-CEP -->

</body>

</html>