<?php

    ob_start();
    session_start();
    session_destroy();
    header('location: ../view/login.php');
    exit;
    ob_end_flush();

?>