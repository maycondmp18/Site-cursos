<?php
    $curso = $_GET['curso'];
    $aluno = $_GET['aluno'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Forma de Envio - PagSeguro</title>
        <link type="image/x-icon" rel="icon" href="https://assets.pagseguro.com.br/ps-bootstrap/v6.71.0/img/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/personalizado.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <h1 class="display-4">Selecione o método de recebimento do certificado</h1>
                <div class="col-md-8">
                    <form method="post" action="index.php">
                        <div class="row mb-3 ml-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="Envio" class="custom-control-input" id="Email" value="email">
                                        <label class="custom-control-label" for="Email">Receber por E-mail <br> R$ 79,90</label>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="card ml-4">
                                <div class="card-body">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="Envio" class="custom-control-input" id="Correio" value="correio">
                                        <label class="custom-control-label" for="Correio">Receber pelo Correio <br> R$ 89,90</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="curso" value="<?php echo $curso ?>">
                        <input type="hidden" name="aluno" value="<?php echo $aluno ?>">
                        
                        <input type="submit" class="btn btn-primary" value="Selecionar">
                    </form>
                </div>
            </div>
            
        </div>
    </body>
</html>