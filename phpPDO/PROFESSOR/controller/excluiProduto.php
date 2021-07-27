<?php
include_once 'ProdutoController.php';
$id = $_REQUEST['ide'];
$pc = new ProdutoController();
$pc->excluirProduto($id);

