<?php
include_once './phpPDO/PROFESSOR/controller/excluiProduto.php';
include_once './phpPDO/PROFESSOR/controller/ProdutoController.php';

$id = $_REQUEST['ide'];
$pc = new ProdutoController();
$pc->excluirProduto($id);

