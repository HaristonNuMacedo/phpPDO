<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/ProdutoController.php';

$id = $_REQUEST['ide'];
$pc = new ProdutoController();
$pc->excluirProduto($id);

