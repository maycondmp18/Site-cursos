<?php
    session_start();
    include 'conexao.php'; 
    include 'init.php';
    $_SESSION['page'] = 'login-registro';
    $page = $_SESSION['page']; 
    
    $aluno = $_GET['aluno'];
    $curso = $_GET['curso'];
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
    <link rel="icon" href="../img/favicon.jpg" type="image/png" />
    <title>Painel administrativo || Inicio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/flaticon.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/bootstrap-datepicker.css" rel="stylesheet"/>
    <!-- main css -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="../css/estilo.css" />
    <link rel="stylesheet" href="../css/dashboard.css"/>
    <style>
        .notes {
            line-height: 20px;
        }

        .active{
            color: #fdc632 !important;
            background-color: #002347 !important;
        }
        div.single_content{
            width: 360px !important;
        }
        #user{
            background: #006;
            color: #fff;
        }
        #curso{
            background: #006;
            color: #fff;
        }
        #aula{
            background: #006;
            color: #fff;
        }
        span{
            color: #fff;
        }
        .notificacao {
            text-align: end;
            margin: 10px;
        }
        .notify{
            padding: 4px;
            border-radius: 10%;
            position: relative;
            top: -10px;
            left: -10px;
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
                    
                            <li class="nav-item">
                                <a href="#" class="nav-link"></a>
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
                                            <a class="nav-link" href="#">Painel</a>
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
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="banner_content text-center">
                  <h2>AVALIAÇÃO</h2>
                  <div class="page_link">
                    <a href="main.php">Inicio</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================ End Home Banner Area =================-->

      <!--===================== Pages =========================-->

      <!--
        
        page1 = 'Inicio';
        page2 = 'Cadastro de cursos e aulas';
        page3 = 'Listagem de cursos ja cadastrados'; 

      -->
        <div class="wrapper d-flex align-items-stretch">
		    <?php
		        $sql = $conn->query("SELECT nome, email FROM alunos WHERE id = '$aluno'");
		        $ln = $sql->fetch(PDO::FETCH_ASSOC);
		        
		        $code = $conn->query("SELECT nome FROM cursos WHERE id_curso = '$curso'");
		        $n = $code->fetch(PDO::FETCH_ASSOC);
		        
		    ?>
		    <div class="container mt-5">
		        <form method="post" action="processos.php">
		            <div class="row">
		                <div class="col-md-10">
		                    <p>
		                        <strong>Aluno: </strong><?php echo $ln['nome'] ?><br>
		                        <strong>Email: </strong><?php echo $ln['email'] ?><br>
		                        <strong>Curso: </strong><?php echo $n['nome'] ?><br>
		                    </p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-10">
		                    <label>NOTA</label><br>
		                    <input type="text" name="nota" style="background-color: #fff;">
		                    <input type="hidden" name="curso" value="<?php echo $curso ?>">
		                    <input type="hidden" name="aluno" value="<?php echo $aluno ?>">
		                </div>
		            </div>
    		        <div class="row mt-3 col-4">
    		            <input type="submit" value="AVALIAR" name="avaliar" class="btn btn-primary">
    		        </div>
    		    </form>
		    </div>
		    
	    </div>


    <!--===================== End Pages =========================-->

    
</body>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/panel.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../js/bootstrap-datepicker.min.js"></script> 
		<script src="../js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</html>