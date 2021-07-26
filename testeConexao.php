<?php

include_once 'bd/Conecta.php';

$conn = new Conecta();
if($conn->conectadb()){
    echo "Conectou";
}else{
    echo "Não conectou";
}

