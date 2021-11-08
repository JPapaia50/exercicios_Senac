<?php
$pdo = new PDO('mysql:host=localhost;dbname=webemi', 'root', '');

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $nome = "";
    $email = "";
    $senha = "";

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE codigo = ?");

    if ($sql->execute(array($codigo))) {
        $info = $sql->fetchall(PDO::FETCH_ASSOC);

        foreach($info as $key => $values){
            $codigo = $values['codigo'];
            $nome = $values['nome'];
            $email = $values['email'];
            $senha = $values['senha'];
        }
    }
}
if (isset($_POST['codigo'])) {

    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (isset($_POST['cbkadministrador'])) {
        $administrador = true;
    } else {
        $administrador = false;
    }
    if (isset($_POST['cbkativo'])) {
        $ativo = true;
    } else {
        $ativo = false;
    }
    $sql = $pdo->prepare("UPDATE usuarios SET codigo=?, nome=?, email=?, senha=?
                        WHERE codigo = ?");
    if ($sql->execute(array($codigo, $nome, $email, $senha, $codigo))) {
        echo 'Alterado com sucesso';
    } else {
        echo 'erro ao alterar';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #field {
            width: 350px;
        }

        #fundo {
            background-color: lightgray
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body id="fundo">
    <fieldset id="field">
        <legend>Alterar Usuário</legend>
        <form action="" method="post">
            Codigo: <input type="text" name="codigo" value="<?php echo $codigo ?>" readonly><br>
            Nome: <input type="text" name="nome" value="<?php echo $nome ?>" required><br>
            Login/Email: <input type="text" name="email" value="<?php echo $email ?>" required><br>
            Senha: <input type="password" name="senha" id="password" value="<?php echo $senha ?>" required><br>\
    </fieldset>
    <input type="submit" name="acao" value="Alterar">
    </form>
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Senhas diferentes!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    <input type="button" value="Voltar" onclick="parent.location='listUsuario.php'">
</body>

</html>