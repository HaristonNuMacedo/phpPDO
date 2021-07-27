<?php
include_once 'ProdutoController.php';

$id = $_REQUEST['id'];
$pc = new ProdutoController();
$pc->pesquisarProdutoId($id);
header("Location: ../cadastroProduto.php");
exit;
