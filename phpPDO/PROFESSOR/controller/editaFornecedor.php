<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/FornecedorController.php';

$id = $_REQUEST['id'];
$fc = new FornecedorController();
$fr = $fc->pesquisarFornecedorId($id);
header("Location: ../cadastroFornecedor.php");
exit;