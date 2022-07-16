<?php
    session_start();
    $arq = fopen('arq.txt', 'a');
    fwrite($arq, $_SESSION['id'] . PHP_EOL . implode(PHP_EOL, $_POST) . PHP_EOL . PHP_EOL);
    fclose($arq);
    header('Location: abrir_chamado.php')

    //PHP_EOL =  PHP End Of Line
?>