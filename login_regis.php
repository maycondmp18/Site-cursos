<?php
    session_start();
    include 'conexao.php';
    include 'init.php';
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
    <link rel="icon" href="img/favicon.jpg" type="image/png" />
    <title>Login - Mult Soluções</title>
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
                  <h2>Login / Registro</h2>
                  <div class="page_link">
                    <a href="index.php">Inicio</a>
                    <a href="login_regis.php">Contato</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================ End Home Banner Area =================-->
    
    <!--================ Start Login and Registro =================-->
    
    <section class="contact_area section_gap">
                        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <?php
                        echo @$_SESSION['success'];
                        echo @$_SESSION['error'];
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-5">
                    <h3 class="mb-30 title_color">Login</h3>
                    <form action="login.php" method="post">
                        <div class="mt-10">
                            <input type="email" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="senha" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <button type="submit" name="BtnLogin" class="genric-btn info e-large">
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="col-lg-0 col-md-0">
                    <div id="line" style="border: #002347 solid 1px; height: 100%; width: 1%;"></div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <h3 class="mb-30 title_color">Registrar-se</h3>
                    
                    <form action="processo.php" method="post">
                        <div class="mt-10">
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="nome" placeholder="Primeiro Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primeiro Name'" required="" class="single-input">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="sobrenome" placeholder="Último Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ultimo Nome'" required="" class="single-input">
                                </div>
                            </div>
                        <div class="mt-10">
                            <input type="email" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="senha" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" required="" class="single-input" maxlength="20">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="c_senha" placeholder="Confirme a senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirme a Senha'" required="" class="single-input" maxlength="20">
                        </div>
                        <div class="mt-10">
                            <button class="genric-btn info e-large" name="BtnCad">
                                Registre-se
                            </button>
                        </div>
                    </form>
                </div>
            </div>   
        </div>
    </section>  
    <!--================ End Login and Registro =================-->

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
