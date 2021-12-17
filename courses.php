<?php 
    session_start();
    include 'conexao.php';
    include 'init.php';
    $_SESSION['page'] = 'course';
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
    <link rel="icon" href="img/favicon.jpg" type="image/png" />
    <title>Cursos - Mult Soluções</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/perso.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <style>
        #image_course{
            width: 360px;
            height: 250px;
        }
        .main_menu img{
          width: 130px;
        }
        @media (max-width: 991px){
          .main_menu .navbar{
              background: #002347 !important;
          }
        }
        
        div.course_content::-webkit-scrollbar {
            width: 0px;
        }
          
        div.course_content::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: rgb(50 , 50, 50);  
        } 
    </style>
  </head>

  <body>
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
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Inicio</a>
                            </li>
                    
                            <li class="<?php if($page == 'course'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="courses.php">Cursos</a>
                            </li>   
                            
                            <li class="<?php if($page == 'sobre'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="sobre.php">Sobre</a>
                            </li>
                            
                            <li class="nav-item submenu dropdown">
                                <a class="nav-link" href="#">Instrutor</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="ensine.php">Torne-se Instrutor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="professor">Área do Instrutor</a>
                                    </li>
                                </ul>
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
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Cursos</h2>
                <div class="page_link">
                  <a href="index.php">Inicio</a>
                  <a href="courses.php">Cursos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Cursos Disponíveis</h2>
              <p>
                Os melhores cursos estão disponiveis aqui
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- single course -->
          <?php
            $sql = $conn->query("SELECT * FROM cursos ORDER BY id_curso DESC");
            $row = $sql->rowCount();
            if($row > 0){
              while($ln = $sql->fetch(PDO::FETCH_ASSOC)){
          ?>
          <div class="col-lg-3 mb-4">
            <div class="single_course">
                <div class="course_head" style="height: 250px;">
                  <a href="course-details.php?id_curso=<?php echo $ln['id_curso'] ?>&id_aluno=<?php echo @$_SESSION['user_id'] ?>">
                    <img class="img-fluid" src="storage/imagens/<?php echo $ln['imagem']; ?>" alt="" id="image_course"/>
                  </a>
                </div>
                <div class="course_content" style="height: 100px; overflow: auto;">
                  <div class="row">
                    <div class="col-md-8 justify-content-center">
                      <h4 class="mb-3">
                        <a href="course-details.php?id_curso=<?php echo $ln['id_curso'] ?>&id_aluno=<?php echo @$_SESSION['user_id'] ?>"><?php echo $ln['nome']; ?></a>
                      </h4>
                    </div>
                  </div>
                  
                  <!-- <span class="tag mb-4 d-inline-block">design</span> -->
                
                </div>
              </div>
          </div>
 
          <?php
            }
          }else{
            echo "<h2>Ainda não há cursos disponiveis</h2>";
          }
          ?>
        </div>
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Desenvolvido &copy; <script>document.write(new Date().getFullYear());</script> Todos os direitos reservados por <a href="https://www.instagram.com/systemtag/" target="_blank">Systemtag</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="https://www.facebook.com/multpossibilidadescoach"><i class="ti-facebook"></i></a>
            <a href="https://www.instagram.com/multsolucoesce/"><i class="ti-instagram"></i></a>
          </div>
        </div>
      </div>
    </footer> 
    <!--================ End footer Area  =================-->

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
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
  </body>
</html>
