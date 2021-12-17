<?php 
    session_start();
    include 'conexao.php';
    include 'init.php';
    $_SESSION['page'] = 'sobre';
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
    <title>Sobre - Mult Soluções</title>
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
                            
                            <li class="<?php if($page == 'ensine'){echo "nav-item active";} else {echo "nav-item";} ?>">
                                <a class="nav-link" href="ensine.php">Torne-se Instrutor</a>
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
                <h2>Sobre</h2>
                <div class="page_link">
                  <a href="index.php">Inicio</a>
                  <a href="courses.php">Sobre</a>
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
              <h2 class="mb-3">Sobre nosso cursos</h2>
              <p>
                O que oferecemos à você após adquirirem nossos cursos
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="h_blog_img">
              <img class="img-fluid" src="img/multsolucoes/sobre.jpg" alt="" />
            </div>
          </div>
          <div class="col-md-6">
            <ol>

              <li>
                <strong>Cursos 100% Online</strong>
                <ul>
                  <li>
                    <p> Todas as aulas são gravadas em video</p>
                  </li>
                </ul>
              </li>

              <li>
              <strong>Certificado</strong>
                <ul>
                  <li>
                    <p>Todos os cursos contam com o certificado após a conclusão, válido em todo território nacional</p>
                  </li>
                </ul>
              </li>

              <li>
              <strong>Mercado de trabalho</strong>
                <ul>
                  <li>
                    <p>Habilitação para o mercado de trabalho</p>
                  </li>
                </ul>
              </li>

            </ol>
          </div>
          
        </div>
        
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->
    
    <!--================ Start Feature Area =================-->
    <section id="" class="feature_area">
        <div class="container">
            <div class="row">
            <div class="row h_blog_item">
          <div class="col-lg-6">
            <div class="h_blog_img">
              <img class="img-fluid" src="img/multsolucoes/cursos.jpg" alt="" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="h_blog_text">
              <div class="h_blog_text_inner left right">
                <h4>LEGISLAÇÃO DE CURSOS LIVRES</h4>
                <p style="text-align: justify;">
                  De acordo com a Lei nº. 9394/96, o Decreto nº. 5.154/04 e a Deliberação CEE 14/97 (Indicação CEE 14/97), os cursos livres são uma 
                  modalidade de ensino legal e válida em todo o território nacional, ainda que não sejam regulamentados pelo MEC. Esses cursos têm 
                  caráter não-formal, podem ser ofertados tanto de forma presencial, quanto online e são extremamente democráticos e acessíveis. <br><br>

                  <a href="#" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                    Ler mais
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>
    </section>
    <!--================ End Feature Area =================-->
    
    <!--=================== Modal =========================-->
    <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">LEGISLAÇÃO DE CURSOS LIVRES: TUDO QUE VOCÊ PRECISA SABER</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" style="text-align: justify;">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O que são cursos livres? Eles são regulamentados? Posso abrir meu próprio curso livre? Eles são ofertados somente na modalidade a distância? Preciso ter CNPJ para entrar nesse mercado? Quem pode ministrar cursos profissionalizantes? Essas são somente algumas das dúvidas acerca da legislação de cursos livres no Brasil.</p>
            
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Infelizmente, quem quer empreender nessa área encontra uma escassez de informações e, ao procurar aprender sobre, pode ficar ainda mais confuso! Mas não se preocupe, pensando nisso, vamos responder as perguntas mais relevantes sobre a legislação de cursos livres para te deixar pronto para investir de vez nesse mercado.
            Você pode, inclusive, baixar esse checklist e ver, item por item, se o seu EAD está quase pronto para ser colocado no ar.</p>
            
            <p style='text-transform: uppercase;'><strong>O que são cursos livres?</strong></p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Primeiramente, para entendermos sobre a legislação que rege os cursos livres, é preciso entender exatamente o que eles são.
              Resumidamente, um curso livre é um curso de menor duração, focado em um aprendizado pontual para qualificação profissional ou pessoal em alguma área específica. Um curso de confeitaria, por exemplo, pode ser em formato de curso livre. Existem, hoje, diversas profissões em alta para se criar um curso livre!
              Além disso, esse tipo de curso não exige nenhum tipo de escolaridade prévia, o que amplia ainda mais as possibilidades do mercado. Exatamente por serem conhecimentos pontuais e focados na capacitação é que existem cursos livres nas mais diversas áreas. Além da já citada confeitaria, veja mais alguns tipos e exemplos de cursos livres possíveis:</p>

              <ul>
                <li>Corte e costura</li>
                <li>Artesanato</li>
                <li>Mecânica</li>
                <li>Desenho</li>
                <li>Gastronomia</li>
                <li>Cerâmica</li>
                <li>Fotografia</li>
                <li>SEO e Marketing Digital</li>
                <li>Coaching</li>
                <li>Cursos preparatórios (concursos, provas de certificação, vestibulares)</li>
              </ul>
            
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Basicamente, os cursos livres oferecem um conhecimento de aplicação muito rápida ou até imediata, e também por isso eles são tão atrativos. Além disso, eles podem ser oferecidos tanto de forma presencial quanto na modalidade a distância, atraindo ainda mais alunos!
              Se você pensa em montar o seu próprio curso livre e quer saber um pouco mais sobre a legislação, separamos as informações mais importantes que vão te auxiliar nesse processo.</p>
            
            <p style='text-transform: uppercase;'><strong>Legislação de cursos livres: as leis que regem essa modalidade</strong></p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De acordo com a Lei nº. 9394/96, o Decreto nº. 5.154/04 e a Deliberação CEE 14/97 (Indicação CEE 14/97), os cursos livres são uma modalidade de ensino legal e válida em todo o território nacional, ainda que não sejam regulamentados pelo MEC. Esses cursos têm caráter não-formal, podem ser ofertados tanto de forma presencial, quanto online e são extremamente democráticos e acessíveis.</p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Um curso livre, por sua legislação, não faz exigência de nenhuma formação anterior específica, podendo ser realizado por praticamente qualquer pessoa, e também não tem carga horária mínima ou fixa definida, ficando essa definição então por conta do profissional ou instituição que oferta o conteúdo. Apesar disso, os cursos livres não deixam de ser extremamente válidos, relevantes e reconhecidos pelo mercado de trabalho e por organizações diversas. Esse tipo de conteúdo normalmente é extremamente rico e pode ser um diferencial para quem o consome.</p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por esses e outros motivos, os cursos livres têm feito cada vez mais sucesso e muita gente já está apostando na modalidade não só para aprender e se qualificar, mas para criar um negócio e ganhar dinheiro com seu conhecimento.</p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mesmo assim, diante de um curso livre, algumas dúvidas ainda surgem e podem acabar incomodando quem vai fazer seu próprio curso ou quer estudar por um deles. Então, para que isso não aconteça mais, listamos a seguir as principais dúvidas sobre as leis e a legislação referente à cursos livres. </p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!--============================ End Modal ===============-->

<!--================ Start Feature Area =================-->
    <section id="" class="feature_area">
        <div class="container">
            <div class="row">
            <div class="row h_blog_item">
          <div class="col-lg-6">
            <div class="h_blog_img">
              <img class="img-fluid" src="img/abed.png" alt="" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="h_blog_text">
              <div class="h_blog_text_inner left right">
                <h4>ASSOCIAÇÃO BRASILEIRA DE EDUCAÇÃO A DISTÂNCIA</h4>
                <p style="text-align: justify;">
                  A 'Associação Brasileira de Educação a Distância' é uma sociedade científica, sem fins lucrativos, 
                  voltada para o desenvolvimento da educação aberta, flexível e a distância, fundada em 21 de junho de 1995 
                  por um grupo de educadores interessados em educação a distância e em novas tecnologias de aprendizagem. <br><br>

                  <a href="http://www.abed.org.br/site/pt/">
                    Ler mais
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>
    </section>
    <!--================ End Feature Area =================-->

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
