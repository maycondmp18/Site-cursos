<?php
    session_start();
    include 'init.php';
    include 'conexao.php';
    $_SESSION['page'] = 'login-registro';
    $page = $_SESSION['page']; 
    $id_prof = $_SESSION['user_id'];
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
    <title>Área do Professor - Mult Soluções</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/flaticon.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="../css/perso.css" />
    <link rel="stylesheet" href="../css/estilo.css" />
    <style>
        .main_menu img{
          width: 130px;
        }
        @media (max-width: 991px){
          .main_menu .navbar{
              background: #002347 !important;
          }
      }
      
      @media (max-width: 900px){
        .single_course{
          width: 360px !important;
          margin-bottom: 4px !important;
        }
      }

      #add {
        width: 170px;
        height: 42px;
        border: 2px solid rgb(62, 166, 255);
        color: rgb(62, 166, 255);
        text-transform: uppercase;
        outline: none;
      }

      #add:hover {
        background: rgb(62, 166, 255);
        color: #fff;
      }

      #image {
          height: 180px;
          width: 300px;
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
                        <img src="../img/logo3.png" alt="">
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
                                          <a class="nav-link" href="main.php">Painel</a>
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
                                <a class="nav-link" href="registro.php">Cadastre-se</a>
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
                <h2 class="text-center">ÁREA DO PROFESSOR</h2>
                <div class="page_link">
                    <a href="main.php">Inicio</a>
                    <a href="cursos.php">cursos</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================ End Home Banner Area =================-->
    
    <!--================ Start Cursos =================-->
    

    <div class="container mt-3 mb-3" style="height: 400px; display: flex; flex-direction: column; align-items: center;">

        <table class="table table-striped">
            <tr class='text-center'>
                <td style='text-transform: uppercase;'>Curso</td>
                <td style='text-transform: uppercase;'>Quantidade de alunos</td>
            </tr>
            
            <!--

            id do curso 
            id do Professor
            id do aluno

            id do professor tem que esta ligado ao curso na tabela 'cursos'
            o id do aluno tem que esta ligado ao curso 'cursos_adiquiridos'

            -->

            <?php 
                $curso = $conn->query("SELECT * FROM cursos WHERE id_professor = " . $_SESSION['user_id']);
                while($ln = $curso->fetch(PDO::FETCH_ASSOC)){
                  $al = $conn->query("SELECT count(*) AS total FROM cursos_adquiridos WHERE id_curso = '" . $ln['id_curso'] . "'");
                  while($row = $al->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                    <td><?php echo '<a href="details.php?curso=' . $ln['id_curso'] . '">' . $ln['nome'] . '</a>' ?></td>
                    <td><?php echo $row['total'] ?></td>
                </tr>
            <?php
                  }
                }
                
            ?>

        </table>
    
    </div>

    <!--================ End Cursos =================-->

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
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../js/owl-carousel-thumb.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="../js/gmaps.min.js"></script>
    <script src="../js/theme.js"></script>
  </body>
</html>
