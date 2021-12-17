<?php
  session_start();
  include 'conexao.php';
  include 'init.php';
  $page = 'course';
  $id_curso = $_GET['id_curso'];
  $id_aluno = $_GET['id_aluno'];
  $code = $conn->query("SELECT nome, link FROM cursos WHERE id_curso = '$id_curso'");
  $ln = $code->fetch(PDO::FETCH_ASSOC);
  $_SESSION['link'] = $ln['link'];

  include 'videoList.php';
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
    <title>Detalhe do curso - <?php echo $ln['nome'] ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
      #image_details{
        width: 1280px;
        height: 720px;
      }
      .main_menu img{
          width: 130px;
        }
        @media (max-width: 1600px){
          .main_menu .navbar{
              background: #002347 !important;
          }
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
                    <a class="navbar-brand" href="index.php">
                        <img class="logo-2" src="img/logo3.png" alt="" />
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
                <h2>Course Details</h2>
                <div class="page_link">
                  <a href="index.php">Inicio</a>
                  <a href="courses.php">Cursos</a>
                  <a href="course-details.php">Detalhes do curso</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Details Area =================-->
    <?php
      //listagem dos elementos de cada curso dependendo do id
      $sql = $conn->query("SELECT * FROM cursos WHERE id_curso = '$id_curso'");
      $ln = $sql->fetch(PDO::FETCH_ASSOC);
    ?>
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="storage/imagens/<?php echo $ln['imagem'] ?>" alt="" id="image_details">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title">Descrição</h4>
                        <div class="content">
                            <?php echo $ln['descricao'] ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 right-contents">
                    <ul>
                        <li>
                            <span class="justify-content-between d-flex" href="#">
                                <p>Curso</p>
                                <span class="or"><?php echo $ln['nome'] ?></span>
                            </span>
                        </li>
                        <li>
                            <span class="justify-content-between d-flex" href="#">
                                <p>Preço</p>
                                <span class="or">Gratuito</span>
                            </span>
                        </li>
                        <li>
                            <span class="justify-content-between d-flex" href="#">
                                <p>Quantidade de aulas</p>
                                <span class="or"><?php echo count($videoList['videos']); ?></span>
                            </span>
                        </li>
                    </ul>

                    <?php
                      $ins = $conn->query("SELECT * FROM cursos_adquiridos WHERE id_curso = '$id_curso' AND id_aluno = '$id_aluno'");
                      if($ins->rowCount() > 0){
                        echo "Você ja possui esse curso";
                      }else{
                    ?>
                    
                    <form method="post" action="processo.php">
                      <input type="hidden" name="id_curso" value="<?php echo $id_curso ?>">
                      <input type="hidden" name="id_aluno" value="<?php echo $id_aluno ?>">
                      <button class="primary-btn text-uppercase enroll rounded-0" name="addCourse" type="submit">Inscreva-se no curso</button>
                    </form>

                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | 
Este modelo é feito com  <i class="ti-heart" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
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