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
    </style>
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
                <div class="card-header bg-dark text-center text-light" style="font-size: 25px; border-top: 3px solid white">
                    Cadastro de Fornecedor
                </div>
                <div class="card-body border">
                    <?php
                    //include_once('../controller/FornecedorController.php');
                    //envio dos dados para o banco
                    if (isset($_POST['cadastrarFornecedor'])) {
                        $nomeFornecedor = ($_POST['nomeFornecedor']);
                        if ($nomeFornecedor != "") {
                            $logradouro = $_POST['logradouro'];
                            $numero = $_POST['numero'];
                            $complemneto = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];
                            $cep = $_POST['cep'];
                            $representante = $_POST['representante'];
                            $email = $_POST['email'];
                            $telFixo = $_POST['telFixo'];
                            $telCel = $_POST['telCel'];

                            $fc = new FornecedorController();
                            unset($_POST['cadastrarLivro']);
                            $msg = $fc->inserirFornecedor($nomeFornecedor, $logradouro, $numero, $complemneto,
                            $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel);
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='http://localhost/phpPDO/phpPDO/PROFESSOR/view/cadastroFornecedor.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarFornecedor'])) {
                        $nomeFornecedor = ($_POST['NomeFornecedor']);
                        if ($nomeFornecedor != "") {     
                            $id = $_POST['IdFornecedor'];
                            $logradouro = $_POST['Logradouro'];
                            $numero = $_POST['Numero'];
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
                            echo $fc->atualizarFornecedor($id, $nomeFornecedor, $logradouro, $numero, $complemneto,
                                $bairro, $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel);
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='http://localhost/phpPDO/phpPDO/PROFESSOR/view/cadastroFornecedor.php'\">";
                            echo "TESTANDO O TESTIADO TESTE!";
                        }
                    }

                    if (isset($_POST['excluirFornecedor'])) {
                        if ($pr != null) {
                            $id = $_POST['idFornecedor']; 
                            $fc = new FornecedorController();
                            $fc->excluirFornecedor($id);
                            #$id = $pr->getIdLivro();
                        }
                    }
                    if (isset($_POST['limpar'])) {
                        $fr = null;
                        unset($_GET['id']);
                        header("Location: cadastroLivro.php");
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
                                 
                                <label>Logradouro</label>
                                <input type="text" class="form-control" name="Logradouro" value="<?php echo $fr->getLogradouro(); ?>">
                                <label>Numero</label>
                                <input type="number" class="form-control" name="Numero" value="<?php echo $fr->getNumero(); ?>">
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="Complemento" value="<?php echo $fr->getComplemneto(); ?>">
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="Bairro" value="<?php echo $fr->getBairro(); ?>">
                                <label>Cidade</label>
                                <input type="text" class="form-control" name="Cidade" value="<?php echo $fr->getCidade(); ?>">
                                <label>Uf</label>
                                <input type="text" class="form-control" name="Uf" value="<?php echo $fr->getUf(); ?>">
                                <label>Cep</label>
                                <input type="text" class="form-control" name="Cep" value="<?php echo $fr->getCep(); ?>">
                                    
                                <label>Representante</label>
                                <input type="text" class="form-control" name="Representante" value="<?php echo $fr->getRepresentante(); ?>">
                                <label>Email</label>
                                <input type="text" class="form-control" name="Email" value="<?php echo $fr->getEmail(); ?>">
                                <label>TelFixo</label>
                                <input type="text" class="form-control" name="TelFixo" value="<?php echo $fr->getTelFixo(); ?>">
                                <label>TelCel</label>
                                <input type="text" class="form-control" name="TelCel" value="<?php echo $fr->getTelCel(); ?>">

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
                                                    <input type="submit" name="excluiFornecedor"
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

                                    <input type="submit" name="limpar" class="btn btn-danger btInput px-md-4" value="Limpar" style="margin-right: 25px;">
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
                            <th scope="col">numero</th>
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
                                    <td><?php print_r($ff->getNumero()); ?></td>
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
                                                <form method="get" action="../controller/excluiFornecedor.php">
                                                    <label><strong>Deseja excluir o Fornecedor <?php echo $ff->getNomeFornecedor(); ?>?</strong></label>
                                                    <input type="hidden" name="ideF" value="<?php echo $ff->getIdFornecedor(); ?>">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Sim</button>
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

    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>