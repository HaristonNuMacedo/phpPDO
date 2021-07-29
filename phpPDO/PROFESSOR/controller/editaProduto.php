<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/ProdutoController.php';

$id = $_REQUEST['id'];
$pc = new ProdutoController();
$pc->pesquisarProdutoId($id);
header("Location: ../cadastroProduto.php");
exit;
