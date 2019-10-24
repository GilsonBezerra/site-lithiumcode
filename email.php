<?php

if (isset($_POST['email'] && !=empty($_POST['email']) {

    $nome = addcslashes($_POST['nome'])
    $email = addcslashes($_POST['email'])
    $cidade = addcslashes($_POST['cidade'])
    $estado = addcslashes($_POST['estado'])
    $cep = addcslashes($_POST['cep'])
    $mensagem = addcslashes($_POST(['mensagem']))

    $to = "contato@lithiumcode.com.br";
    $subject = "Contato do Site";
    $body = "Nome: ".$nome. "\n".
            "Email: ".$email. "\n".
            "Mensagem: ".$mensagem;

    $header = "From: contato@lithiumcode.com.br"."\n"
                ."Reply-To:".$email. "\n"
                ."X=Mailer:PHP/".phpversion();

    if(mail($to, $subject, $body, $header)){
        echo("Email enviado com sucesso!");
    }else{
        echo("O email não pode ser enviado");
    }

    
}






?>