<?php
include_once 'C:/xampp/htdocs/phpPDO/ALUNO__HaristinNuMacedo/controller/livroController.php';
include_once 'C:/xampp/htdocs/phpPDO/ALUNO__HaristinNuMacedo/model/livro.php';
include_once 'C:/xampp/htdocs/phpPDO/ALUNO__HaristinNuMacedo/model/Mensagem.php';

$msg = new Mensagem();
$pr = new Livro();
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Casa de Livros</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="sorcut icon" href="book.png" type="image/png" style="width: 16px; height: 16px;">
    <link rel="stylesheet" href="Styles_for_CSS/DivBord.css">

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
                    Cadastro de Livro
                </div>
                <div class="card-body border">
                    <?php
                    include_once('C:/xampp/htdocs/phpPDO/ALUNO__HaristinNuMacedo/cadastroLivro.php');
                    //envio dos dados para o banco
                    if (isset($_POST['cadastrarLivro'])) {
                        $titulo = ($_POST['Titulo']);
                        if ($titulo != "") {
                            $autor = $_POST['Autor'];
                            $editora = $_POST['Editora'];
                            $qtdEstoque = $_POST['qtdEstoque'];

                            $pc = new LivroController();
                            unset($_POST['cadastrarLivro']);
                            $msg = $pc->inserirLivro($titulo, $autor, $editora, $qtdEstoque);
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastroLivro.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarLivro'])) {
                        $titulo = trim($_POST['Titulo']);
                        if ($titulo != "") {
                            $id = $_POST['idlivro'];
                            $autor = $_POST['Autor'];
                            $editora = $_POST['Editora'];
                            $qtdEstoque = $_POST['qtdEstoque'];

                            $pc = new LivroController();
                            unset($_POST['atualizarLivro']);
                            echo $pc->atualizarLivro($id, $titulo, 
                                    $autor, $editora, $qtdEstoque);
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='../cadastroLivro.php'\">";
                        }
                    }

                    if (isset($_POST['excluirLivro'])) {
                        if ($pr != null) {
                            $id = $_POST['idlivro']; 
                            $lc = new LivroController();
                            $lc->excluirLivro($id);
                            #$id = $pr->getIdLivro();
                        }
                    }
                    if (isset($_POST['limpar'])) {
                        $pr = null;
                        unset($_GET['id']);
                        header("Location: cadastroLivro.php");
                    }
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $pc = new LivroController();
                        $pr = $pc->pesquisarLivroID($id);
                    }
                    ?>

                    <form method="post" action="">
                        <div class="row g-8">
                            <div class="col-md-8 offset-md-2">
                                <strong>Código: <label>
                                        <?php
                                        if ($pr != null) {
                                            echo $pr->getIdLivro();
                                        }
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idlivro" value="<?php echo $pr->getIdLivro(); ?>">
                                <br>
                                <label>Titulo</label>
                                <input type="text" class="form-control" name="Titulo" value="<?php echo $pr->getTitulo(); ?>">
                                <!-- COLOCAR O VALUE AI EM CIMA value=""-->
                                <label>Autor</label>
                                <input type="text" class="form-control" name="Autor" value="<?php echo $pr->getAutor(); ?>">
                                <label>Editora</label>
                                <input type="text" class="form-control" name="Editora" value="<?php echo $pr->getEditora(); ?>">
                                <label>Qtde de Estoque</label>
                                <input type="number" class="form-control" name="qtdEstoque" value="<?php echo $pr->getQtdEstoque(); ?>">

                                <div class="offset-md-2">
                                    <input type="submit" name="cadastrarLivro" class="btn btn-success btInput px-md-4" value="Enviar" 
                                            <?php if($btEnviar == TRUE) echo "disabled"; ?>style="margin-right: 25px;">
                                    <input type="submit" name="atualizarLivro" class="btn btn-dark btInput px-md-4" value="Atualizar" 
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
                                                    <input type="submit" name="excluirProduto"
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
                            <th scope="col">Código</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Estoque</th>
                            <th scope="col text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lcTable = new LivroController();
                        $listaLivros = $lcTable->listarLivros();
                        $a = 0;
                        if ($listaLivros != null) {
                            foreach ($listaLivros as $ll) {
                                $a++;

                                /* print_r("<tr><td>" . $lp->getIdProduto() . "</td>");
                            print_r("<td>" . $lp->getNomeProduto() . "</td>");
                            print_r("<td>" . $lp->getVlrCompra(). "</td>");
                            print_r("<td>" . $lp->getVlrVenda() . "</td>");
                            print_r("<td>" . $lp->getQtdEstoque() . "</td></tr>");*/


                        ?>
                                <tr>
                                    <td><?php print_r($ll->getIdLivro()); ?></td>
                                    <td><?php print_r($ll->getTitulo()); ?></td>
                                    <td><?php print_r($ll->getAutor()); ?></td>
                                    <td><?php print_r($ll->getEditora()); ?></td>
                                    <td><?php print_r($ll->getQtdEstoque()); ?></td>
                                    <td>
                                        <a class="btn btn-outline-dark" href="cadastroLivro.php?id=<?php echo $ll->getIdLivro(); ?>">Editar</a>
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
                                                <form method="get" action="">
                                                    <label><strong>Deseja excluir o livro <?php echo $ll->getTitulo(); ?>?</strong></label>
                                                    <input type="hidden" name="ide" value="<?php echo $ll->getIdLivro(); ?>">


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

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>