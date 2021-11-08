<?php
    if (isset($_GET['acao'])){
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        echo "Olá turminha! Eu sou $nome e meu email $email";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        Nome: <input type="text" name="nome">
        Email: <input type="text" name="email">
        <input type="submit" name="acao" value="Enviar">
    </form>
</body>
</html>