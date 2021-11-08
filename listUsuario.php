<?php
    $pdo = new PDO('mysql:host=localhost;dbname=webemi','root','');

    $sql = $pdo->prepare("SELECT * FROM usuarios");
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($info AS $key => $values){
            echo "Codigo: ".$values['codigo']."<br>";
            echo "Nome: ".$values['nome']."<br>";
            echo "Email: ".$values['email']."<br>";
            echo "Senha: ".$values['senha']."<br>";
            
            echo "<a href='delUsuario.php?codigo=".$values['codigo']."'>(Deletar)</a>";
            echo "<a href='altUsuario.php?codigo=".$values['codigo']."'>(Alterar)</a>";


            echo "<hr>";


        }    
    }
?>
<input type="button" value="Cadastrar" onclick="parent.location='cadUsuario.php'">