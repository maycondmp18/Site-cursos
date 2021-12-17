<?php
    session_start();
    include 'init.php';
    include 'conexao.php';
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
    <title>Adicionar Curso - Mult Soluções</title>
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

      #capa {
          position: absolute;
          width: 400px;
          height: 250px;
          display: none;
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
                    <h2>ADICIONAR CURSO</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================ End Home Banner Area =================-->
    
    <!--================ Start Cursos =================-->
    
    <section class="contact_area section_gap">
        <div class="container">
            <?php
                echo @$_SESSION['mensagem'];
            ?>
            <form action="processos.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="Titulo">Título</label>
                        <input type="text" class="form-control" name="titulo" id="Titulo">
                    </div>
                    <div class="col-md-6">
                      <img src="" id="capa" alt="">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="Capa">Capa</label>
                        <input type="file" class="form-control" name="image" id="Capa" onchange="previewImage()">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="Descricao">Descrição</label>
                        <textarea name="descricao" class="form-control" id="Descricao" cols="30" rows="10" style="resize: none;"></textarea>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="Link">Link do curso</label>
                        <input type="text" class="form-control" name="link" id="Link">
                        <p>Adicione apenas a ultima parte do link <img src="../img/linkHelp.png" alt=""></p>
                    </div>
                </div>
                
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="Material">Material de estudo do curso </label>
                        <input type="file" class="form-control" id="Material" name="material">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="Atividade">Atividade interdisciplinar do curso</label>
                        <input type="file" class="form-control" id="Atividade" name="atividade">
                    </div>
                </div>

                <div class="row mt-2 col-2">
                    <button class="btn btn-info text-white" name="addCurso" type="submit">Adicionar</button>
                </div>
            </form>
        </div>
        
    </section>  
    <!--================ End Cursos =================-->

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
    <script>
        function previewImage(){
            var imagem = document.querySelector('input[name=image]').files[0];
            var preview = document.querySelector('#capa');

            var reader = new FileReader();
            reader.onloadend = function(){
                preview.src = reader.result;
                preview = document.querySelector('#capa').style.display = 'inline';
            }

            if(imagem){
                 reader.readAsDataURL(imagem);
            }else{
                preview.src = "";
            }
        }
    </script>
  </body>
</html>
