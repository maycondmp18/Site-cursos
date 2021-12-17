<?php

    session_start();
    include 'conexao.php';

    $nome = $_POST[''];
    $email = $_POST[''];
    $assunto = $_POST[''];
    $mensagem = $_POST[''];

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
        $mail->addAddress($_SESSION['email_user']); //ultilizar $_SESSION['email_user']
        
        $mail->isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = 'Verificação de E-mail';
        $mail->Body = "
                        Olá <strong>" . $_SESSION['nome_user'] . "</strong> <br>
                        Verifique seu e-mail e tenha acesso total<br>
                        aos nossos conteúdos, e poder adquirir os cursos que estão<br>
                        disponíveis em nosso sistema. Basta clicar no botão abaixo:<br><br>

                        <a href='https://www.multsolucoes-ce.com.br/user.php?user=" . $_SESSION['email_user'] . "' style='
                                background-color: #4CAF50;
                                border: none;
                                color: white;
                                padding: 16px 32px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;
                                margin: 4px 2px;
                                transition-duration: 0.4s;
                                cursor: pointer;'>

                                VERIFICAR
                        </a>
                    ";

        if($mail->send()){
            echo '
                Um Email de Confirmação foi enviado para você! <br>
                <a href="login_regis.php">Fazer Login</a>
                ';
            /*$_SESSION['success'] = "<p style='color: green'>Cadastro realizado com sucesso!</p>";
            header("location: login_regis.php");*/
        }else{
            echo 'O servidor não conseguiu enviar o email';
            $_SESSION['error'] = "<p style='color: red'>Erro ao cadastrar</p>";
            header("location: login_regis.php");
        }

    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }

?>