<?php
    session_start();
    require 'conexao.php';

    if(isset($_POST['cadProfessor'])){

        //CADASTRANDO PROFESSORES

        //Dados pessoais
        $nome = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $telefone = $_POST['telefone'];
        $cpf = base64_encode($_POST['cpf']);
        $sexo = $_POST['sexo'];

        //Dados Profissionais
        $formacao = $_POST['formacao'];
        $arquivo = $_FILES['curriculum'];
        $experiencia = $_POST['experiencia'];


        //Dados de Acesso
        $email = preg_replace('/[^a-zA-Z0-9.@]/', '', $_POST['email']);
        $senha = md5(preg_replace('/[^[:alnum:]_]/', '', $_POST['senha']));
        $repita = md5(preg_replace('/[^[:alnum:]_]/', '', $_POST['repita']));
        

        if($senha == $repita){
            //Fazendo o upload do arquivo Arquivo
            $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
            $curriculum = $nome . '.' . $extensao;
            $diretorio = "../storage/curriculum/";

            move_uploaded_file($arquivo['tmp_name'], $diretorio . $curriculum);

            //Status 0 Aprovado, 1 Aguardando, 2 Reprovado
            $sql = $conn->query("INSERT INTO professor (nome, data, telefone, cpf, sexo, formacao, curriculum, experiencia, email, senha, status)
                    VALUE ('$nome', '$nascimento', '$telefone', '$cpf', '$sexo', '$formacao', '$curriculum', '$experiencia', '$email', '$senha', 1)");

            $_SESSION['mensagem'] = "<p style='color: green;'>Sua solicitação foi enviada! Por favor aguarde a resposta do ADM</p>";
            header("Location: index.php");
        }else{
            $_SESSION['mensagem'] = "<p style='color: red;'>As senhas não correspondem</p>";
            header("Location: registro.php");
        }
        

    }elseif (isset($_POST['add'])) {
        
        if(isset($_FILES['material']) && !empty($_FILES['material'])){

            $curso = $_POST['curso'];

            $code = $conn->query("SELECT nome FROM cursos WHERE id_curso = '$curso'");
            $ln = $code->fetch(PDO::FETCH_ASSOC);


            $nome = $ln['nome'];
            $estudo = $_FILES['material'];

            echo $nome;

            //ARMAZENAMENTO DO MATERIAL DE ESTUDO
            $diretorio = "../storage/material/";
            
            $extensao = strtolower(pathinfo($estudo['name'], PATHINFO_EXTENSION));
            $material = $nome . '.' . $extensao;
            move_uploaded_file($estudo['tmp_name'], $diretorio . $material);

            $sql = $conn->query("UPDATE cursos SET material = '$material' WHERE id_curso = '$curso'");
            header('Location: main.php');
        }
        if(isset($_FILES['atividade']) && !empty($_FILES['atividade'])){

            $curso = $_POST['curso'];

            $code = $conn->query("SELECT nome FROM cursos WHERE id_curso = '$curso'");
            $ln = $code->fetch(PDO::FETCH_ASSOC);


            $nome = $ln['nome'];
            $atv = $_FILES['atividade'];

            //ARMAZENAMENTO DA ATIVIDADE INTERDISCIPLINAR DO CURSO
            $diretorio = "../storage/atividade/";
            
            $extensao = strtolower(pathinfo($atv['name'], PATHINFO_EXTENSION));
            $atividade = $nome . '.' . $extensao;
            move_uploaded_file($atv['tmp_name'], $diretorio . $atividade);

            $sql = $conn->query("UPDATE cursos SET atividade = '$atividade' WHERE id_curso = '$curso'");
            header('Location: main.php');
        }

    }elseif (isset($_POST['addCurso'])) {

        //processo de cadastro de curso
        $nome = $_POST['titulo'];
        $image = $_FILES['image']['name'];
        $desc = $_POST['descricao'];
        $link = $_POST['link'];
        $estudo = $_FILES['material'];
        $atv = $_FILES['atividade'];

        //ARMAZENAMENTO DO MATERIAL DE ESTUDO
        $diretorio = "../storage/material/"; //Diretorio para onde a o sistema fará upload
        
        $extensao = strtolower(pathinfo($estudo['name'], PATHINFO_EXTENSION));
        $material = $nome . '.' . $extensao;
        move_uploaded_file($estudo['tmp_name'], $diretorio . $material);

        //ARMAZENAMENTO DA ATIVIDADE INTERDISCIPLINAR DO CURSO
        $diretorio = "../storage/atividade/";
        
        $extensao = strtolower(pathinfo($atv['name'], PATHINFO_EXTENSION));
        $atividade = $nome . '.' . $extensao;
        move_uploaded_file($atv['tmp_name'], $diretorio . $atividade);

        //ARMAZENAMENTO DO BANNER DO CURSO
        $diretorio = '../storage/imagens/';
        move_uploaded_file($_FILES['image']['tmp_name'], $diretorio . $image); //mover a imagem para o diretorio
   
        $sql = $conn->query("INSERT INTO cursos (nome, imagem, descricao, id_professor, material, atividade, link, data) VALUES ('$nome', '$image', '$desc', '" . $_SESSION['user_id'] . "', '$material', '$atividade', '$link', NOW())");
        if($sql){
            $_SESSION['mensagem'] = "<p style='color:green'>O Curso foi cadastrado com sucesso!!!</p>";
            header('Location: addcourse.php');
        }else{
            $_SESSION['mensagem'] = "<p style='color:red'>Ocorreu um erro ao tentar cadastrar o curso. <br> Por favor tente mais tarde!</p>";
            header('Location: addcourse.php');
        }
   
    }elseif (isset($_POST['avaliar'])) {
        
        $nota = $_POST['nota'];
        $curso = $_POST['curso'];
        $aluno = $_POST['aluno'];
        
        $sql = $conn->query("UPDATE avaliacao SET nota = '$nota' WHERE aluno = '$aluno' AND curso = '$curso'");
        header("Location: main.php");
        
    }else{
        header('Location: index.php');
    }