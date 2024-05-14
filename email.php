<?php

// Variáveis de POST
$nome = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$assunto = isset($_POST['subject']) ? $_POST['subject'] : '';
$mensagem = isset($_POST['message']) ? $_POST['message'] : '';

// Verifica se todos os campos estão preenchidos
if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
    echo "<script>
    window.location='index.html';
    alert('Todos os campos são obrigatórios!');
  </script>";
    return "contact.html"; // Encerra o script se houver campos em branco
}

// Remetente (deve ser um e-mail válido no domínio)
$email_remetente = "formulario_site@lithiumcode.com.br";

// Configurações do e-mail
$email_destinatario = "contato@lithiumcode.com.br";
$email_reply = "$email";
$email_assunto = "Contato do Site";

// Monta o corpo da mensagem
$email_conteudo = "Nome: $nome \n";
$email_conteudo .= "Email: $email \n";
$email_conteudo .= "Assunto: $assunto \n";
$email_conteudo .= "Mensagem: $mensagem \n";

// Headers do e-mail
$email_headers = implode("\n", array(
    "From: $email_remetente",
    "Reply-To: $email_reply",
    "Return-Path: $email_remetente",
    "MIME-Version: 1.0",
    "X-Priority: 3",
    "Content-Type: text/html; charset=UTF-8"
));

// Envia o e-mail
if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)) {
    echo "<script>
            window.location='index.html';
            alert('$nome, sua mensagem foi enviada com sucesso! Estaremos retornando em breve');
          </script>";
} else {
    echo "Falha no envio do E-Mail!";
}

?>
<a href="index.html">Clique aqui para voltar ao site</a>
