<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/FornecedorController.php';

$id = $_REQUEST['ideF'];
$fc = new FornecedorController();
$fc->excluirFornecedor($id);