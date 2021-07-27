<?php
include_once './phpPDO/PROFESSOR/controller/excluiFornecedor.php';
include_once './phpPDO/PROFESSOR/controller/FornecedorController.php';

$id = $_REQUEST['ide'];
$pc = new ProdutoController();
$pc->excluirProduto($id);