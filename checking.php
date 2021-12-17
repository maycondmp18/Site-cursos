<?php
    require_once 'src/PHPMailer.php';
    require_once 'src/SMTP.php';
    require_once 'src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);
    $email = 'snoop.sk98@gmail.com';

    try {
        
        $mail->SMTP = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'felipe.douglas.inf1@gmail.com ';
        $mail->Password = '172839465fd';
        $mail->Port = 587;

        $mail->FromName = 'multsolucoes-ce.com.br';
        $mail->From = 'snoop.sk98@gmail.com';
        $mail->addAddress($email);
        
        $mail->isHTML(true);
        $mail->Subject = 'Teste de Email via gmail Akashi';
        $mail->Body = 'Chegou um email teste de <strong>AKASHI</strong>';
        $mail->AltBody = 'Chegou um email teste de AKASHI';

        if($mail->send()){
            echo 'Email enviado com  sucesso';
        }else{
            echo 'O servidor não conseguiu enviar o email';
        }
    
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
    ?>