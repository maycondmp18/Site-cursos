<?php
session_start();
include './configuracao.php';
include './conexao.php';

if(!isset($_GET['success'])){
    header('Location: certificado/gerar_certificado/gerador.php?id_curso='. $_SESSION['Idcurso'] .'&id_aluno='. $_SESSION['Idaluno'] .'&email='. $_SESSION['emailAluno'] .'&nome='. $_SESSION['nomeAluno'] .'&cpf='. $_SESSION['cpfAluno'] .'');
}


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sucesso - PagSeguro</title>
        <link type="image/x-icon" rel="icon" href="https://assets.pagseguro.com.br/ps-bootstrap/v6.71.0/img/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/personalizado.css" rel="stylesheet">
    </head>
    <body>
        <div class="container justify-content-center text-center">
            <div class="card" style="margin-top: 100px; width: 500px;">
                <div class="card-body">
                    <div class="row justify-content-center text-center">
                        <div style="border-radius: 50%; width: 50px; height: 50px;" class="bg-success">
                        <img src="done.svg">
                    </div>
                        
                    </div>
                    
                    
                    <?php
                        $sql = $conn->query("SELECT link_pagamento FROM dadosvendas ORDER BY id DESC LIMIT 1");
                        if($sql->rowCount() > 0){
                            $ln = $sql->fetch(PDO::FETCH_ASSOC);
                            echo "<h3>Solicitação realizada! Aguardando a solicitação de pagamento</h3><br>";
                            echo "<a href='" . $ln['link_pagamento'] . "' class='nav-link'> Acesse o seu Boleto</a><br>";
                            echo "<a href='../index.php'>Voltar a página inicial</a>";
                        }else{
                            echo "<h3>Transação realizada com sucesso! Aguardando a solicitação de pagamento</h3><br>";
                            echo "<a href='../index.php'>Voltar a página inicial</a>";
                        }
                    ?>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

    </body>
</html>
