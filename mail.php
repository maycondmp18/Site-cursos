<?php

    session_start();
    include 'conexao.php';

    //Enviar E-mail de verificação
    require_once 'src/PHPMailer.php';
    require_once 'src/SMTP.php';
    require_once 'src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    try {
        
        $mail->SMTP = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'felipe.douglas.inf1@gmail.com ';
        $mail->Password = '172839465fd';
        $mail->Port = 587;

        $mail->FromName = 'multsolucoes-ce.com.br';
        $mail->From = 'felipe.douglas.inf1@gmail.com';
        $mail->addAddress($_SESSION['email_verify']); //ultilizar $_SESSION['email_verify']
        
        $mail->isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = 'Verificação de E-mail';
        $mail->Body = "
                        Olá <strong>" . $_SESSION['nome_verify'] . "</strong> <br>
                        seu código de verificação é:<br>
                        <strong style='font-size: 20px;'>" . $_SESSION['cod_verify'] . "</strong>
                    ";

        if($mail->send()){
            header("location: codverify.php");
        }else{
            echo 'O servidor não conseguiu enviar o email';
            $_SESSION['error'] = "<p style='color: red'>Erro ao enviar email</p>";
            header("location: login_regis.php");
        }

    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }

?>