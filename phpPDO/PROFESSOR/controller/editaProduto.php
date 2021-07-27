<?php
include_once './phpPDO/PROFESSOR/controller/editaProduto.php';
include_once './phpPDO/PROFESSOR/controller/ProdutoController.php';

$id = $_REQUEST['id'];
$pc = new ProdutoController();
$pc->pesquisarProdutoId($id);
header("Location: ../cadastroProduto.php");
exit;
