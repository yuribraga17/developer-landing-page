<?php
// Importa a biblioteca PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados pelo formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Cria o objeto PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    // Configura as credenciais do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Substitua pelo servidor SMTP do seu provedor
    $mail->SMTPAuth = true;
    $mail->Username = 'seuemail@gmail.com'; // Substitua pelo seu e-mail
    $mail->Password = ''; // Substitua pela sua senha
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configura as informações do remetente e destinatário
    $mail->setFrom($email, $name);
    $mail->addAddress('yursstore23@gmail.com', 'Destinatário'); // Substitua pelo e-mail do destinatário

    // Configura o assunto e corpo do e-mail
    $mail->Subject = 'Mensagem do formulário de contato';
    $mail->Body    = "Nome: $name\nE-mail: $email\nMensagem: $message";

    // Envia o e-mail e verifica se houve erros
    if($mail->send()) {
        echo 'Mensagem enviada com sucesso!';
    } else {
        echo 'Ocorreu um erro ao enviar a mensagem: ' . $mail->ErrorInfo;
    }
}
?>
