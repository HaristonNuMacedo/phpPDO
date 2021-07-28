<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/FornecedorController.php';

$id = $_REQUEST['idF'];
$fc = new FornecedorController();
$fc->pesquisarFornecedorId($id);
header("Location: ../cadastroFornecedor.php");
exit;