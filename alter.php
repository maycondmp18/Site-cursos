<?php
    session_start();

    define('HOST', 'localhost');
    define('BANCO', 'multsolucoes-ce');
    define('USER', 'root');
    define('PASS', '');

    try {
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . BANCO, USER,  PASS);
    } catch (PDOException $e) {
        echo "ERRO " . $e->getMessage();
    }
    //include 'conexao.php';
    include 'init.php';
    include 'check.php';
    $id = $_SESSION['aluno'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.jpg" type="image/png" />
    <title>Configurações</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
    <!-- main css -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="css/skin.css" />
</head>
<body>
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <?php
                                $alter = $_GET['alt'];
                                switch($alter){
                                    case 'name':{
                                        echo "<h2>Alterar Nome</h2>";
                                        break;
                                    }
                                    case 'email':{
                                        echo "<h2>Alterar Email</h2>";
                                        break;
                                    }
                                    case 'password':{
                                        echo "<h2>Alterar Senha</h2>";
                                        break;
                                    }
                                }
                            ?>  
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="wrapper d-flex align-items-stretch" style="background: #eeeeee;">
		<!-- Page Content  -->
        <div id="content" class="container-fluid p-4 p-md-5 pt-5">
            <?php
                $alter = $_GET['alt'];
                switch($alter){

                    //Caso o usuario queira alterar o nome
                    case 'name':{
                        $sql = $conn->query("SELECT id, nome FROM alunos WHERE id = '$id'");
                        $ln = $sql->fetch(PDO::FETCH_ASSOC);
            ?>
 
                <form method="post" action="processo.php">
                    
                    <input type="hidden" name="id" value="<?php echo $ln['id'] ?>">
                    <input type="hidden" name="element" value="nome">
                    
                    <div class="row justify-content-center">   
                        <div class="col-md-6">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $ln['nome']?>" style="text-align: center">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-danger" name="BtnCancel" value="Cancelar">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-success" name="BtnAlter" value="Alterar">
                        </div>
                    </div>
                </form>
            <?php

                        break;
                    }

                    //Caso o usuario queira alterar o email
                    case 'email':{ 
                        $sql = $conn->query("SELECT id, email FROM alunos WHERE id = '$id'");
                        $ln = $sql->fetch(PDO::FETCH_ASSOC);
            ?>

                <form method="post" action="processo.php">
                    
                    <input type="hidden" name="id" value="<?php echo $ln['id'] ?>">
                    <input type="hidden" name="element" value="email">
                    
                    <div class="row justify-content-center">   
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $ln['email']?>" style="text-align: center">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-danger" name="BtnCancel" value="Cancelar">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-success" name="BtnAlter" value="Alterar">
                        </div>
                    </div>
                </form>
            <?php
                        break;
                    }

                    //Caso o usuario queira alterar o email
                    case 'password':{
                        $sql = $conn->query("SELECT id, senha FROM alunos WHERE id = '$id'");
                        $ln = $sql->fetch(PDO::FETCH_ASSOC);
            ?>

                <form method="post" action="processo.php">
                    
                    <input type="hidden" name="id" value="<?php echo $ln['id'] ?>">
                    <input type="hidden" name="element" value="senha">
                    
                    <div class="row justify-content-center">   
                        <div class="col-md-6">
                            <label>Nova Senha</label>
                            <input type="password" name="senha" class="form-control" style="text-align: center">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">   
                        <div class="col-md-6">
                            <label>Repita a Senha</label>
                            <input type="password" name="repitasenha" class="form-control" style="text-align: center">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 ">
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-danger" name="BtnCancel" value="Cancelar">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-success" name="BtnAlter" value="Alterar">
                        </div>
                    </div>
                </form>
            <?php
                        break;
                    }
                    default:{
                        echo "nenhuma opção selecionada";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>