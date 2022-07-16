<?php
session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 'S') header('Location: index.php?login=erro2');
?>