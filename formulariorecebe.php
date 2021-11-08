<?php

    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

    if(isset($_POST['ckbfuma']))    
        $fuma = $_POST['ckbfuma'];
    else
        $fuma = "";
     
    if(isset($_POST['ckbfuma']))    
        $bebe = $_POST['ckbbebe'];

    else
        $bebe = "";    

        echo "Olá $nome seu email é $email";

        if ($fuma==""){
            echo '<br>Parabéns';

        }else{ 
            echo '<br>Fumar é prejudicil a Saúde';
    }
    if($bebe==""){
        echo '<br>parabens você não bebe';
    }else {
        echo'<br>beber é prejudicial a saude';
    }

    if ($fuma=="" && $bebe==""){
        echo '<br>Você é uma pessoa saudavel';
    }
}
    ?>