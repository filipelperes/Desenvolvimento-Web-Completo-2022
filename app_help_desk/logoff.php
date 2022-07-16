<?php require_once "validador_acesso.php";
    //unset(); -> remover indices de sessão
    session_destroy();
    header('Location: index.php');
?>