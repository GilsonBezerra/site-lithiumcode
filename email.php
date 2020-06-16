<?php

// Cria uma variável que terá os dados do erro
$erro = false;

// Verifica se o POST tem algum valor
if ( !isset( $_POST ) || empty( $_POST ) ) {
    $erro = 'Nada foi postado.';
}

// Cria as variáveis dinamicamente
foreach ( $_POST as $chave => $valor ) {
    // trim remove todas as tags HTML
    // strip_tags remove os espaços em branco do valor
    // $$chave cria as variaveis com os names dos elementos do formulário
    $$chave = trim( strip_tags( $valor ) );

    // Verifica se tem algum valor nulo
    if ( empty ( $valor ) ) {
        $erro = 'Existem campos em branco.';
    }
}


// Verifica se $email realmente existe e se é um email. 
if ( ( ! isset( $email ) || ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) && !$erro ) {
    $erro = 'Envie um email válido.';
}

// Se existir algum erro, mostra o erro
if ( $erro ) {
    echo $erro;
} else {

    // enviar um email
    $email_subject = "Contato do Site";

    $email_body = "Nome: $name.\n".
                    "Email: $email.\n".
                     "Cidade: $cidade.\n". 
                      "Estado: $estado.\n".
                       "Telefone: $telefone.\n".
                        "Menssagem: $message.\n";

    $to = "contato@lithiumcode.com.br";

    $headers = "From: $email \r\n";

    $headers .= "Reply-To: $email \r\n";

    mail($to,$email_subject,$email_body,$headers);

    header("Location: email.php"); 

    /**** se não quiser redirecionar comente a linha acima e ***/
    /****      descomente o trecho de cpodigo abaixo        ***/

    /*
       echo "<h1>Dados enviados</h1>";

       foreach ( $_POST as $chave => $valor ) {
           echo '<b>' . $chave . '</b>: ' . $valor . '<br><br>';
       }

     */

       //limpamos as variaveis do formulario
       $name="";
       $email="";
       $cidade="";
       $estado="";
       $telefone="";
       $message="";
       
       if (mail ($to, $email_subject, nl2br($email_body), $headers)){ 
        echo "<script>
                   window.location='index.html';
                   alert('$nome, sua mensagem foi enviada com sucesso! Estaremos retornando em breve');
               </script>"; 
        
        } 
        else{ 
        echo "</b>Falha no envio do E-Mail!</b>"; } 
        //====================================================

}
 
 ?>
 <a href="index.html">Clique aqui para voltar ao site</a>


