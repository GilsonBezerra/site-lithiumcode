<?php
// Check for empty fields
if(empty($nome = $_POST['nome'])           ||
   empty($email = $_POST['email'])         ||
   empty($cidade = $_POST['cidade'])       ||
   empty($estado = $_POST['estado'])       ||
   empty($telefone = $_POST['telefone'])   ||
   empty($mensagem = $_POST['mensagem'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      echo  "<script>
               window.location='index.html';
               alert('Todos os campos são de preenchimento obrigatório!');
            </script>"; ;
      return "index.html";
   }
 
// Create the email and send the message
$to = 'contato@lithiumcode.com.br'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contato do site de:  $nome";
$email_body = "<p>Você acaba de receber um novo contato via site Lithium Produções!
                    \n\n"."Veja os detalhes:\n\n
                    <strong>Nome:</strong> $nome\n
                    <strong>Email:</strong> $email\n
                    <strong>Telefone:</strong> $telefone\n
                    <strong>Cidade:</strong> $cidade\n
                    <strong>Estado:</strong> $estado\n\n
                    <strong>Mensagem:</strong>\n 
                    <div style="width: 200px; height: 100px; border: 1px solid gray; background: lightgray;">
                        $mensagem
                    </div>
                </p>";
// $headers = "From: contato@lithiumcode.com.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email"; 
$email_headers = implode ("\n",array ( "From: contato@lithiumcode.com.br", "Reply-To: $email", "Return-Path: $email","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ));  
if(mail($to,$email_subject,nl2br($email_body),$email_headers)){
    echo "<script>
                window.location='index.html';
                alert('$nome, sua mensagem foi enviada com sucesso! Estraremos em contato em breve!');
          </script>"; 

} else{ 
    echo "</b>Falha no envio do E-Mail!</b>"; 
}      
?>
 <a href="index.html">Clique aqui para voltar ao site</a>


