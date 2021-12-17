<?php 
    session_start();
    include 'conexao.php';
    include 'init.php';
    $_SESSION['page'] = 'ensine';
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
    <title>Torne-se Instrutor - Mult Soluções</title>
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
                <h2>Torne-se Instrutor</h2>
                <div class="page_link">
                  <a href="index.php">Inicio</a>
                  <a href="ensine.php">Torne-se Instrutor</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Popular sobre Area =================-->
    <div class="popular_courses mt-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Venha dar aulas conosco</h2>
              <p>
                Torne-se instrutor e comece a mudar vidas — incluindo a sua
              </p>
              <a href="professor/registro.php"><button type="button" class="btn btn-primary">Começar agora</button></a>
            </div>
          </div>
        </div>

        <div class="container">
            <center>
          <div class="row">
            <div class="col">
              <img class="img-fluid" src="img/value-prop-inspire-v2.svg" alt="" />
              <h4>Inspire alunos</h4>
              <p style="color:black;">Ensine o que você sabe e ajude os alunos a explorar seus interesses, adquirir novas habilidades e avançar na carreira.</p>
            </div>
            <div class="col">
              <img class="img-fluid" src="img/value-prop-be-yourself-v2.svg" alt="" />
              <h4>Seu jeito de ensinar</h4>
              <p style="color:black;">Publique o curso que você quer, da maneira que achar melhor e sempre tenha controle do seu conteúdo.</p>
            </div>
            <div class="col">
              <img class="img-fluid" src="img/value-prop-get-rewarded-v2.svg" alt="" />
              <h4>Receba recompensas</h4>
              <p style="color:black;">Amplie sua rede profissional, desenvolva seu conhecimento e ganhe dinheiro com cada certificado emitido.</p>
            </div>
          </div>
          </center>
        </div><br><br><br><br><br>
        
        <div class="container">
            <center>
          <div class="row">
            <div class="col">
              <img class="img-fluid" src="img/plan-your-curriculum-v2.svg" alt="" />
              <h4>Planeje sua grade curricular</h4>
                <p style="color:black;">Comece com o que você ama e conhece. Depois, escolha um tema promissor.</p>

                <p style="color:black;">A maneira como você ensina — o seu toque especial — fica a seu critério.</p>
            
                <p><b style="color:black;">Como ajudamos você</b></p>
                <p style="color:black;">Oferecemos muitos recursos sobre como criar seu primeiro curso. Além disso, o painel do instrutor e as páginas de grade curricular ajudam você a manter a organização.</p>

            </div>
            <div class="col">
              <img class="img-fluid" src="img/record-your-video-v2.svg" alt="" />
              <h4>Grave seu vídeo</h4>
                <p style="color:black;">Use ferramentas básicas, como um smartphone ou uma câmera DSLR. Providencie um bom microfone e você já pode começar.</p>

                <p style="color:black;">Se você não gosta de aparecer na câmera, basta capturar sua tela. Seja como for, recomendamos ter pelo menos duas horas de vídeo para um curso.</p>

                <p><b style="color:black;">Como ajudamos você</b></p>
                <p style="color:black;">Nossa equipe de suporte está à disposição para ajudar você no processo e oferecer feedback dos vídeos de teste.</p>
            </div>
            <div class="col">
              <img class="img-fluid" src="img/launch-your-course-v2.svg" alt="" />
              <h4>Lance seu curso</h4>
                < style="color:black;">Promova seu curso em mídias sociais e redes profissionais para receber suas primeiras classificações e avaliações.</p>

                <p style="color:black;">Seu curso poderá ser encontrado na nossa área de cursos, onde você vai gerar receita com cada certificado emitido.</p>

                <p><b style="color:black;">Como ajudamos você</b></p>
                <p style="color:black;">Nossa ferramenta de cupom personalizado permite oferecer incentivos à inscrição, enquanto nossas promoções globais geram tráfego nos cursos.</p>
            </div>
          </div>
          </center>
        </div><br><br><br>
        
        <div class="row justify-content-center">
          <div class="col">
            <div class="main_title">
              <h2 class="mb-3">Você contará com ajuda</h2>
              <h3 style="color:black;">
                Nossa <b>equipe de Suporte ao Instrutor</b> está à disposição para tirar suas dúvidas e avaliar seu 
                vídeo de teste, enquanto nosso <b>Teaching Center</b> oferece diversos recursos que ajudarão você no 
                processo. Além disso, tenha o suporte de instrutores experientes na nossa <b>comunidade online.</b>
              </h3>
            </div>
          </div>
        </div><br><br><br>
        
        <div class="row justify-content-center">
          <div class="col">
            <div class="main_title">
              <h2 class="mb-3">Torne-se um instrutor hoje</h2>
              <h5 style="color:black;">
                Junte-se ao melhor site de cursos online.
              </h5>
              <a href="professor/registro.php"><button type="button" class="btn btn-primary">Começar agora</button></a>
            </div>
          </div>
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
