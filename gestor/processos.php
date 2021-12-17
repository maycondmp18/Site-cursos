<?php
    session_start();
    require 'conexao.php';

    if(isset($_POST['cadastro'])){

        //CADASTRANDO PROFESSORES

        //Dados pessoais
        $nome = $_POST['nome'];
        $email = preg_replace('/[^a-zA-Z0-9.@]/', '', $_POST['email']);
        $senha = md5(preg_replace('/[^[:alnum:]_]/', '', $_POST['senha']));
        $repita = md5(preg_replace('/[^[:alnum:]_]/', '', $_POST['repita']));
        

        if($senha == $repita){
            $sql = $conn->query("INSERT INTO administrador (nome, email, senha) VALUES ('$nome', '$email', '$senha')");

            $_SESSION['mensagem'] = "<p style='color: green;'>Cadastro realizado com sucesso!</p>";
            header("Location: index.php");
        }else{
            $_SESSION['mensagem'] = "<p style='color: red;'>As senhas não correspondem</p>";
            header("Location: registro.php");
        }
        

    }elseif (isset($_POST['loginProfessor'])) {
        
        //LOGIN PROFESSOR

        $email = preg_replace('/[^a-zA-Z0-9.@_]/', '', $_POST['email']);
        $senha = preg_replace('/[^[:alnum:]_]/', '', $_POST['senha']);

        $sql = $conn->query("");

    }elseif (isset($_POST['addCurso'])) {

        //processo de cadastro de curso
        $nome = $_POST['titulo'];
        $image = $_FILES['image']['name'];
        $desc = $_POST['descricao'];
        $link = $_POST['link'];
         
        $diretorio = '../storage/imagens/'; //Diretorio para onde a o sistema fará upload
        move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$image); //mover a imagem para o diretorio
   
        $sql = $conn->query("INSERT INTO cursos (nome, imagem, descricao, id_professor, link, data) VALUES ('$nome', '$image', '$desc', '" . $_SESSION['user_id'] . "', '$link', NOW())");
        if($sql){
            $_SESSION['mensagem'] = "<p style='color:green'>O Curso foi cadastrado com sucesso!!!</p>";
            header('Location: addcourse.php');
        }else{
            $_SESSION['mensagem'] = "<p style='color:red'>Ocorreu um erro ao tentar cadastrar o curso. <br> Por favor tente mais tarde!</p>";
            header('Location: addcourse.php');
        }
   
    }else{
        header('Location: index.php');
    }