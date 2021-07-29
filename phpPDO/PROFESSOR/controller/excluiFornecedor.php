<?php
include_once 'C:/xampp/htdocs/phpPDO/phpPDO/PROFESSOR/controller/FornecedorController.php';

$id = $_REQUEST['ide'];
$fc = new FornecedorController();
$fc->excluirFornecedor($id);

