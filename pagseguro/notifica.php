<?php
    include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUCESSO</title>
    <link type="image/x-icon" rel="icon" href="https://assets.pagseguro.com.br/ps-bootstrap/v6.71.0/img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            text-align: center;
            align-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-lg-8 col-md-3">
            <div class="card " id="user">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-content">
                            <div class="row" style="text-align: center;">
                                <div class="col-lg-2">
                                    <div class="text-center dib">
                                        <div class="stat-text">
                                            <i class="fa fa-check-circle fa-4x" aria-hidden="true" style="color: green;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <div class="text-center dib">
                                        <div class="stat-text">
                                            <h3>Transação Realizada com Sucesso</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-3 mt-4">
            <div class="card " id="user">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-content">
                            <div class="row" style="text-align: center;">
                                <div class="col-lg-12 mt-3">
                                    <div class="text-center dib">
                                        <div class="stat-text">
                                            <h5 class="result">
                                                <?php
                                                    $code = $conn->query("SELECT * FROM DadosVendas ORDER BY id DESC LIMIT 1");
                                                    $ln = $code->fetch(PDO::FETCH_ASSOC);

                                                    if ($ln['tipo_pg'] == 1) {
                                                        echo "<a href='../courses.php' class='btn btn-secondary'>Voltar ao Inicio</a>";
                                                    }
                                                    if ($ln['tipo_pg'] == 2) {
                                                        echo "<a href='" . $ln['link_pagamento'] . "' class='btn btn-primary'>Imprimir Boleto</a>";
                                                        echo "<a href='../courses.php' class='btn btn-secondary ml-5'>Voltar ao Inicio</a>";

                                                    }
                                                    if ($ln['tipo_pg'] == 3) {
                                                        echo "<a href='" . $ln['link_pagamento'] . "' class='btn btn-primary ml-5'>Link de Pagamento</a>";
                                                        echo "<a href='../courses.php' class='btn btn-primary'>Voltar ao Inicio</a>";

                                                    }
                                                ?>
                                            </h5>
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
</body>
</html>