<?php
    session_start();
    include 'conexao.php';
    
    if(isset($_GET['user'])){
        $mail = $_GET['user'];
        $sql = $conn->query("UPDATE alunos SET email_checking = 0 WHERE email = '$mail'");
        if($sql){  
            echo "<script>
                alert('O seu email foi verificado faça login novamente para continuar');
                window.location='login_regis.php';
            </script>";
        }else{
            echo "<script>
                alert('O email não esta cadastrado em nosso sistema, verifique se o email esta correto');
                window.location='login_regis.php';
            </script>";
        }
    }else{
        header('location: index.php');
    }