<?php
    session_start();
    include '../conexao.php'; 
    include '../init.php';
    include '../check.php';
    $aluno = $_SESSION['aluno'];
    $_SESSION['page'] = 'login-registro';
    $page = $_SESSION['page'];  
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
        .custom-btn {
        width: 120px;
        padding: 10px;
        margin: 4px;
      }

      .create {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid black;
        border-radius: 5px;
        width: 52%;
        color: #000;
        padding: 4px;
      }
    </style>
</head>
<body>
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
                                <a class="nav-link" href="../index.php">Inicio</a>
                            </li>
                    
                            <li class="<?php if($page == 'course'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="../courses.php">Cursos</a>
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
                                            <a class="nav-link" href="../panel.php?id=<?php echo $_SESSION['user_id'] ?>">Painel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../logout.php">Sair</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php                                    
                                }else{
                            ?>
                            <li class="<?php if($page == 'login-registro'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="../login_regis.php">Login</a>
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

      <div class="wrapper d-flex align-items-stretch" style="background: #eeeeee;">
		<!-- Page Content  -->
        <div id="content" class="container">

            <div class="page3">

                <div class="row justify-content-center" id="page3">
                    <?php
                        $sql = $conn->query("SELECT * FROM alunos WHERE id = '$aluno'");
                        $ln = $sql->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <table class="table table-striped" style="max-width: 700px;">
                        <thead>
                            <tr>
                                <th scope="col" colspan='2' style='text-align: center;'>INFORMAÇÕES DO USUÁRIO</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <tr>
                                <th scope="row"><?php echo $ln['nome'] ?></th>
                                <td><a href="alter.php?alt=name">Alterar</a></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo $ln['email'] ?></th>
                                <td><a href="alter.php?alt=email">Alterar</a></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo substr_replace($ln['senha'], '*************', 0); ?></th>
                                <td><a href="alter.php?alt=password">Alterar</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>        
	</div>
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