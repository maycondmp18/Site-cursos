<?php 
    session_start();
    $_SESSION['cod_verify'];
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
    <title>Recuperar senha</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/perso.css" />
    <style>
        input:valid {
            border-color: green !important;
        }
    </style>
</head>
<body>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Verificação de código</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="wrapper d-flex align-items-stretch" style="background: #eeeeee;">
		<!-- Page Content  -->
        <div id="content" class="container-fluid p-4 p-md-5 pt-5">
                <form method="post" action="processo.php">
                    <div class="row justify-content-center mb-4">
                        <span>Digite seu email e em pouco instantes nós enviaremos a você um codigo de verificação.</span>
                        <span><?php echo $_SESSION['error'] = null; ?></span> 
                    </div> 
                    <div class="form-row justify-content-center">   
                        <div class="col-md-1">
                            <input type="text" name="n1" class="form-control" style="text-align: center" maxlength="1" pattern="[0-9]+$" required>
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="n2" class="form-control" style="text-align: center" maxlength="1" pattern="[0-9]+$" required>
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="n3" class="form-control" style="text-align: center" maxlength="1" pattern="[0-9]+$" required>
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="n4" class="form-control" style="text-align: center" maxlength="1" pattern="[0-9]+$" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-danger" name="BtnCancel2" value="Cancelar">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="form-control btn-success" name="BtnVerify" value="Verificar">
                        </div>
                    </div>
                </form>
        </div>
    </div>
    <!--================ End Popular Courses Area =================-->

</body>
</html>