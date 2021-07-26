<?php
include_once 'C:/xampp/htdocs/PHP-WEB/controller/excluiLivro.php';
include_once 'C:/xampp/htdocs/PHP-WEB/controller/livroController.php';

$id = $_REQUEST['ide'];
$lc = new LivroController();

$lc->excluirLivro($id);

?>