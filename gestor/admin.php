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
    <link rel="icon" href="../img/favicon.jpg" type="image/png" />
    <title>Painel administrativo || Inicio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/flaticon.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/bootstrap-datepicker.css" rel="stylesheet"/>
    <!-- main css -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="../css/estilo.css" />
    <link rel="stylesheet" href="../css/dashboard.css"/>
    <style>
        .notes {
            line-height: 20px;
        }

        .active{
            color: #fdc632 !important;
            background-color: #002347 !important;
        }
        div.single_content{
            width: 360px !important;
        }
        #user{
            background: #006;
            color: #fff;
        }
        #curso{
            background: #006;
            color: #fff;
        }
        #aula{
            background: #006;
            color: #fff;
        }
        span{
            color: #fff;
        }
        .notificacao {
            text-align: end;
            margin: 10px;
        }
        .notify{
            padding: 4px;
            border-radius: 10%;
            position: relative;
            top: -10px;
            left: -10px;
        }
    </style>
</head>
<body onload="active('body')">
    <header class="header_area white-header">
        <div class="main_menu">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
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
                    
                            <li class="nav-item">
                                <a href="#" class="nav-link"></a>
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
                                            <a class="nav-link" href="#">Painel</a>
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
                  <h2>ÁREA ADMINISTRATIVA</h2>
                  <div class="page_link">
                    <a href="../index.php">Inicio</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================ End Home Banner Area =================-->

      <!--===================== Pages =========================-->

      <!--
        
        page1 = 'Inicio';
        page2 = 'Cadastro de cursos e aulas';
        page3 = 'Listagem de cursos ja cadastrados'; 

      -->
      <div class="wrapper d-flex align-items-stretch">
		<!-- Page Content  -->
        <div id="content" class="container-fluid p-4 p-md-5 pt-5">
            <div class="animated">
                <div class="page1">
        
                <div class="row" id="page1">
                    <div class="col-lg-3 col-md-3">
                        <div class="card" id="user">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib ">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                                $sql = $conn->query("SELECT count(*) AS t FROM alunos");
                                                $ln = $sql->fetch(PDO::FETCH_ASSOC);
                                                $total = $ln['t'];
                                            ?>
                                            <div class="stat-text">
                                                <?php if($total > 0){ ?>
                                                    <span class="count"><?php echo $total ?></span>
                                                <?php }else{?>
                                                    <span class="count">0</span>
                                                <?php } ?>
                                            </div>
                                            <div class="stat-heading text-white">
                                                Alunos
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="card" id="curso">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                                $sql = $conn->query("SELECT count(*) AS t FROM professor WHERE status = 0");
                                                $ln = $sql->fetch(PDO::FETCH_ASSOC);
                                                $total = $ln['t'];
                                            ?>
                                            <div class="stat-text">
                                                <?php if($total > 0){ ?>
                                                    <span class="count"><?php echo $total ?></span>
                                                <?php }else{?>
                                                    <span class="count">0</span>
                                                <?php } ?>
                                            </div>
                                            <div class="stat-heading text-white">
                                                Professor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="card" id="aula">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                                $sql = $conn->query("SELECT count(*) AS t FROM cursos");
                                                $ln = $sql->fetch(PDO::FETCH_ASSOC);
                                                $total = $ln['t'];
                                            ?>
                                            <div class="stat-text">
                                                <?php if($total > 0){ ?>
                                                    <span class="count"><?php echo $total ?></span>
                                                <?php }else{?>
                                                    <span class="count">0</span>
                                                <?php } ?>
                                            </div>
                                            <div class="stat-heading text-white">
                                                Cursos
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                </div>
            </div>

            
            <div class="row mt-5 mb-5">
                <div class="col-md-6 text-center">
                    <h2>PROFESSORES</h2>
                    <div class="notificacao">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Análise</button>
                        <?php
                            $sql = $conn->query("SELECT count(*) AS t FROM professor WHERE status = 1");
                            $ln = $sql->fetch(PDO::FETCH_ASSOC);
                            $total = $ln['t'];
                            if($total > 0){ 
                        ?>
                            <span class="bg-danger notify"><?php echo $total ?></span>
                        <?php }else{ ?>
                            <span class="bg-danger notify">0</span>
                        <?php } ?>
                        
                        
                    </div>
                    
                </div>
                <div class="col-md-6 text-center"><h2>ALUNOS</h2></div>

                <div class="col-md-6 col-lg-6" style="max-height: 500px; overflow: auto;">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Professor</th>
                            <th>Email</th>
                        </tr>
                        <?php
                            $pro = $conn->query("SELECT * FROM professor WHERE status = 0 ORDER BY id DESC");
                            if($pro->rowCount() > 0){
                                while($v = $pro->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><?php echo $v['nome'] ?></td>
                            <td><?php echo $v['email'] ?></td>
                        </tr>
                        <?php
                                }
                            }else{  
                                echo "<tr><th>Nenhum professor cadastrado<th></tr>";
                            }
                        ?>
                    </table>
                </div>

                
                <div class="col-md-6 col-lg-6" style="max-height: 500px; overflow: auto;">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Aluno</th>
                            <th>Email</th>
                        </tr>
                        <?php
                            $pro = $conn->query("SELECT * FROM alunos");
                            if($pro->rowCount() > 0){
                                while($v = $pro->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><?php echo $v['nome'] ?></td>
                            <td><?php echo $v['email'] ?></td>
                        </tr>
                        <?php
                                }
                            }else{  
                                echo "<tr><th>Nenhum aluno cadastrado<th></tr>";
                            }
                        ?>
                    </table>
                </div>
            </div> 

            <div class="row mt-5">
                <div class="col-md-12 text-center"><h2>CURSOS</h2></div>
                <div class="col-md-12 col-lg-12" style="max-height: 500px; overflow: auto;">
                    <table class="table table-striped">
                        <tr>
                            <th></th>
                            <th>Curso</th>
                            <th>Professor</th>
                            <th>Adicionada em</th>
                        </tr>
                        <?php
                            $sql = $conn->query("SELECT * FROM cursos  ORDER BY id_curso DESC");
                            $row = $sql->rowCount();
                            if($row > 0){
                                while($ln = $sql->fetch(PDO::FETCH_ASSOC)){ 

                        ?>
                            
                        <tr>
                            <td>
                                <img src="../storage/imagens/<?php echo $ln['imagem'] ?>" width="60px" height="40px" alt="">
                            </td>
                            <td><?php echo $ln['nome'] ?></td>

                            <?php
                                $prof = $conn->query("SELECT nome FROM professor WHERE id = '" . $ln['id_professor'] . "'");
                                $l = $prof->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <td><?php echo $l['nome'] ?></td>

                            <td><?php echo date_format(date_create($ln['data']),"d/m/Y"); ?></td>
                        </tr>
                            
                        <?php 
                                }
                            }else{
                                echo "<h2><small>Não ha cursos disponiveis</small></h2>";
                            }
                        ?>
                    </table>
                </div>
            </div> 
            
            
            
            <div class="row mt-5">
                <div class="col-md-12 text-center"><h2>CURSOS</h2></div>
                <div class="col-md-8 col-lg-8" style="max-height: 500px; overflow: auto;">
                    <table class="table table-striped">
                        <tr>
                            <th></th>
                            <th>Curso</th>
                            <th>Professor</th>
                            <th>Adicionada em</th>
                        </tr>
                        <?php
                            $sql = $conn->query("SELECT * FROM dadosvendas ORDER BY id DESC");
                            $row = $sql->rowCount();
                            if($row > 0){
                                while($ln = $sql->fetch(PDO::FETCH_ASSOC)){ 

                        ?>
                            
                        
                            
                        <?php 
                                }
                            }else{
                                echo "<h2><small>Nenhuma transação realizada</small></h2>";
                            }
                        ?>
                    </table>
                </div>
            </div> 
        </div>


               
	</div>


    <!--===================== End Pages =========================-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 200%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Analise de Curriculum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Mais Detalhes</th>
                            <th>Curriculum</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $sql = $conn->query("SELECT * FROM professor WHERE status = 1 ORDER BY id DESC");
                            if($sql->rowCount() > 0){
                                while($ln = $sql->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <tr>   
                                <td><?php echo $ln['nome'] ?></td>
                                <td><?php echo $ln['email'] ?></td>
                                <td><a href="details.php?id=<?php echo $ln['id'] ?>">Mais Detalhes</a></td>
                                <td>
                                    <a class="btn btn-primary" href="../storage/curriculum/<?php echo $ln['curriculum'] ?>">Download</a>
                                </td>
                                <td>
                                    <a href="status.php?status=approved&id=<?php echo $ln['id'] ?>" class="btn btn-success">Aprovar</a>
                                </td>
                                <td>
                                    <a href="status.php?status=reproved&id=<?php echo $ln['id'] ?>" class="btn btn-danger">Reprovar</a>
                                </td>
                            </tr>
                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/panel.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../js/bootstrap-datepicker.min.js"></script> 
		<script src="../js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</html>