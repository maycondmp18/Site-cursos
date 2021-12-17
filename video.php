<?php
    session_start();
    include 'conexao.php';
    include 'init.php'; 


    $curso = $_GET['id'];
    $aluno = $_SESSION['user_id'];
    
    if(empty($curso)){
        header('Location: courses.php');
    }

    $sql = $conn->query("SELECT * FROM cursos WHERE id_curso = '$curso'");
    $ln = $sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION['link'] = $ln['link'];
    include 'videoList.php';
    $_SESSION['page'] = 'video';
    $page = $_SESSION['page'];
    
    $video = isset($_GET['video']) ? $_GET['video'] : $videoList['videos'][0]['id'];

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
    <title>Cursos - Mult Soluções</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- Player video -->
    <link rel="stylesheet" href="css/jlplayer.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/perso.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <style>
        .menu{
            background: rgb(33, 33, 33);
            margin-left: -12px;
            overflow-y: scroll;
            overflow-x: hidden;
            height: 600px;
            margin-top: 100px;
        }
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: rgb(50 , 50, 50);  
        }
        .menu a{
            margin: 2px;
            width: 100%;
            text-align: left;
            color: #fff;
            padding: 10px;
        }
        .menu a:hover{
            background: rgb(56, 56, 56);
        }
        section#conteiner{
            background: rgb(24, 24, 24);
            height: 100vh;
        }
        #image_course{
            width: 360px;
            height: 283px;
        }
        .main_menu img{
          width: 130px;
        }
        @media (max-width: 991px){
          .main_menu .navbar{
              background: #002347 !important;
          }
        }
        h1{
          font-family: 'Arial', 'Time new Roman';
          font-size: 24px;
          color: #fff;
          text-transform: uppercase;
        }
        li {
            padding: 10px;
        }
        li a{
            
          text-transform: uppercase;
        }
        iframe{
            width: 80%;
            height: 90%;
        }
        @media screen and (max-width: 770px) {
            iframe{
                width: 100%;
                height: 100%;
            }
        }
    </style>
  </head>

  <body style="background: rgb(24, 24, 24)">
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header">
        <div class="main_menu">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php">            
                      <img src="img/logo3.png" alt="">
                    </a>
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

    <section class="container-fluid" id="conteiner">
        <div class="row">

            <div class="col-xl-8 col-md-6 col-sm-6 mt-100">
                <iframe src="https://www.youtube.com/embed/<?php echo $video ?>" style="width: 100%;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class="text-white mt-2">
                    BAIXAR MATERIAL DE ESTUDO >>
                    <a href="storage/material/<?php echo $ln['material'] ?>">
                        Clique Aqui
                    </a>
                </p>
            </div>

            <div class="col-xl-4 col-md-6 col-sm-5">
                <nav class="menu">
                    <?php
                        foreach ($videoList['videos'] as $key => $value) {
                    ?>
                        <a href="?id=<?php echo $curso ?>&video=<?php echo $value['id'] ?>" class="nav-link">
                            <?php echo $value['title'] ?>
                        </a>
                    <?php
                        }
                    ?>

                    <a href="storage/atividade/<?php echo $ln['atividade'] ?>" class="nav-link">
                        ATIVIDADE
                    </a>
                    
                    <?php
                        $v = $conn->query("SELECT * FROM avaliacao WHERE aluno = '$aluno' AND curso = '$curso'");
                        $r = $v->fetch(PDO::FETCH_ASSOC);
                        if(isset($r['nota']) && $r['nota'] >= 7){
                    ?>
                            <a href="venda/envio.php?curso=<?php echo $curso ?>&aluno=<?php echo $aluno ?>" class="nav-link">SOLICITAR CERTIFICADO</a>';
                    <?php
                        }else{
                    ?>
                            <a href="EnviarAtv.php?curso=<?php echo $ln['id_curso']; ?>" class="nav-link">ENVIAR ATIVIDADE</a>
                    <?php
                        }
                    ?>
                </nav>
            </div>
            
        </div>
    </section>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- Player video -->
    <script src="js/jlplayer.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
    <script>
    
      
    </script>
  </body>
</html>
