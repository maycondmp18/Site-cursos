<?php

    session_start();
    include 'conexao.php';

    $nome = $_POST['name'];
    $email = $_POST['email'];
    $assunto = $_POST['subject'];
    $mensagem = $_POST['message'];
    $data = date('d/m/Y');

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

        $mail->FromName = $nome;
        $mail->From = $email;
        $mail->addAddress('felipe.douglas.inf1@gmail.com'); //endereço do dono do site
        
        $mail->isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = $assunto;
        $mail->Body = $mensagem . "<br><br> Nome: $nome <br> Email: $email <br> Data: $data";

        if($mail->send()){
           
            echo "<script>alert(' E-mail enviado com sucesso \n Agradeçemos a sua ajuda e opnião para melhorarmos nosso trabalho');</script>";
            header('location: index.php');
            /*$_SESSION['success'] = "<p style='color: green'>Cadastro realizado com sucesso!</p>";
            header("location: login_regis.php");*/
        }else{
            echo "<script>alert('Erro ao tentar enviar e-mail \n Por favor tente novamente mais tarde');</script>";
            header('location: index.php');
        }

    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }

?>