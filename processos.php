<?php
    session_start();
    include 'conexao.php';
    include 'init.php';

    if(isset($_POST['BtnCad'])){
        
        //Processo de Cadastro
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $c_senha = $_POST['c_senha'];

        //verificar se o email ja foi ultilizado
        $sql = $conn->query("SELECT email FROM alunos");
        $ln = $sql->fetch(PDO::FETCH_ASSOC);
        if($email != $ln['email']){
            $_SESSION['situacao'];
            if($senha == $c_senha){
                $name = $nome . " " . $sobrenome;
                $pass = sha1(md5($senha));
                
                $sql = $conn->query("INSERT INTO alunos (nome, email, senha) VALUES ('$name', '$email', '$pass')");
                if($sql){
                    $_SESSION['situacao'] = "<p style='color: green'>Cadastro realizado com sucesso!</p>";
                    header("location: login_regis.php");
                }else{
                    $_SESSION['situacao'] = "<p style='color: red'>Erro ao cadastrar</p>";
                    header("location: login_regis.php");
                }
            }else{
                $_SESSION['situacao'] = "<p style='color: red'>As senhas não correspondem</p>";
                header("location: login_regis.php");
            }
        }else{
            $_SESSION['situacao'] = "<p style='color: red'>O email ja possui um cadastro, tente fazer login ou tente outro email</p>";
            header("location: login_regis.php");
        }

         

    }elseif(isset($_POST['atv'])) {
        
        $aluno = $_POST['aluno'];
        $curso = $_POST['curso'];
        $arquivo = $_FILES['avaliacao'];
        
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $avaliacao = $_SESSION['user_id'] . '_Aluno_' . $aluno . '_Curso_' . $curso . '.' . $extensao;
        $diretorio = "storage/avaliacao/";

        move_uploaded_file($arquivo['tmp_name'], $diretorio . $avaliacao);
        
        $sql = $conn->query("INSERT INTO avaliacao (aluno, curso, arquivo) VALUES ('$aluno', '$curso', '$avaliacao')");
        $_SESSION['msn'] = 'Atividade Enviada';
        header("location: panel.php?id=" . $_SESSION['user_id']);
    }
    else{
        header('location: index.php');
    }

?>