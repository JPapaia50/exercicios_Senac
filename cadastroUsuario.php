<?php
$pdo = new PDO('mysql:host=localhost;dbname=webemi', 'root', '');

if (isset($_POST['acao'])) {

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
    $sql = $pdo->prepare("INSERT INTO usuarios (codigo, nome, email, senha)
                            values (null,?,?,?);
                        ");
    if ($sql->execute(array($nome, $email, $senha))) {
        echo 'cadastrado com sucesso';
    } else {
        echo 'erro ao cadastrar';
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
    Usuários Cadastrado Com Sucesso
    <fieldset id="field">
        <legend>Cadastro de Usuário</legend>
        <form action="" method="post">
            Nome: <input type="text" name="nome" required><br>
            Login/Email: <input type="text" name="email" required><br>
            Senha: <input type="password" name="senha" id="password" required><br>
            Confirmar Senha <input type="password" name="confirmarsenha" id="confirm_password" required>
    </fieldset>
    <fieldset id="field">
        <legend>Permissões</legend>
        <input type="checkbox" name="ckbadministrador">Administrador
        <br>
        <input type="checkbox" name="ckbativo">Ativo
    </fieldset>
    <input type="submit" name="acao" value="Cadastrar">
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