<?php

if (isset($_POST['btnEnviar'])) {

    $msg = '';
    

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST["subject"];
    $mensagem = $_POST['message'];

    //valida se os campos não estão vazios
    if ((!empty($nome)) && (!empty($email)) && (!empty($assunto)) && (!empty($mensagem))) {
        
        $email_remetente = "formulario_site@lithiumcode.com.br";
        $email_destinatario ="contato@lithiumcode.com.br";
        $email_recebidoDe = "$email";
        $email_assunto = $assunto;
        $email_conteudo = "FORMULÁRIO DE CONTATO\n"
            . "<br><b>De:</b> " . $nome
            . "<br><b>Email:</b> " . $email
            . "<br><b>Assunto:</b> " . $assunto
            . "<br><b>Mensagem:</b> " . $mensagem
            . "<br><br>"
            . "<hr>"
            . "<br>Mensagem enviada do formulário de contato da demonstração de formulário de contato com php.";

        
        $email_cabecalho = implode("\n", array("From: $email_remetente", "Reply-To: $email_recebidoDe", "Return-Path: $email_remetente", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));
        
        
        if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_cabecalho)) {
            
           
            $msg = '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Mensagem enviada com sucesso!</strong> 
            </div>';
        } else {

            $msg = '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Erro ao enviar mensagem, tente novamente! </strong> 
            </div>';
        }
        
    } else {

        $msg = '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Preencha todos os campos!! </strong> 
            </div>';
    }
}      
?>