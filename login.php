<?php
    session_start();
    $_SESSION['nome'] = "";
    $_SESSION['email'] = "";

    $pdo = new PDO('mysql:host=localhost;dbname=webemi','root','');
 
    if(isset($_POST['acao'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
 
        $sql = $pdo->prepare("SELECT * FROM usuarios
                                WHERE email = ? AND senha = ?");
 
        if ($sql->execute(array($email, $senha))){
            if ($sql->rowCount() > 0){
                $info= $sql->fetchall(PDO::FETCH_ASSOC);
                foreach($info as $key => $values){
                    $_SESSION['nome'] = $values ['nome'];
                    $_SESSION['email'] = $values ['email'];
                }
                echo 'Usuario Cadastrado';
                header('location:pagina1.php');
            }else{
                echo 'Usuario Não Cadastrado';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="" method="POST">
        Nome: <input type="text" name="email">
        <br>
        Senha: <input type="text" name="senha">
        <br>
        <input type="submit" name="acao" value="login">
 
</body>
</html>