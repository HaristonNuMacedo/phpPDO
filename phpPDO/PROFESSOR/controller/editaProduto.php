<?php
include_once 'ProdutoController.php';
include_once 'FornecedorController.php';

$id = $_REQUEST['id'];
$pc = new ProdutoController();
$pc->pesquisarProdutoId($id);
header("Location: ../cadastroProduto.php");

$fc = new FornecedorController();
$fc->pesquisarFornecedorId($id);
header("Location: ../cadastroFornecedor.php");
exit;
