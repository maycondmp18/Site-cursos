<?php
    session_start();
    include 'conexao.php'; 
    include 'init.php';
    $_SESSION['page'] = 'index';
    $page = $_SESSION['page'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="img/favicon.jpg" type="image/png" />
    <title>Inicio - Mult Soluções</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/perso.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        #image_course{
            width: 360px;
            height: 283px;
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
                            <li class="<?php if($page == 'index'){echo "nav-item active";} ?>">
                              <a class="nav-link" href="index.php">Inicio</a>
                            </li>
                    
                            <li class="<?php if($page == 'course'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="courses.php">Cursos</a>
                            </li>
                            
                            <li class="<?php if($page == 'sobre'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="sobre.php">Sobre</a>
                            </li>
                            
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Instrutor
                                </a>
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
    <!--================ BUTTON CHAT WHATSAPP =================-->
    <a href="https://wa.me/5588988422959" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
  z-index:1000;" target="_blank">
    <i style="margin-top:16px" class="fa fa-whatsapp"></i>
    </a>

    <!--================ End Header Menu Area =================-->
    
    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="banner_content text-center">
                    <p class="text-uppercase">
                        VENHA PARA A MULT SOLUÇÕES
                    </p>
                    <h2 class="text-uppercase mt-4 mb-5">
                        MELHOR SERVIÇO DE EDUCAÇÃO ONLINE
                    </h2>
                    <div>
                    <a href="sobre.php" class="primary-btn2 mb-3 mb-sm-0">Leia Mais</a>
                    <a href="courses.php" class="primary-btn ml-sm-3 ml-0">Veja nosso cursos</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section id="learn" class="feature_area section_gap_top title-bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Bem vindo</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row h_blog_item">
            <div class="col-lg-6">
              <div class="h_blog_img">
                <img class="img-fluid" src="img/multsolucoes/welcome.jpg" alt="" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="h_blog_text">
                <div class="h_blog_text_inner left right">
                  <h4></h4>
                  <p style="text-align: justify;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Mult soluções é uma organização que tem por escopo 
                    promover a educação profissional, através de nossos cursos, 
                    treinamentos e palestras com cursos customizados e com um 
                    diferencial competitivo viabilizando a otimização profissional. 
                    Dispomos também de soluções e serviços variados pra você e 
                    para o seu negócio.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->
    
    <!--================ Start Feature Area =================-->
    <section id="learn" class="feature_area section_gap_top title-bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Modelo do Certificado</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row h_blog_item">
            <div class="col-lg-6">
              <div class="h_blog_img">
                <img class="img-fluid" src="img/certificado.jpg" alt="" style="whitd" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="h_blog_text">
                <div class="h_blog_text_inner left right">
                  <h4></h4>
                  <p style="text-align: justify;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <center><b><h4>CURSOS DE ATÉ 200 HORAS</h4></b></center><br>
                    <h5>R$ 69,90 - Certificado enviado por email.</h5>
                    <p>Taxa única ou em até 3x R$19,96</p>
                    <h5>R$ 89,90 - Certificado enviado por email + enviado pelo correio para a sua residência.</h5>
                    <p>Taxa única ou em até 3x R$26,63</p>
                    
                    <h5>Seu certificado de cursos livre da Mult-Soluções será emitido, assim que você realizar a solicitação na conclusão do seu curso.</h5>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->


    <!--================ Start Trainers Area =================-->
    <section class="feature_area section_gap_top title-bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Ultimos cursos adicionados</h2>
            </div>
          </div>
        </div>

        <div class="row mb-6">
          <div class="col-lg-12 col-sm-2">
            <div class="owl-carousel active_course">
              
            <?php
              $sql = $conn->query("SELECT * FROM cursos ORDER BY id_curso DESC LIMIT 3");
              $row = $sql->rowCount();
              if($row > 0){
                while($ln = $sql->fetch(PDO::FETCH_ASSOC)){   
            ?>

              <div class="single_course mb-6">
                <div class="course_head">
                  <img class="img-fluid" src="storage/imagens/<?php echo $ln['imagem']; ?>" alt="" id="image_course"/>
                </div>
                <div class="course_content">
                  <div class="row">
                    <div class="col-md-8 col-sm-4 justify-content-center">
                      <h4 class="mb-3">
                        <a href="course-details.php?id_curso=<?php echo $ln['id_curso'] ?>&id_aluno=<?php echo @$_SESSION['user_id'] ?>"><?php echo $ln['nome']; ?></a>
                      </h4>
                    </div>
                  </div>
                  
                  <!-- <span class="tag mb-4 d-inline-block">design</span> -->
                
                </div>
              </div>
              <?php
                }
              }else{
                echo "<h2 class='text-white'>Ainda Não existem cursos adicionados</h2>";
              }
              ?> 
            </div>
          </div>
        </div>
        <div class="col-md-12 text-center" style="margin-top: 20px;">
          <button type="submit" value="submit" class="genric-btn info e-large">
              Todos os cursos
          </button>
        </div>
      </div>
    </section>
    <!--================ End Trainers Area =================-->
    
    <!--================ Start Testimonial Area =================-->
    <div class="testimonial_area section_gap">
      <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Fale conosco</h2>
              <p>
               Queremos ouvi-los, mande sua opnião crítica ou sugestão.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <div class="contact_info">
              <div class="info_item">
                <i class="ti-home"></i>
                <h6>Amontada, Ceará</h6>
                <p>R. Joaquim Tomé, 40, Flores</p>
              </div>
              <div class="info_item">
                <i class="ti-headphone"></i>
                <h6>(88)98842-2959</h6>
                <p>&nbsp;</p>
              </div>
              <div class="info_item">
                <i class="ti-email"></i>
                <h6>matheusgestaopublic@outlook.com ou</h6>
                <h6>mults@outlook.com.br</h6>
                <p>Fale conosco por email</p>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <form class="row contact_form" action="contact_process.php" method="post"
              id="contactForm"
              novalidate="novalidate">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Seu Nome"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Seu nome'"
                    required=""/>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Seu E-mail"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Seu email'"
                    required=""
                  />
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Assunto"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Assunto'"
                    required=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea
                    class="form-control" name="message" id="message" rows="1" placeholder="Mensagem"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Mensagem'"
                    required=""
                  ></textarea>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button type="submit" value="submit" class="genric-btn info e-large">
                    Enviar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Testimonial Area =================-->


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
