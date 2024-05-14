<?php
if (isset($_POST['btnEnviar'])) {
if(empty($name = $_POST['name'])           ||
   empty($email = $_POST['email']) ||
   empty($subject = $_POST['subject'])         ||
   empty($message = $_POST['message'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      echo  "<script>
               window.location='index.html';
               alert('Todos os campos são de preenchimento obrigatório!');
            </script>"; ;
      return "index.html";
   } else {
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject']; 
        $message = $_POST['message'];

        $email_remetente = "formulario_site@lithiumcode.com.br";

        $email_destinatario = "contato@lithiumcode.com.br"; 
        $email_reply = "$email"; 
        $email_assunto = "Contato formmail"; 

        $email_conteudo = "Nome = $nome \n"; 
        $email_conteudo .= "Email = $email \n";
        $email_conteudo .= "Assunto = $subject \n"; 
        $email_conteudo .= "Mensagem = $message \n"; 

        $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );

    }   
}
?>