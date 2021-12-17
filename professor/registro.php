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
    <title>Registro - Mult Soluções</title>
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
                                <a class="nav-link" href="index.php">Login</a>
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
                    <a href="../index.php">Inicio</a>
                    <a href="../login_regis.php">Contato</a>
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
        <div class="container">
            <h2 class="text-center">Cadastro de Professor</h2>
            <?php
                echo @$_SESSION['mensagem'];
                session_destroy();
            ?>
            <form action="processos.php" class="mt-4" method="post" enctype="multipart/form-data">

                <fieldset class="mb-5">
                    <legend>INFORMAÇÕES PESSOAIS</legend>

                    <div class="row">
                        <div class="col-md-10">
                            <label for="Nome" class="form-label">Nome Completo</label>
                            <input type="text" name="nome" id="Nome" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label for="Nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" name="nascimento" id="Nascimento">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="Telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" id="Telefone" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="CPF" class="form-label">CPF</label>
                            <input type="text" name="cpf" id="CPF" class="form-control">
                        </div>
                        <div class="col-md-2">

                            <label for="Sexo" class="form-label">Sexo</label>
                            <select name="sexo" class="form-select" id="Sexo">
                                <option value="">Selecione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-5">
                    <legend>INFORMAÇÕES PROFISSIONAIS</legend>
                
                    <div class="row">
                        <div class="col-md-5">
                            <label for="Formacao" class="form-label">Formação</label>
                            <input type="text" name="formacao" id="Formacao" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label for="formFile" class="form-label">Anexo de Curriculum</label>
                            <input class="form-control" type="file" id="formFile" name="curriculum">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <label for="Experiencia" class="form-label">Experiências anteriores (Opcional)</label>
                            <textarea name="experiencia" id="Experiencia" class="form-control" style="resize: none;" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>DADOS DE ACESSO</legend>

                    <div class="row">
                        <div class="col-md-10">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" name="email" id="Email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="Senha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="Senha" class="form-control" maxlength="40">
                            <span class="form-legend">Não use caracters especiais.</span>
                        </div>
                        <div class="col-md-5">
                            <label for="Senha" class="form-label">Repita Senha</label>
                            <input type="password" name="repita" id="Repita" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-10">
                            <label class="form-label">Acesso ao contrato do instrutor associado ao site</label>
                            <a href="contrato/Contrato_mult_solucoes_instrutor_associado_ao_site.pdf">Contrato</a>
                        </div>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            Aceitar Termos e Condições
                        </label>
                    </div>
                </fieldset>

                <div class="row mt-5">
                    <div class="col-md-3">
                        <button type="submit" name="cadProfessor" class="btn btn-outline-primary">Enviar</button>
                    </div>
                </div>
            </form>
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
    <script src="../js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function (){
            //Mascaras
            $('#CPF').mask('000.000.000-00'); 
            $('#CNPJ').mask('00.000.000/0000.00');

            var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

            $('#Telefone').mask(SPMaskBehavior, spOptions);
        });
    </script>
  </body>
</html>
