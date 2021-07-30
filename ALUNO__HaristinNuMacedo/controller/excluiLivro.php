<?php
include_once './ALUNO__HaristinNuMacedo/controller/excluiLivro.php';
include_once './ALUNO__HaristinNuMacedo/controller/livroController.php';

$id = $_REQUEST['ide'];
$lc = new LivroController();

$lc->excluirLivro($id);

?>