<?php
    session_start();
    include 'conexao.php'; 
    include 'init.php';
    $aluno = $_SESSION['aluno'];
    $_SESSION['page'] = 'login-registro';
    $page = $_SESSION['page']; 
    
    $curso = $_GET['curso'];
    $sql = $conn->query("SELECT nome, id_professor FROM cursos WHERE id_curso = '$curso'");
    $ln = $sql->fetch(PDO::FETCH_ASSOC);
    $prof = $ln['id_professor'];
    $course = $ln['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="img/favicon.jpg" type="image/png" />
    <title>Painel administrativo || Inicio</title>
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
    <link rel="stylesheet" href="css/dashboard.css"/>
    <style>
        #second-menu{
            position: absolute;
            top: 153px;
        }
        #image_course{
            width: 360px;
            height: 283px;
        }
        .active{
            color: #fdc632 !important;
            background-color: #002347 !important;
        }
        div.single_content{
            width: 360px !important;
        }
        #user{
            background: #fdc632;
            color: #fff;
        }
        #certificate{
            background: #738678;
            color: #fff;
        }
        span{
            color: #fff;
        }
    </style>
</head>
<body onload="active('body')">
    <header class="header_area white-header">
        <div class="main_menu">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Inicio</a>
                            </li>
                    
                            <li class="<?php if($page == 'course'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="courses.php">Cursos</a>
                            </li>   
                        
                            <?php
                                if(isLoggedIn()){
                            ?>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        role="button"
                                        aria-haspopup="true"
                                        aria-expanded="false" style="text-transform: uppercase;">
                                    <?php echo $_SESSION['user_name']; ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="panel.php?id=<?php echo $_SESSION['user_id'] ?>">Painel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php">Sair</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php                                    
                                }else{
                            ?>
                            <li class="<?php if($page == 'login-registro'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="login_regis.php">Login</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
          <div class="overlay"></div>
          <div class="container">
            
          </div> 
        </div>
      </section>
      <!--================ End Home Banner Area =================-->

      <!--===================== Pages =========================-->

      <!--
        
        page1 = 'Cursos adiquiridos pelo aluno';
        page2 = 'Certificado de conclusão de cada curso';
        page3 = ''; 

      -->
        <div class="wrapper d-flex align-items-stretch" style="background: #eeeeee;">
    		<!-- Page Content  -->
            <div id="content" class="container">
                <div class="animated">
                    <form method="post" action="processos.php" enctype="multipart/form-data">
                        <div class="row mt-5">
                            <div class="col-md-10">
                                <?php
                                    $info = $conn->query("SELECT nome, email FROM professor WHERE id = '$prof'");
                                    $row = $info->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <p style="color: black;">
                                    <strong>PROFESSOR:</strong> <?php echo $row['nome'] ?><br>
                                    <strong>EMAIL:</strong> <?php echo $row['email'] ?><br>
                                    <strong>CURSO:</strong> <?php echo $course ?><br>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="avaliacao" class="form-control"/>
                                <input type="hidden" name="aluno" value="<?php echo $_SESSION['user_id'] ?>">
                                <input type="hidden" name="curso" value="<?php echo $curso ?>">
                            </div>
                        </div>
                        <div class="row col-2 mt-3">
                            <input type="submit" name="atv" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>        
	    </div>


    <!--===================== End Pages =========================-->
</body>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/panel.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datepicker.min.js"></script> 
		<script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/dashboard.js"></script>
</html>