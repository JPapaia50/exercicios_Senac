<?php
if (isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];

    $pdo = new PDO('mysql:host=localhost;dbname=webemi', 'root', '');

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE codigo = ?");
    if ($sql->execute(array($codigo))){
        if ($sql->rowCount() > 0){
            echo "Usuario excluído com sucesso!!";
            header('location:listUsuario.php');
        } else {
            echo "Usuario não existe";
    
        }
    } else {
        echo "Erro ao excluir um usuário!!";
    }
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>Deletar Usuario</title>
</head>
<body>
    <form action="" method="POST">
    codigo: <input type="text" name="codigo">
    <br>
    <input type="submit" name="acao" value="deletar">
    </form>
</body>
</html>