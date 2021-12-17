<?php
    session_start();
    include 'conexao.php';
    if(isset($_POST['BtnCadCurso'])){

        //processo de cadastro de curso
        $nome_curso = $_POST['nome_curso'];
        $preco_curso = $_POST['preco_curso'];
        $image_curso = $_FILES['image_curso']['name'];
        $desc_curso = $_POST['desc_curso'];
        
        $diretorio = 'storage/imagens/'; //Diretorio para onde a o sistema fará upload
        move_uploaded_file($_FILES['image_curso']['tmp_name'], $diretorio.$image_curso); //mover a imagem para o diretorio
        
        $sql = $conn->query("INSERT INTO cursos (nome, preco, imagem, descricao) VALUES ('$nome_curso', '$preco_curso', '$image_curso', '$desc_curso')");
    
        if($sql){
            echo "<script>
                alert('Salvo com sucesso');
                window.location='admin.php';
            </script>";
        }else{
            echo "<script>
                alert('Erro ao salvar);
                window.location='admin.php';
            </script>";
        }
    }elseif(isset($_POST['BtnCadVideo'])) {
        
        //Preocesso de cadastro de videos aos cursos
        $title = $_POST['title'];
        $video = $_FILES['video']['name'];
        $tipo = $_FILES['video']['type'];
        $curso = $_POST['curso'];
        
        $diretorio = 'storage/videos/'; //Diretorio para onde a o sistema fará upload
        move_uploaded_file($_FILES['video']['tmp_name'], $diretorio.$video); //mover a imagem para o diretorio

        $sql = $conn->query("INSERT INTO videos (nome, titulo, tipo, id_curso) VALUES ('$video', '$title', '$tipo', '$curso')");
    
        if($sql){
            echo "<script>
                alert('Salvo com sucesso');
                window.location='admin.php';
            </script>";
        }else{
            echo "<script>
                alert('Erro ao salvar);
                window.location='admin.php';
            </script>";
        }

    }elseif(isset($_POST['BtnAlter'])){

        //Preocesso de alterações
        $id = $_POST['id']; //Identificação dos dados na tabela
        $element = $_POST['element'];
        switch($element){
            case 'nome':{
                $nome = $_POST['nome'];
                $sql = $conn->query("UPDATE alunos SET nome = '$nome' WHERE id = '$id'");
                header("location: usuario.php");
                break;
            }
            case 'email':{
                $email = $_POST['email'];
                $sql = $conn->query("UPDATE alunos SET email = '$email' WHERE id = '$id'");
                header("location: usuario.php");
                break;
            }
            case 'senha':{
                $senha = sha1(md5($_POST['senha']));
                $sql = $conn->query("UPDATE alunos SET senha = '$senha' WHERE id = '$id'");
                header("location: usuario.php");
                break;
            }
        }
        

    }elseif(isset($_POST['BtnEsq'])){

        //Preocesso de recuperação de senha
        $email = $_POST['email'];
        $codigo = rand(1000, 9999);

        $sql = $conn->query("SELECT * FROM alunos WHERE email = 'email'");
        $ln = $sql->fetch(PDO::FETCH_ASSOC);

        if($sql){
            $_SESSION['nome_verify'] = $ln['nome'];
            $_SESSION['email_verify'] = $email;
            $_SESSION['cod_verify'] = $codigo;

            header("location: mail.php");
            
        }else{
            
            
            echo "<script>
                alert('Esta e-mail não esta cadastrado em nosso sistema');
                window.location='login_regis.php';
            </script>";
        }

    }elseif(isset($_POST['BtnVerify'])){

        //Preocesso de verificação de codigo
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $n3 = $_POST['n3'];
        $n4 = $_POST['n4'];

        $cod = $n1 . $n2 . $n3 . $n4;
        $cod_verify = $_SESSION['cod_verify'];

        if($cod == $cod_verify){

            $mail = $_SESSION['email_verify'];
            $sql = $conn->query("SELECT id FROM alunos WHERE email = '$mail'");
            $ln = $sql->fetch(PDO::FETCH_ASSOC);
            $id = $ln['id'];
            $_SESSION['aluno'] = $id;
            
            header("location: alter.php?alt=password");
        }else{
            $_SESSION['error'] = "<p style='color: red'>O codigo informado esta incorreto</p>";
            header('location: codverify.php');
        }

    }elseif(isset($_POST['BtnCancel'])){
        
        header("location: usuario.php");

    }elseif(isset($_POST['BtnCancel2'])){
        
        header("location: login_regis.php");

    }elseif(isset($_POST['BtnCad'])){
        
        //Processo de Cadastro de ususario
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $c_senha = $_POST['c_senha'];

        //verificar se o email ja foi ultilizado
        $sql = $conn->query("SELECT * FROM alunos WHERE email = '$email'");
        $row = $sql->rowCount();
        if($row > 0){
            $_SESSION['error'] = "<p style='color: red'>O email ja possui um cadastro, tente fazer login ou tente outro email</p>";
            header("location: login_regis.php");
        }else{
            //$_SESSION['situacao'];
            if($senha == $c_senha){
                $name = $nome . " " . $sobrenome;
                $pass = sha1(md5($senha));
                
                //inserindo no banco com checagem de email 0 = true & 1 = false
                $sql = $conn->query("INSERT INTO alunos (nome, email, senha, email_checking) VALUES ('$name', '$email', '$pass', 0)");
                if($sql){
                    
                    $code = $conn->query("SELECT * FROM alunos WHERE email = '$email'");
                    $ln = $code->fetch(PDO::FETCH_ASSOC);
                    
                    $_SESSION['id_user'] = $ln['id'];
                    $_SESSION['nome_user'] = $ln['nome'];
                    $_SESSION['email_user'] = $ln['email'];
                    
                    $_SESSION['success'] = "<p style='color: green'>Cadastro realizado com sucesso!</p>";
                    header("location: login_regis.php");
                    
                }else{
                    $_SESSION['error'] = "<p style='color: red'>Erro ao cadastrar</p>";
                    header("location: login_regis.php");
                }
            }else{
                $_SESSION['error'] = "<p style='color: red'>As senhas não correspondem</p>";
                header("location: login_regis.php");
            }
        }

    }elseif (isset($_POST['addCourse'])) {
        
        $curso = $_POST['id_curso'];
        $aluno = $_POST['id_aluno'];

        $sql = $conn->query("INSERT INTO cursos_adquiridos (id_curso, id_aluno) VALUES ('$curso', '$aluno')");
        if($sql){
            header('Location: video.php?id=' . $curso);
        }

    }
    else{
        $_SESSION['msg'] = "<p style='color: red;'>Erro ao salvar arquivo</p>";
        header('Location: index.php ');
    }