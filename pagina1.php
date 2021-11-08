<?php
    session_start();

    if (isset($_SESSION['nome'])){
        echo 'Olá' .$_SESSION['nome'];
    }

    if (isset($_SESSION['email'])){
        echo 'Seu email é' .$_SESSION['email'];
    }
?>