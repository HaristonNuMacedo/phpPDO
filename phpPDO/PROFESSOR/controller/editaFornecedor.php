<?php
include_once './phpPDO/PROFESSOR/controller/editaFornecedor.php';
include_once './phpPDO/PROFESSOR/controller/FornecedorController.php';

$fc = new FornecedorController();
$fc->pesquisarFornecedorId($id);
header("Location: ../cadastroFornecedor.php");
exit;